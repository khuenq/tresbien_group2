<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/21/2016
 * Time: 14:30
 */

class SmartLab_Blogs_Block_Tag_Listblog extends Mage_Core_Block_Template
{
    public function _construct()
    {
        parent::_construct();
        $this->setTitle('List Blog');
        $collection = $this->getBlogCollection();
        $this->setCollection($collection);
    }

    public function _prepareLayout()
    {
        parent::_prepareLayout();
        $pager = $this->getLayout()->createBlock('page/html_pager','tagblog.pager')
            ->setCollection($this->getCollection());
        $this->setChild('page', $pager);
        return $this;
    }

    public function getBlogCollection()
    {
        $tagId = Mage::app()->getRequest()->getParam('id');
        $modelBlog = Mage::getModel('neotheme_blog/post')->getCollection();
        $blogId = array();
        foreach ($modelBlog as $blog){
            if(in_array($tagId, $blog->getTagIds())){
                $id = $blog->getId();
                array_push($blogId, $id);
            }
        }
        $collection = Mage::getModel('neotheme_blog/post')->getCollection()->addFieldToFilter('entity_id', $blogId);
        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('page');
    }

    public function getCategoryLabel($blog)
    {
        if($blog->getId()){
            $category_id = $blog->getData('category_ids');
            $categoryName = '';
            $category = Mage::getModel('neotheme_blog/category')->getCollection();
            foreach ($category as $item) {
                if($category_id == $item->getData('entity_id')){
                    $categoryName = $item->getName();
                }
            }
            return $categoryName;
        }
    }
}