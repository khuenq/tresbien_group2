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
    }

    public function viewBlogList()
    {
        $tagId = Mage::app()->getRequest()->getParam('id');
        $modelBlog = Mage::getModel('neotheme_blog/post')->getCollection();
        $listBlog = array();
        foreach ($modelBlog as $blog){
            if(in_array($tagId, $blog->getTagIds())){
                $id = $blog->getId();
                $blog = Mage::getModel('neotheme_blog/post')->load($id);
                array_push($listBlog, $blog);
            }
        }
        return $listBlog;
    }
}