<?php
class SmartLab_Godzaipayment_Model_Godzai extends Mage_Payment_Model_Method_Abstract {

  protected $_code  = 'godzaipayment';
 
  public function getOrderPlaceRedirectUrl()
  {
    return Mage::getUrl('godzaipayment/index/redirect', array('_secure' => false));
  }
}