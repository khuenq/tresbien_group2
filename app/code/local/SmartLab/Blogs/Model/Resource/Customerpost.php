<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/18/2016
 * Time: 15:11
 */
class SmartLab_Blogs_Model_Resource_Customerpost extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('blogs/customerpost', 'entity_id');
    }
}