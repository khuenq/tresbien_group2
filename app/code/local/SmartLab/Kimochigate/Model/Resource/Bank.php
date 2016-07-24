<?php
/**
* 
*/
class SmartLab_Kimochigate_Model_Resource_Bank extends Mage_Core_Model_Resource_Db_Abstract
{
	
	public function _construct(){
		$this->_init('kimochigate/bank', 'kimochibank_id');
	}
}
?>