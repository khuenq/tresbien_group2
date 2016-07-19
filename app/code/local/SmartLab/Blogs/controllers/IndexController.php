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
        $this->loadLayout();
        echo $this->getLayout()->createBlock('core/text_list')
            ->setTemplate('smartlab/blogs/account/myblog/add.phtml')->toHtml();
        $this->renderLayout();
    }

    public function createBlogAction()
    {
        if(Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customer_id = Mage::getSingleton('customer/session')->getCustomerId();
            $data = $this->getRequest()->getPost();
            $blog = Mage::getModel('neotheme_blog/post');
            $blog->setData($data);
            try {
                $blog->save();
            } catch (Exception $e) {
                print_r($e);
            }
            $item = Mage::getModel('neotheme_blog/post')->load($blog->getId());
            $post_id = $item->getId();

            $model = Mage::getModel('blogs/customerpost');
            $model->setData('customer_id',$customer_id);
            $model->setData('post_id',$post_id);
            $model->save();
            $this->_redirect('blogs/index/list');
        }
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
}