<?php
class SmartLab_Blogs_Block_Widget_Post_List
extends NeoTheme_Blog_Block_Post_List 
implements Mage_Widget_Block_Interface
{	
    function _construct(){
        $this->setTemplate('smartlab/blogs/widget/post/list_block.phtml');
        $this->setTitle('Latest Posts');
    }
    
    public function _toHtml() {
        if ($this->getData('template')){
            $this->setTemplate($this->getData('template'));
        }
        return parent::_toHtml();
    }
    
    public function _prepareCollection(){
        
        parent::_prepareCollection();
        if (is_numeric($this->getPostCount())){
            $this->getCollection()->setCurPage(0);
            $this->getCollection()->setPageSize($this->getPostCount());
        }
    }

    public function getLastestBlog()
    {
        $store_id = Mage::app()->getStore()->getId();
        $blogModel = Mage::getModel('neotheme_blog/post')->getCollection()->addFieldToFilter('store_ids', array('in'=>$store_id));
        $blogModel->getSelect()->order(array('entity_id DESC'));
        $blog = array();
        foreach ($blogModel as $item){
            array_push($blog, $item);
        }
        return $blog;
    }
}
