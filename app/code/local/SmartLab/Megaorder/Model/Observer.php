<?php
/**
* 
*/
class SmartLab_Megaorder_Model_Observer
{
	
	function changeShipmentStatus($observer)
	{		
        $orderId = $observer->getEvent()->getData()['controller_action']->getRequest()->getParams()['order_id'];

        // Ignore when invoiced order
        $orders = Mage::getModel('sales/order_invoice')->getCollection()
                        ->addAttributeToFilter('order_id', array('eq'=>$orderId));
        $orders->getSelect()->limit(1);

        if ((int)$orders->count() !== 0) {
            return $this;
        }

        // Change order status
        $order = Mage::getModel('sales/order')->load($orderId);
        $order->setStatus('customshipped');
        $order->save();
	}
}
?>
