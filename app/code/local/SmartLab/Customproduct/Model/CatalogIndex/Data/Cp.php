<?php

class SmartLab_Customproduct_Model_CatalogIndex_Data_Cp extends Mage_CatalogIndex_Model_Data_Abstract
{
    public function getTypeCode()
    {
        return SmartLab_CustomProduct_Model_Product_Type::TYPE_CP_PRODUCT;
    }
}
