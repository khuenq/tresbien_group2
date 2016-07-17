<?php
/**
* 
*/
class SmartLab_Baybanbua_Model_Observer
{
	function setBaybanbuaCode($observer)
	{
		$order = $observer->getEvent()->getOrder();
		if (!$order->getState() == Mage_Sales_Model_Order::STATE_NEW) {
			return $this;
		}

		$order = Mage::getModel('sales/order')->load($order->getId());

		if('baybanbua' == $order->getPayment()->getMethodInstance()->getCode())
		{
			// Create random code
			$alphanumberic = array_merge(range('a','z'),range('A','Z'),range('0','9'));
			$baybanbua_code = substr(str_shuffle($alphanumberic,0,20));

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

		return $this;
	}

	function addBaybanbuaCodeToOrderGrid($observer)
	{
		$collection = $observer->getOrderGridCollection();
        $select = $collection->getSelect();
        $select->join('sales_flat_order', 'main_table.entity_id = sales_flat_order.entity_id',array('baybanbua_code'));
	}
}
?>
