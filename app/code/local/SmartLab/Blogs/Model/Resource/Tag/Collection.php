<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/19/2016
 * Time: 11:41
 */
class SmartLab_Blogs_Model_Resource_Tag_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blogs/tag');
    }
}