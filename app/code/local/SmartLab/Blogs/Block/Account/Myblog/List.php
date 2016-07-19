<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/11/2016
 * Time: 5:28 PM
 */
class SmartLab_Blogs_Block_Account_Myblog_List
extends Mage_Core_Block_Template
{
//    construct function
    public function _construct()
    {
        parent::_construct();
        $this->setTitle('List Blog');
        $collection = $this->getPostCollection();
        $this->setCollection($collection);
    }

//  prepare layout
    public function _prepareLayout()
    {
        parent::_prepareLayout();
        $pager = $this->getLayout()->createBlock('page/html_pager','blog.pager')
            ->setCollection($this->getCollection());
        $this->setChild('page', $pager);
        return $this;
    }


    public function getPostCollection() {
        //Hien thi blog theo id
        //Lay id cua customer
        $customerId = Mage::getSingleton('customer/session')->getCustomerId();
        //Lay cac id cua blog theo id customer
        $post = Mage::getModel('blogs/customerpost')->getCollection()->addFieldToFilter('customer_id', $customerId);
        $blog_id = array();
        foreach ($post as $item){
            array_push($blog_id,$item->getPostId());
        }
//        echo '<pre>';
//        var_dump($blog_id);
//        die;
        $collection = Mage::getModel('neotheme_blog/post')->getCollection()->addFieldToFilter('entity_id', $blog_id);
//        echo '<pre>';
//        var_dump($collection->getData('title'));
//        die;
        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('page');
    }

    public function getStatusLabel($blog)
    {
        if($blog->getId()){
            $status = $blog->getStatus();
           switch ($status){
               case 0:
                   return Mage::helper('blogs')->__('Inactive');
                   break;
               case 1:
                   return Mage::helper('blogs')->__('Active');
                   break;
               case 2:
                   return Mage::helper('blogs')->__('Draft');
                   break;
           }
        }
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