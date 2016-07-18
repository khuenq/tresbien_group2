<?php

class SmartLab_Customproduct_Model_Observer
{
    public function getproducttype($observer)
    {
        $event = $observer->getCollection();
        foreach ($event as $demo) {
            if ("customproduct" == $demo->getTypeId()) {
                $demo->setFinalPrice(200);
            }
        }
        return $this;
    }


    public function setquantity($observer)
    {
        $event = $observer->getCollection();
        foreach ($event as $demo) {
            if ("customproduct" == $demo->getTypeId()) {
                $quote = $observer->getEvent()->getQuote();
                if ($quote->getCart()->getItemsCount() == 1) {

                    Mage::getSingleton('checkout/session')->addError('limit only one product per order');
                    Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('checkout/cart'));
                    Mage::app()->getResponse()->sendResponse();
                    exit;
                }

            }
        }
        return $this;
    }

    public function catalogProductCollectionLoadBefore($observer)
    {
        $event = $observer->getEvent();
        $product = $event->getProduct();
        if ($product->getTypeId() == "simple") {
            $product->setFinalPrice(100);
        }
        return $this;

    }

    public function hookIntoCatalogProductNewAction($observer)
    {
        $product = $observer->getEvent()->getProduct();
        //echo 'Inside hookIntoCatalogProductNewAction observer...'; exit;
        //Implement the "catalog_product_new_action" hook
        return $this;
    }

    public function checkCustomerlogin($observer)
    {
        echo "asdsadasd";

    }


//    action add product custom
    public function catalogProductSaveAfter($observer)
    {
        if ($actionInstance = Mage::app()->getFrontController()->getAction()) {
            $action = $actionInstance->getFullActionName();
            if ($action == 'adminhtml_catalog_product_save') { //if on admin save action

                $product = $observer->getEvent()->getProduct();
                $productid = $product->getId();
                if ("customproduct" == $product->getTypeId()) { // if customproduct
                    $option = $product->getProductOptions();
                    if (!$option) {                             // if customproduct ay chua ton tai option nao
                        $price = $product->getPrice();
                        $sku = $product->getSku();


                        $optionData = array(
                            array(
                                'title' => 'Bronze',
                                'price' => 0,
                                'sku' => $sku . '-001',
                                'sort_order' => '1',
                                'price_type' => 'fixed',
                            ),

                            array(
                                'title' => 'Silver',
                                'price' => $price * 0.5,
                                'sku' => $sku . '-002',
                                'sort_order' => '2',
                                'price_type' => 'fixed',
                            ),

                            array(
                                'title' => 'Gold',
                                'price' => $price * 0.9,
                                'sku' => $sku . '-003',
                                'sort_order' => '3',
                                'price_type' => 'fixed'
                            ),
                            array(
                                'title' => 'Platinum',
                                'price' => $price * 1.2,
                                'sku' => $sku . '-003',
                                'sort_order' => '3',
                                'price_type' => 'fixed'
                            )
                        );
                        $defaultData = array(
                            'title' => "product rank",
                            'type' => 'radio', // could be drop_down ,checkbox , multiple
                            'is_require' => 1,
                            'sort_order' => 0,
                            'values' => $optionData
                        );
                        $product->setProductOptions($defaultData);
                        $product->setCanSaveCustomOptions(true);
                        //Do not forget to save the product
                        $product->getOptionInstance()->addOption($defaultData);
                        $product->setHasOptions(true);
                    }
                }
            }
        }
    }
}