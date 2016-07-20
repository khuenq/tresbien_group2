<?php

class SmartLab_Customproduct_Model_Observer
{
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
                    $demo = Mage::getModel('catalog/product')->load($productid);
                    $option = $demo->getHasOptions();
                    if ($option != 1) {                // if customproduct ay chua ton tai option nao
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

    public function hookToControllerActionPreDispatch($observer)
    {
        //we compare action name to see if that's action for which we want to add our own event
        if ($observer->getEvent()->getControllerAction()->getFullActionName() == 'checkout_cart_add') {
            //We are dispatching our own event before action ADD is run and sending parameters we need
            Mage::dispatchEvent("add_to_cart_before", array('request' => $observer->getControllerAction()->getRequest()));
        }
    }

    public function hookToAddToCartBefore($observer)
    {
        //Hooking to our own event
        $request = $observer->getEvent()->getRequest()->getParams();
        // do something with product
        $productid = $request['product'];
        $product = Mage::getModel('catalog/product')->load($productid);
        if ("customproduct" == $product->getTypeId()) {
            if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
                Mage::getSingleton('core/session')->addError("Product " . $product->getName() . " must login to buy.");
                Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/login'));
                Mage::app()->getResponse()->sendResponse();
                exit;
            }
        }
    }
}