<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/21/2016
 * Time: 14:28
 */
class SmartLab_Blogs_TagController extends Mage_Core_Controller_Front_Action
{
    public function _construct()
    {
        parent::_construct();
    }

    public function listBlogAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}