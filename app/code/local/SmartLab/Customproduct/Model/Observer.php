<?php

class SmartLab_Customproduct_Model_Observer
{
    public function catalogProductCollectionLoadBefore(Varien_Event_Observer $observer)
    {
      echo  "ahuhu";
    }

    public function hookIntoCatalogProductNewAction($observer)
    {
        $product = $observer->getEvent()->getProduct();
        //echo 'Inside hookIntoCatalogProductNewAction observer...'; exit;
        //Implement the "catalog_product_new_action" hook
        return $this;
    }


}