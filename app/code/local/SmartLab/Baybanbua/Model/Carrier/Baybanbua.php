<?php
/**
* 
*/
class SmartLab_Baybanbua_Model_Carrier_Baybanbua
extends Mage_Shipping_Model_Carrier_Abstract
implements Mage_Shipping_Model_Carrier_Interface
{
	protected $_code = 'baybanbua';
	
	public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
       	// Skip if not enabled
		if (!Mage::getStoreConfig('carriers/'.$this->_code.'/active')) {
            return false;
        }

		$result = Mage::getModel('shipping/rate_result');
		$result->append($this->_getDefaultRate());

		return $result;
    }

    public function getAllowedMethods()
	{
		return array('babanbua' => $this->getConfigData('name'));
	}

	protected function _getDefaultRate()
	{
		$rate = Mage::getModel('shipping/rate_result_method');
		 
		$rate->setCarrier($this->_code);
		$rate->setMethod($this->_code);
		$rate->setCarrierTitle($this->getConfigData('title'));
		$rate->setMethodTitle($this->getConfigData('name'));
		$rate->setPrice($this->getConfigData('price'));
		$rate->setCost(0);
		 
		return $rate;
	}
}
?>
