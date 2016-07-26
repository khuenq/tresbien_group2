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
        $tagModel->getSelect()->order(array('index DESC'));
        $tagModel->getSelect()->limit(20);
        return $tagModel;
    }
}