<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/22/2016
 * Time: 11:06
 */

class SmartLab_Blogs_Model_Observer
{
    public function hookIntoReadMore()
    {
        $blogId = Mage::app()->getRequest()->getParam('id');
        $blog = Mage::getModel('neotheme_blog/post')->load($blogId);
        $tagId = $blog->getTagIds();
        foreach ($tagId as $id){
            $tag = Mage::getModel('blogs/tag')->load($id);
            $index = $tag->getIndex();
            $index++;
            $tag->setData('index', $index);
            $tag->save();
        }
    }
}