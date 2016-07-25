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
                    $product->setStockData(array('max_sale_qty' => 1));
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
                                'sort_order' => '4',
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

            //11h 20/7/16 : them truong hop add product khi da ton tai product type DC
            if (Mage::getSingleton('customer/session')->isLoggedIn()) {
                $items = Mage::getSingleton('checkout/session')->getQuote()->getAllItems();
                foreach ($items as $item) {
                    $idInCart = $item->getProductId();
                    $productInCart = Mage::getModel('catalog/product')->load($idInCart);
                    $typecart = $productInCart->getTypeId();
                    $cartName = $productInCart->getName();
                    if ($typecart == "customproduct") {
                        $currentUrl = Mage::helper('catalog/product')->getProductUrl($productid);
                        Mage::getSingleton('core/session')->addError("Trong gio hang da ton tai san pham : $cartName la  loai DC! Vui long xoa no de mua tiep");
                        Mage::app()->getFrontController()->getResponse()->setRedirect($currentUrl);
                        Mage::app()->getResponse()->sendResponse();
                        exit;
                    }
                }
            } else {
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

                $customer_detail = Mage::getSingleton('customer/session')->getCustomer();
                $customerEmail = $customer_detail->getEmail();
                $customerId = Mage::getSingleton('customer/session')->getCustomerId();

                //tao custom code cho khach hang
                $rdCode = Mage:: helper('core')->getRandomString(14) . "-" . $productsku;


                //luu code ay vao customer attribute la product code
                $customer = Mage::getModel('customer/customer')->load($customerId);
                $customer->getProductcode();
                $customer->setProductcode($rdCode);
                $customer->getResource()->saveAttribute($customer, 'productcode');

                $mailTemplate = Mage::getModel('core/email_template');
                $mail = $mailTemplate->loadByCode('Send Code');
                $templateId = $mail->getId();
                $template_collection = $mailTemplate->load($templateId);
                $template_data = $template_collection->getData();

                $translate = Mage::getSingleton('core/translate');

                $mailSubject = $template_data['template_subject'];
                $from_email = Mage::getStoreConfig('trans_email/ident_general/email'); //fetch sender email
                $from_name = Mage::getStoreConfig('trans_email/ident_general/name'); //fetch sender name

                $sender = array('name' => $from_name,
                    'email' => $from_email);
                $vars = array('dc_code' => $product->getName(),
                    'dc_rank' => $ranknote,
                    'dc_vipcode' => $rdCode); //for replacing the variables in email with data
                /*This is optional*/
                $storeId = Mage::app()->getStore()->getId();
                $model = $mailTemplate->setReplyTo($sender['email'])->setTemplateSubject($mailSubject);
                $email = $customer->getEmail();
                $name = $customer->getName();
                $model->sendTransactional($templateId, $sender, $email, $name, $vars, $storeId);
                if (!$mailTemplate->getSentSuccess()) {

                    throw new Exception();
                }
                $translate->setTranslateInline(true);

            }
        }
    }

    public function addToCart($observer)
    {
        $event = $observer->getEvent();
        $product = $event->getProduct();


        $quote_item = $event->getQuoteItem();
        $skuproduct = $quote_item->getSku();

        $skuLeng = strlen($skuproduct);

        $customer_detail = Mage::getSingleton('customer/session')->getCustomer();
        $customerEmail = $customer_detail->getEmail();
        $product_code = $customer_detail->getProductcode();
        $checkcode = substr($product_code, 15);
//        var_dump($checkcode);
//        die;
        if ($skuproduct == $checkcode) {
            var_dump();
            Mage::throwException("May mua cai san pham nay roi con j.");

        }

    }


    //---------------------OBSERVER HIEN THI CUSTOMER VIP CODE TRONG GRID MANAGER CUSTOMER
    public function beforeCollectionLoad(Varien_Event_Observer $observer)
    {
        $collection = $observer->getCollection();
        if (!isset($collection)) {
            return;
        }

        /**
         * Mage_Customer_Model_Resource_Customer_Collection
         */
        if ($collection instanceof Mage_Customer_Model_Resource_Customer_Collection) {
            /* @var $collection Mage_Customer_Model_Resource_Customer_Collection */
            $collection->addAttributeToSelect('productcode');
        }
    }

    public function appendCustomColumn(Varien_Event_Observer $observer)
    {
        $block = $observer->getBlock();
        if (!isset($block)) {
            return $this;
        }

        if ($block->getType() == 'adminhtml/customer_grid') {
            /* @var $block Mage_Adminhtml_Block_Customer_Grid */
            $block->addColumnAfter('productcode', array(
                'header' => 'Vip code',
                'type' => 'text',
                'index' => 'productcode',
            ), 'email');
        }
    }

}