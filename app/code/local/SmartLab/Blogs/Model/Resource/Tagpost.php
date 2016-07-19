<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/18/2016
 * Time: 11:02
 */
 class SmartLab_Blogs_Model_Resource_Tagpost extends Mage_Core_Model_Resource_Db_Abstract
 {
  public function _construct()
  {
        $this->_init('blogs/tagpost', 'entity_id');
  }
 }