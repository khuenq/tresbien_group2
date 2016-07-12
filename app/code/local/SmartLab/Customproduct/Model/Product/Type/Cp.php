<?php

/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 7/9/2016
 * Time: 9:44 AM
 */
class SmartLab_Customproduct_Model_Product_Type_Cp extends Mage_Catalog_Model_Product_Type_Abstract
{
    public function isVirtual($product = null)
{
    return true;
}
}