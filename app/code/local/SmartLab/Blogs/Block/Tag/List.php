<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/21/2016
 * Time: 14:56
 */
class SmartLab_Blogs_Block_Tag_List
extends Mage_Core_Block_Template
{
    public function getListTag()
    {
        $tagModel = Mage::getModel('blogs/tag')->getCollection();
        if($tagModel->count() <=20 ){
            return $tagModel;
        }
    }
}