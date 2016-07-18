<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/11/2016
 * Time: 2:55 PM
 */
class SmartLab_Blogs_IndexController extends Mage_Core_Controller_Front_Action
{
    public function listAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function addAction()
    {
        if($this->__vipAuthentication())
        {
            $this->loadLayout();
            echo $this->getLayout()->createBlock('core/text_list')
                ->setTemplate('smartlab/blogs/account/myblog/add.phtml')->toHtml();
            $this->renderLayout();
        }
        else
        {
            // Do some thing
            $this->_redirect('blog');
        }
        
    }

    public function createBlogAction()
    {
        $data = $this->getRequest()->getPost();
        $blog = Mage::getModel('neotheme_blog/post');
        $data['post_date']=strtotime($data['created_at']); // Modify by thanhnd1. blog sort theo post_date
        $blog->setData($data);
        try {
            $blog->save();
        }catch (Exception $e){
            print_r($e);
        }
        $this->_redirect('blogs/index/list');
    }

    public function deleteAction()
    {
        $id = Mage::app()->getRequest()->getParam('id');
        $model = Mage::getModel('neotheme_blog/post');
        try{
            $model->setId($id)->delete();
            $this->_redirect('blogs/index/list');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function editAction()
    {
        if(null != Mage::app()->getRequest()->getPost()){
//            Neu co request Post thi vao form edit
            $info = Mage::app()->getRequest()->getPost();
            $model = Mage::getModel('neotheme_blog/post');
            $model->setData($info);
            $model->save();
            $this->_redirect('blogs/index/list');
        }
        $this->loadLayout();
        $this->renderLayout();
    }

    public function detailAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    // Create by thanhnd1
    private function __vipAuthentication()
    {
        // ThanhNT1 sẽ hướng dẫn cách lấy mã DC
        //$customerDC = Mage::getSingleton('customer/session')->getCustomer()->getDC();
        //$customerDC = '78lajyjdslnmds';
        $customerDC = '';
        if(!$customerDC || empty($customerDC))
        {
            return false;
        }
        return true;
    }
}