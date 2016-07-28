<?php
class SmartLab_Godzaipayment_Helper_Data extends Mage_Core_Helper_Abstract
{
	function getPaymentGatewayUrl() 
	{
		return Mage::getUrl('godzaipayment/payment/redirect', array('_secure' => false));
	}
}
?>