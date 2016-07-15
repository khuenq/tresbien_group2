<?php

/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 7/9/2016
 * Time: 10:04 AM
 */
class SmartLab_Customproduct_Helper_Data extends Mage_Core_Helper_Abstract
{
//    public function setCustomOption($productId, $title, array $optionData, array $values = array())
//    {
//        Mage::app()->getStore()->setId(Mage_Core_Model_App::ADMIN_STORE_ID);
//        if (!$product = Mage::getModel('catalog/product')->load($productId)) {
//            throw new Exception('Can not find product: ' . $productId);
//        }
////        if ("customproduct" == Mage::getModel('catalog/product')->load($productId)->getTypeId()) {
//
//            $defaultData = array(
//                'type' => 'radio',
//                'is_require'	=> 1,
//                'price'			=> 0,
//                'price_type' => 'fixed'
//            );
//
//            $optionData = array(
//                array(
//                    'title' => 'Vang',
//                    'price' => 10,
//                    'price_type' => 'fixed',
//                ),
//
//                array(
//                    'title' => 'Bac',
//                    'price' => 20,
//                    'price_type' => 'fixed',
//                ),
//
//                array(
//                    'title' => 'Da quy',
//                    'price' => 40,
//                    'price_type' => 'fixed'
//                )
//            );
//            $data = array_merge($defaultData, $optionData, array(
//                'product_id' => (int)$productId,
//                'title' => $title,
//                'values' => $values,
//            ));
//
//            $product->setHasOptions(1)->save();
//            $option = Mage::getModel('catalog/product_option')->setData($data)->setProduct($product)->save();
//
//            return $option;
//        }
////    }
}