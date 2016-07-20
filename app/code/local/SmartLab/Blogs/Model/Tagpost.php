<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/18/2016
 * Time: 14:46
 */
class SmartLab_Blogs_Model_Tagpost extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blogs/tagpost');
    }
}