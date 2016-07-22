<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/19/2016
 * Time: 11:39
 */
class SmartLab_Blogs_Model_Resource_Tag extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('blogs/tag','entity_id');
    }
}