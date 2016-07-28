<?php
class SmartLab_Godzaipayment_IndexController extends Mage_Core_Controller_Front_Action 
{   
  public function redirectAction() 
  {
    $orderIncrementId = Mage::getSingleton('checkout/session')->getLastRealOrderId();
    //$orderIncrementId = 4600000054;
    $order = Mage::getModel('sales/order')->loadByIncrementId($orderIncrementId);
    $grandTotal = $order->getGrandTotal();
    $currency = $order->getOrderCurrencyCode();
    $orderDetail = base64_encode($orderIncrementId.'^_^'.$grandTotal.'^_^'.$currency);
    $this->_redirect(
      'kimochigate/index/index', array('_secure' => false, 'orderDetail'=>$orderDetail)
    );
  }
 
  public function responseAction() 
  {
    if ($this->getRequest()->get("flag") == "1" && $this->getRequest()->get("orderId")) 
    {
      $orderId = $this->getRequest()->get("orderId");
      $order = Mage::getModel('sales/order')->loadByIncrementId($orderId);
      $order->setState(Mage_Sales_Model_Order::STATE_PAYMENT_REVIEW, true, 'Payment Success.');
      $order->save();
       
      Mage::getSingleton('checkout/session')->unsQuoteId();
      $this->_redirect('checkout/onepage/success', array('_secure'=> false));
    }
    else
    {
      $orderId = $this->getRequest()->get("orderId");
      $order = Mage::getModel('sales/order')->loadByIncrementId($orderId);
      $order->setState(Mage_Sales_Model_Order::STATE_CANCELED, true, 'Payment Failure.');
      $order->save();

      $this->_redirect('checkout/onepage/failure', array('_secure'=> false));
    }
  }
}