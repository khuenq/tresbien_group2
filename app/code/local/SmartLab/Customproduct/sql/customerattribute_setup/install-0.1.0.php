<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 7/18/2016
 * Time: 8:27 PM
 */

$installer = $this;

$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$entityTypeId = $setup->getEntityTypeId('customer'); //entity_type_id bang 1 - lay ra entity type id cua thang customer
$attributeSetId = $setup->getDefaultAttributeSetId($entityTypeId);  //lay ra attribute set id
$attributeGroupId = $setup->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);

$installer->addAttribute("customer", "productcode", array(
    "type" => "varchar",
    "backend" => "",
    "label" => "Custom Attribute",
    "input" => "text",
    "source" => "",
    "visible" => true,
    "required" => false,
    "default" => "",
    "frontend" => "",
    "unique" => false,
    "note" => "Custom Attribute"

));

$attribute = Mage::getSingleton("eav/config")->getAttribute("customer", "productcode");


$setup->addAttributeToGroup(
    $entityTypeId,
    $attributeSetId,
    $attributeGroupId,
    'customerattribute',
    '999'  //sort_order
);


//table customer_form_attribute
$used_in_forms = array();

$used_in_forms[] = "adminhtml_customer";
//$used_in_forms[]="checkout_register";
//$used_in_forms[]="customer_account_create";
//$used_in_forms[]="customer_account_edit";
//$used_in_forms[]="adminhtml_checkout";
$attribute->setData("used_in_forms", $used_in_forms)
    ->setData("is_used_for_customer_segment", true)
    ->setData("is_system", 0)
    ->setData("is_user_defined", 1)
    ->setData("is_visible", 1)
    ->setData("sort_order", 100);
$attribute->save();


$installer->endSetup();