<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 7/13/2016
 * Time: 5:56 PM
 */

$installer = $this;
$installer->startSetup();
$iddefault = $installer->getAttributeSetId('catalog_product', 'Default');   //lay atribute set id cua thang default <mac dinh la 4>
$entityTypeId = $installer->getEntityTypeId('catalog_product');   // lay ra entity type cua attribute (4)

function addAttributeSet($name, $id) //lam viec voi table eav_attribute_set
{
    $entityTypeId = Mage::getModel('catalog/product')
        ->getResource()
        ->getEntityType()
        ->getId();
    $attributeSet = Mage::getModel('eav/entity_attribute_set')
        ->setEntityTypeId($entityTypeId)
        ->setAttributeSetName($name);
    $attributeSet->validate();
    $attributeSet->save();
    $attributeSet->initFromSkeleton($id)->save();
    $attributeSetId = $attributeSet->getId();
    return $attributeSetId;
}

function addAttributeGroup($name, $id)       //lam viec voi table eav_attribute_group
{
    $attributeGroup = Mage::getModel('eav/entity_attribute_group')
        ->setAttributeSetId($id)
        ->setAttributeGroupName($name)
        ->setSortOrder(2);
    $attributeGroup->save();
    $attributeGroupId = $attributeGroup->getId();
    return $attributeGroupId;
}


function addAttributetypevarchar($name, $entityid, $note, $attributeset, $attributegroup)       //lam viec voi table eav_attribute va eav_entity_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("varchar")
        ->setFrontendInput("text")
        ->setFrontendLabel($name)
        ->setIsRequired(1)
        ->setNote($note)
        ->setAttributeSetId($attributeset)
        ->setAttributeGroupId($attributegroup);
    $attribute->save();
}

function addAttributetypeDate($name, $entityid, $note, $attributeset, $attributegroup)       //lam viec voi table eav_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("datetime")
        ->setFrontendInput("date")
        ->setBackendModel("eav/entity_attribute_backend_datetime")
        ->setFrontendLabel($name)
        ->setIsRequired(1)
        ->setNote($note)
        ->setAttributeSetId($attributeset)
        ->setAttributeGroupId($attributegroup);
    $attribute->save();
}

function addAttributetypeSelect($name, $entityid, $note, $attributeset, $attributegroup)       //lam viec voi table eav_attribute va eav_entity_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("varchar")
        ->setFrontendInput("select")
        ->setBackendModel('eav/entity_attribute_backend_array')
        ->setFrontendLabel($name)
        ->setSourceModel("datacategory/source_optionfoodvsbeverages")
        ->setOption(array('value' => array('optionone' => array('Sony'),
            'optiontwo' => array('Samsung'),
            'optionthree' => array('Apple'),
        )
        ))
        ->setIsRequired(1)
        ->setNote($note)
        ->setAttributeSetId($attributeset)
        ->setAttributeGroupId($attributegroup);
    $attribute->save();
}

//echo "<pre>";
//$demo = Mage::getModel('eav/entity_attribute')->getCollection();
//var_dump($demo);
//die;

$idset = addAttributeSet("Foods & Beverages", $iddefault);
$idgroup = addAttributeGroup("Foods & Beverages", $idset);
addAttributetypevarchar("Calories", $iddefault, "Amount of calories contain inside the food", $idset, $idgroup);
addAttributetypeDate("Expiry Date", $iddefault, "Date that the food will be expired and cannot be eaten anymore", $idset, $idgroup);
addAttributetypevarchar("Ingredients", $iddefault, "Details about ingredients used to make that food", $idset, $idgroup);
addAttributetypeSelect("Food Brand", $iddefault, "The brand of food", $idset, $idgroup);
$idset = addAttributeSet("Materials", $iddefault);
addAttributeGroup("Materials", $idset);


$installer->endSetup();