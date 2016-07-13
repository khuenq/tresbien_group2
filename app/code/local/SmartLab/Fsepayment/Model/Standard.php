<?php
/**
* 
*/
class SmartLab_Fsepayment_Model_Standard extends Mage_Payment_Model_Method_Abstract
{
	protected $_code = 'fsepayment';

	protected $_isInitializeNeeded      = true;
	protected $_canUseInternal          = false;
	protected $_canUseForMultishipping  = false;
 
 	/**
	* Return Order place redirect url
	*
	* @return redirect to paygate page
	*/
	public function getOrderPlaceRedirectUrl()
	{
		return Mage::getUrl('customcard/standard/redirect', array('_secure' => true));
	}
	
}
?>
