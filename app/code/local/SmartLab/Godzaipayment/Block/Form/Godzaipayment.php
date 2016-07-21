<?php

class SmartLab_Godzaipayment_Block_Form_Godzaipayment extends Mage_Payment_Block_Form
{
  protected function _construct()
  {
    parent::_construct();
    $this->setTemplate('godzaipayment/form/godzaipayment.phtml');
  }
}