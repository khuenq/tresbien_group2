<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/13/2016
 * Time: 14:39
 */
class SmartLab_Blogs_Block_Account_Myblog_Add
extends Mage_Core_Block_Template
{
    public function _construct()
    {
        parent::_construct();
        $this->setTitle('New Blog');
        $collection = $this->getCategoryCollection();
        $this->setCollection($collection);
    }

    public function getActionOfForm()
    {
        return $this->getUrl('blogs/index/createblog');
    }

    public function getCategoryCollection()
    {
        $store_id = Mage::app()->getStore()->getId();
        $collection = Mage::getModel('neotheme_blog/category')->getCollection()->addFieldToFilter('store_ids',$store_id);
        return $collection;
    }
}
