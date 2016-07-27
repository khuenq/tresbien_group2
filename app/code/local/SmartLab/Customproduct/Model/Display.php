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

    public function productDetail(Varien_Event_Observer $observer)
    {


        $product = $observer->getProduct();
        if ($product->getTypeId() == "customproduct") {
            $customer_detail = Mage::getSingleton('customer/session')->getCustomer();
            $customerID = $customer_detail->getId();
            $orders = Mage::getResourceModel('sales/order_collection')
                ->addFieldToSelect('*')
                ->addFieldToFilter('customer_id', $customerID)
                ->setOrder('created_at', 'desc');
            foreach ($orders as $order) {
                if ($order->getState() == "processing" || $order->getState() == "new") {
                    $items = $order->getAllItems();
                    foreach ($items as $item) {
                        $productData = Mage::getModel('catalog/product')->load($item->getProductId());
                        if ("customproduct" == $productData->getTypeId()) {
                            $productsku = $item->getSku();
                            $rank = substr($productsku, strlen($productsku) - 1);
                            if ($rank == 1) {
                                $ranknote = "Bronze";
                            } else if ($rank == 2) {
                                $ranknote = "Silver";
                            } else if ($rank == 3) {
                                $ranknote = "Gold";
                            } else {
                                $ranknote = "Platinum";
                            }
                            Mage::getSingleton('core/session')->getMessages(true);
                            Mage::getSingleton('core/session')->addError("You have already order our digital certification named :" . $item->getName() . " with rank : " . $ranknote . "! Please wait for approved your order");

                        }
                    }
                }
            }
        }

    }
}