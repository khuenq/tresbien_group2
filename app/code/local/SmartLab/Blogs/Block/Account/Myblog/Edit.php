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
        $store_id = Mage::app()->getStore()->getId();
        $collection = Mage::getModel('neotheme_blog/category')->getCollection()->addFieldToFilter('store_ids',$store_id);
        return $collection;
    }

    public function getListTag()
    {
        $modelTag = Mage::getModel('blogs/tag');
        $listTagName = array();
        $id = Mage::app()->getRequest()->getParam('id');
        $listTagById = Mage::getModel('neotheme_blog/post')->load($id)->getTagIds();
        foreach ($listTagById as $tagId){
            $tagName = $modelTag->load($tagId)->getName();
            array_push($listTagName,$tagName);
        }
        $listTag =implode(',', $listTagName);
        return $listTag;
    }
    public function getActionOfForm()
    {
        return $this->getUrl('blogs/index/edit');
    }
}
