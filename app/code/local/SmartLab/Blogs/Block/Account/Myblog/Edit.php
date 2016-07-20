<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/14/2016
 * Time: 14:13
 */
class SmartLab_Blogs_Block_Account_Myblog_Edit extends Mage_Core_Block_Template
{
    public function _construct()
    {
        parent::_construct();
        $collection = $this->getCategoryCollection();
        $this->setCollection($collection);
    }

    function getPost(){
        $id = Mage::app()->getRequest()->getParam('id');
        return  Mage::getModel('neotheme_blog/post')->load($id);
    }

    public function getCategoryCollection()
    {
        $collection = Mage::getModel('neotheme_blog/category')->getCollection();
        return $collection;
    }

    public function getActionOfForm()
    {
        return $this->getUrl('blogs/index/edit');
    }
}