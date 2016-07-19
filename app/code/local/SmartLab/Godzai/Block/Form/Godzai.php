<?php
/**
* 
*/
class SmartLab_Godzai_Block_Form_Godzai extends Mage_Payment_Block_Form
{
	
	protected function _construct() {
		parent::_construct();
		$this->setTemplate('payment/form/godzai.phtml');
	}
}
?>
