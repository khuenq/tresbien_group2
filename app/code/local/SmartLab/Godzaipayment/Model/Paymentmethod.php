<?php
class SmartLab_Godzaipayment_Model_Paymentmethod extends Mage_Payment_Model_Method_Abstract {
  protected $_code  = 'godzaipayment';
  //protected $_formBlockType = 'godzaipayment/form_godzaipayment';
  //protected $_infoBlockType = 'godzaipayment/info_godzaipayment';
 
  // public function assignData($data)
  // {
  //   $info = $this->getInfoInstance();
     
  //   if ($data->getCustomFieldOne())
  //   {
  //     $info->setCustomFieldOne($data->getCustomFieldOne());
  //   }
     
  //   if ($data->getCustomFieldTwo())
  //   {
  //     $info->setCustomFieldTwo($data->getCustomFieldTwo());
  //   }
 
  //   return $this;
  // }
 
  // public function validate()
  // {
  //   parent::validate();
  //   $info = $this->getInfoInstance();
     
  //   if (!$info->getCustomFieldOne())
  //   {
  //     $errorCode = 'invalid_data';
  //     $errorMsg = $this->_getHelper()->__("CustomFieldOne is a required field.\n");
  //   }
     
  //   if (!$info->getCustomFieldTwo())
  //   {
  //     $errorCode = 'invalid_data';
  //     $errorMsg .= $this->_getHelper()->__('CustomFieldTwo is a required field.');
  //   }
 
  //   if ($errorMsg) 
  //   {
  //     Mage::throwException($errorMsg);
  //   }
 
  //   return $this;
  // }
 
  public function getOrderPlaceRedirectUrl()
  {
    return Mage::getUrl('godzaipayment/payment/redirect', array('_secure' => false));
  }
}