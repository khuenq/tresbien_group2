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

    public function disableCustomOption($observer)
    {
        if ($actionInstance = Mage::app()->getFrontController()->getAction()) {
            $action = $actionInstance->getFullActionName();
            if ($action == 'adminhtml_catalog_product_new') { //if on admin save action
            }
        }
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
                                'sku' => '1',
                                'sort_order' => '1',
                                'price_type' => 'fixed',
                            ),

                            array(
                                'title' => 'Silver',
                                'price' => $price * 0.5,
                                'sku' => '2',
                                'sort_order' => '2',
                                'price_type' => 'fixed',
                            ),

                            array(
                                'title' => 'Gold',
                                'price' => $price * 0.9,
                                'sku' => '3',
                                'sort_order' => '3',
                                'price_type' => 'fixed'
                            ),
                            array(
                                'title' => 'Platinum',
                                'price' => $price * 1.2,
                                'sku' => '4',
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


//      dispatch event add_to_cart_before
    public function hookToControllerActionPreDispatch($observer)
    {
        //we compare action name to see if that's action for which we want to add our own event
        if ($observer->getEvent()->getControllerAction()->getFullActionName() == 'checkout_cart_add') {
            //We are dispatching our own event before action ADD is run and sending parameters we need
            Mage::dispatchEvent("add_to_cart_before", array('request' => $observer->getControllerAction()->getRequest()));
        }
    }

//      active referer page trong magento
//      "System" > "Configuration" > "Customer Configuration" section "Login Options" -> "Redirect Customer to Account Dashboard after Logging" is set to No.
    public function hookToAddToCartBefore($observer)
    {
        //Hooking to our own event
        $request = $observer->getEvent()->getRequest()->getParams();
        // do something with product
        $productid = $request['product'];
        $product = Mage::getModel('catalog/product')->load($productid);
        $categories = $product->getCategoryIds();
        if ("customproduct" == $product->getTypeId()) {
            if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
                $currentUrl = Mage::helper('catalog/product')->getProductUrl($productid);
                $urllogin = Mage::getUrl('customer/account/login', array('referer' => Mage::helper('core')->urlEncode($currentUrl)));
                Mage::getSingleton('core/session')->addError("Sorry the product : " . $product->getName() . " must <a href='$urllogin'>login</a> to buy.");
                Mage::app()->getFrontController()->getResponse()->setRedirect($currentUrl);
                Mage::app()->getResponse()->sendResponse();
                exit;
            }
        }
    }


//---------------------OBSERVER CHO CUSTOMER MUA PRODUCT CO TYPE DC
    public function sendCodeAfterBuy($observer)
    {
        $lastOrderId = Mage::getSingleton('checkout/session')->getLastOrderId();
        $order = Mage::getSingleton('sales/order');
        $order->load($lastOrderId);
        $allitems = $order->getAllItems();
        foreach ($allitems as $item) {
            $product = Mage::getModel('catalog/product')->load($item->getProductId());
            if ("customproduct" == $product->getTypeId()) {
                $productsku = $item->getSku();

                $customer_detail = Mage::getSingleton('customer/session')->getCustomer();
                $customerEmail = $customer_detail->getEmail();
                $customerId = Mage::getSingleton('customer/session')->getCustomerId();

                //tao custom code cho khach hang
                $code = $productsku;
                if (strlen($code) < 14) {
                    $rdcode = $code . Mage:: helper('core')->getRandomString(14 - strlen($code));
                }

                //luu code ay vao customer attribute la product code
                $customer = Mage::getModel('customer/customer')->load($customerId);
                $customer->getProductcode();
                $customer->setProductcode($rdcode);
                $customer->getResource()->saveAttribute($customer, 'productcode');


//                $body = "Hi there, here is some plaintext body content";
//                $mail = Mage::getModel('core/email');
//                $mail->setToName('customer');
//                $mail->setToEmail('thanhntgc00493@fpt.edu.vn');
//                $mail->setBody($body);
//                $mail->setSubject('The Subject');
//                $mail->setFromEmail('thanhntgg@gmail.com');
//                $mail->setFromName("thanh");
//                $mail->setType('text');// You can use 'html' or 'text'
//
//                try {
//                    $mail->send();
//                    Mage::getSingleton('core/session')->addSuccess('Your request has been sent');
//                    echo 'duoc ngon';
//                } catch (Exception $e) {
//                    Mage::getSingleton('core/session')->addError('Unable to send.');
//                    echo "loi roi";
//
//                }
            }
        }
    }

}