<?php
/**
* 
*/
class SmartLab_Megaorder_Model_Observer
{
	
	function changeShipmentStatus($observer)
	{
		// Change order staus
        $orderId = $observer->getEvent()->getData()['controller_action']->getRequest()->getParams()['order_id'];
        $order = Mage::getModel('sales/order')->load($orderId);
        $order->setStatus('shipped');
        $order->save();
	}
}
?>
