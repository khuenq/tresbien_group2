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
        if(Mage::getSingleton('customer/session')->isLoggedIn()) {
            $this->loadLayout();
            $this->renderLayout();
        }else{
            $this->_redirect('customer/account/login');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('blogs')->__('You have to log in to see your blogs.'));
        }
    }

    public function addAction()
    {
        if(Mage::getSingleton('customer/session')->isLoggedIn()) {
            $this->loadLayout();
            echo $this->getLayout()->createBlock('core/text_list')
                ->setTemplate('smartlab/blogs/account/myblog/add.phtml')->toHtml();
            $this->renderLayout();
        }else{
            $this->_redirect('customer/account/login');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('blogs')->__('You have to log in to create new blog .'));
        }
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
//                    var_dump($tagInput); die;
                    $id = $model->getCollection()->addFieldToFilter('name',$tagInput)->getAllIds();
                    array_push($tagIds, $id[0]);
                } else{
//                    Neu chua ton tai thi them tag vao bang tag roi moi them vao truong tag_ids
                    $id = Mage::getModel('blogs/tag')->setData('name',$tagInput)->save()->getId();
                    array_push($tagIds, $id);
                }
            }
            $tagIds = implode(',', $tagIds);
            $blog = Mage::getModel('neotheme_blog/post');
            $store_id = Mage::app()->getStore()->getId();
            $blog->setData('store_ids', $store_id);
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
        }else{
            $this->_redirect('customer/account/login');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('blogs')->__('You have to log in to create new blog .'));
        }
    }

    public function deleteAction()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $id = Mage::app()->getRequest()->getParam('id');
            $model = Mage::getModel('neotheme_blog/post');
            $tagListById = $model->load($id)->getTagIds();
//        Kiem tra xem tag duoc dung trong bao nhieu bai blog
            foreach ($tagListById as $currentTag) {
                $count = 0;
                foreach (Mage::getModel('neotheme_blog/post')->getCollection() as $blog) {
                    if (in_array($currentTag, $blog->getTagIds())) $count++;
                }
//                Neu chi dung 1 lan thi xoa trong csdl di
                if ($count == 1) Mage::getModel('blogs/tag')->load($currentTag)->delete();

            }
            try {
                $model->setId($id)->delete();
                $cuspost = Mage::getModel('blogs/customerpost')->getCollection()
                    ->addFieldToFilter('post_id',$id);
                foreach ($cuspost as $item){
                    $cuspostid = $item->getId();
                    $model =  Mage::getModel('blogs/customerpost')->load($item->getId());
                    $model->setId($cuspostid);
                    $model->delete();
                }
                $this->_redirect('blogs/index/list');
                Mage::getSingleton('core/session')->addSuccess(Mage::helper('blogs')->__('You have deleted successful.'));
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }else{
            $this->_redirect('customer/account/login');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('blogs')->__('You have to log in to be deleted blog .'));
        }
    }

    public function editAction()
    {
        if(Mage::getSingleton('customer/session')->isLoggedIn()) {
            if (null != Mage::app()->getRequest()->getPost()) {
//            Neu co request Post thi vao form edit
//            Kiem tra xem co tag cu nao chi dung 1 lan o trong blog hien tai ko thi xoa trong csdl di
                $id = Mage::app()->getRequest()->getParam('id');
                $currentBlog = Mage::getModel('neotheme_blog/post')->load($id);
//            Lay danh sach tag truoc khi edit
                $listTag = $currentBlog->getTagIds();
                foreach ($listTag as $currentTag) {
                    $count = 0;
                    foreach (Mage::getModel('neotheme_blog/post')->getCollection() as $blog) {
                        if (in_array($currentTag, $blog->getTagIds())) $count++;
                    }
//                Neu chi dung 1 lan thi xoa trong csdl di
                    if ($count == 1) {
                        Mage::getModel('blogs/tag')->load($currentTag)->delete();
                    }
                }

                $tagModel = Mage::getModel('blogs/tag');
                $info = Mage::app()->getRequest()->getPost();
                $tagName = $info['tag'];
                $listTagInput = explode(',', $tagName);
                $listTagById = array();
//            Kiem tra xem trong nhung tag moi them da ton tai trong csdl chua
                foreach ($listTagInput as $tagInput) {
//               Neu da ton tai trong csdl roi thi lay id cua tag
                    if ($tagModel->getCollection()->addFieldToFilter('name', $tagInput)->count() == 1) {
                        echo 'scdl';
                        var_dump($tagInput);
                        $id = $tagModel->getCollection()->addFieldToFilter('name', $tagInput)->getAllIds();
                        array_push($listTagById, $id[0]);
                    } else {
//                    Neu chua ton tai thi them moi vao csdl roi moi lay id tag
                        echo 'not csdl';
                        var_dump($tagInput);
                        $model = Mage::getModel('blogs/tag');
                        $model->setData('name', $tagInput);
                        $model->setData('index', 0);
                        $id = $model->save()->getId();
                        array_push($listTagById, $id);
                    }
                }

                $tagIds = implode(',', $listTagById);
                $model = Mage::getModel('neotheme_blog/post');
                $model->setData($info);
                $model->setData('tag_ids', $tagIds);
                $model->save();
                $this->_redirect('blogs/index/list');
            } else {
                $this->loadLayout();
                $this->renderLayout();
            }
        }else{
            $this->_redirect('customer/account/login');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('blogs')->__('You have to log in to edit blog .'));
        }
    }

    public function detailAction()
    {
        if(Mage::getSingleton('customer/session')->isLoggedIn()) {
            $this->loadLayout();
            $this->renderLayout();
        }else{
            $this->_redirect('customer/account/login');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('blogs')->__('You have to log in to see detail blog .'));
        }
    }
}
