<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/19/2016
 * Time: 11:38
 */
class SmartLab_Blogs_Model_Tag extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blogs/tag');
    }
}