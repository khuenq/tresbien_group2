<?php
/**
* 
*/
class SmartLab_Kimochigate_Model_Bank extends Mage_Core_Model_Abstract
{
	public function _construct(){
		parent::_construct();
		$this->_init('kimochigate/bank');
	}
}
?>
