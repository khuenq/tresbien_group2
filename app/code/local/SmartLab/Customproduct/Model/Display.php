<?php

/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 7/27/2016
 * Time: 3:14 PM
 */
class SmartLab_Customproduct_Model_Display
{

    public function hideTabs(Varien_Event_Observer $observer)
    {
        $action = Mage::app()->getFrontController()->getAction();
        $acionName = $action->getFullActionName();

        if ($acionName === 'adminhtml_catalog_product_new' || $acionName === 'adminhtml_catalog_product_edit') {
            $event = $observer->getEvent();
            $tabBlock = $event->getBlock();
            if ($tabBlock instanceof Mage_Adminhtml_Block_Catalog_Product_Edit_Tabs) {
                try {
                    $product = $tabBlock->getProduct();
                    $productType = $product->getTypeID();
                    if ($productType == 'customproduct') {
                        $tabBlock->removeTab("customer_options");
                    }
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                }
            }
        }
    }
}