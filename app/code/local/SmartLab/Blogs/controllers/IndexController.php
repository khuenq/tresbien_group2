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
            $tag = $data['tag'];
            $tagIds = array();
            $eachTag = explode(',', $tag);
            $model = Mage::getModel('blogs/tag');
//            Kiem tra xem input tag da ton tai trong csdl hay chua
            foreach ($eachTag as $tagInput){
//                Neu da ton tai thi chi them id vao truong tag_ids cua bang blog
                if($model->getCollection()->addFieldToFilter('name', $tagInput)->count() == 1){
                    $id = $model->getCollection()->addFieldToFilter('name',$tagInput)->getAllIds();
                    array_push($tagIds, $id[0]);
                }else{
//                    Neu chua ton tai thi them tag vao bang tag roi moi them vao truong tag_ids
                    $model->setData('name',$tagInput);
                    $model->setData('index',0);
                    $id = $model->save()->getId();
                    array_push($tagIds, $id);
                }
            }
            $tagIds = implode(',', $tagIds);
            $blog = Mage::getModel('neotheme_blog/post');
            $blog->setData($data);
            $blog->setData('tag_ids', $tagIds);
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
            echo '<pre>';
            $tagModel = Mage::getModel('blogs/tag');
            $info = Mage::app()->getRequest()->getPost();
            $tagName = $info['tag'];
            $listTagName = explode(',', $tagName);
            $listTagById = array();
//            Kiem tra xem co tag nao chi dung 1 lan o trong blog hien tai ko
            $id = Mage::app()->getRequest()->getParam('id');
            $currentBlog = Mage::getModel('neotheme_blog/post')->load($id);
            $listTag = $currentBlog->getTagIds();

            var_dump($currentBlog->getTagIds());
            var_dump($id);
            die;
            //Kiem tra xem tung tag da ton tai trong csdl chua
            foreach ($listTagName as $tagName){
//                Neu da ton tai trong csdl roi
                if($tagModel->getCollection()->addFieldToFilter('name',$tagName)->count() == 1){
                    $id = $tagModel->getCollection()->addFieldToFilter('name', $tagName)->getAllIds();
                    array_push($listTagById, $id[0]);
                }else{
//                    Neu chua ton tai trong csdl thi them moi tag va lay id
                    $tagModel->setData('name', $tagName);
                    $tagModel->setData('index', 0);
                    $id = $tagModel->save()->getId();
                    array_push($listTagById, $id);
                }
            }
            $listTagById = implode(',', $listTagById);
            $model = Mage::getModel('neotheme_blog/post');
            $model->setData($info);
            $model->setData('tag_ids',$listTagById);
            $model->save();
            $this->_redirect('blogs/index/list');
        }else {
            $this->loadLayout();
            $this->renderLayout();
        }
    }

    public function detailAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}