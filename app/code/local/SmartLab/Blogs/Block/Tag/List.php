<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/21/2016
 * Time: 14:56
 */
class SmartLab_Blogs_Block_Tag_List extends Mage_Core_Block_Template
{
    public function getListTag()
    {
        $storeId = Mage::app()->getStore()->getStoreId();
        $postOption = Mage::getModel('neotheme_blog/post')->getCollection()->addFieldToFilter('store_ids', $storeId);
        $tagInPost = array();
        foreach ($postOption as $item) {
            array_push($tagInPost, $item->getData('tag_ids'));
        }
        $tagString = implode(',', $tagInPost);
        $tag = explode(",", $tagString);
        for ($i = 0; $i < count($tag); $i++) {
            $tag[$i] = trim($tag[$i]);
        }
        $empty = "";
        if (($key = array_search($empty, $tag)) != false) {
            unset($tag[$key]);
        }
        $tag = array_filter($tag);
        $tag = array_unique($tag);

        $tagOption = Mage::getModel('blogs/tag')->getCollection()->addFieldToFilter('entity_id', array('in'=>$tag));
        $tagOption->getSelect()->order(array('index DESC'));
        $tagOption->getSelect()->limit(20);
        return $tagOption;
    }
}
