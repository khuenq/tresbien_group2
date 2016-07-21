<?php
/**
* 
*/
class SmartLab_Baybanbua_Model_Observer
{
	function setBaybanbuaCode($observer)
	{
		$order = $observer->getEvent()->getOrder();
		// Set baybanbua code for new order
		if ($order->getState() == Mage_Sales_Model_Order::STATE_NEW) {
			if('baybanbua_baybanbua' == $order->getShippingMethod())
			{
				// Create random code
				$alphanumberic = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$baybanbua_code = substr(str_shuffle($alphanumberic),0,19);
				// Add code to order
				$order->setBaybanbuaCode($baybanbua_code);
				try
				{
					$order->save();
				} 
				catch(Exception $e)
				{
					Mage::log($e->getMessage());
					Mage::log($e->getTraceAsString());
				}
			}
		}
		return $this;
	}
}
?>