<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/14/2016
 * Time: 23:49
 */
class SmartLab_Blogs_Block_Account_Myblog_Detail
extends Mage_Core_Block_Template
{
    public function _construct()
    {
        parent::_construct();
    }

    public function getPost()
    {
        $id = Mage::app()->getRequest()->getParam('id');
        return Mage::getModel('neotheme_blog/post')->load($id);
    }
}