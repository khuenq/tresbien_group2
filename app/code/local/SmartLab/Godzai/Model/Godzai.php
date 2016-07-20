<?php
/**
* 
*/
class SmartLab_Godzai_Model_Godzai extends Mage_Payment_Model_Method_Banktransfer
{
	protected $_code = 'godzai';

	protected $_isInitializeNeeded      = true;
	protected $_canUseInternal          = false;
	protected $_canUseForMultishipping  = false;
 
 // 	/**
	// * Return Order place redirect url
	// *
	// * @return redirect to paygate page
	// */
	// public function getOrderPlaceRedirectUrl()
	// {
	// 	return Mage::getUrl('customcard/standard/redirect', array('_secure' => true));
	// }
	
}
?>
