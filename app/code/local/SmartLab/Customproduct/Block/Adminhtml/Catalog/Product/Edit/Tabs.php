<?php

/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 7/27/2016
 * Time: 11:37 AM
 */
class  SmartLab_Customproduct_Block_Catalog_Product_Edit_Tabs extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tabs
{


    protected $_attributeTabBlock = 'adminhtml/catalog_product_edit_tab_attributes';

    protected function _prepareLayout()
    {
        $this->addTab('categories', array(
            'label'     => Mage::helper('catalog')->__('Categoriesaaaaa'),
            'url'       => $this->getUrl('*/*/categories', array('_current' => true)),
            'class'     => 'ajax',
        ));
    }
}