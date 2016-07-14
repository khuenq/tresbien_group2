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

function addAttributetypevarcharNoRequired($name, $entityid, $note, $attributeset, $attributegroup)       //lam viec voi table eav_attribute va eav_entity_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("varchar")
        ->setFrontendInput("text")
        ->setFrontendLabel($name)
        ->setIsRequired(0)
        ->setNote($note)
        ->setAttributeSetId($attributeset)
        ->setAttributeGroupId($attributegroup);
    $attribute->save();
}

function addAttributetypevarcharUnique($name, $entityid, $note, $attributeset, $attributegroup)       //lam viec voi table eav_attribute va eav_entity_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("varchar")
        ->setFrontendInput("text")
        ->setFrontendLabel($name)
        ->setIsRequired(1)
        ->setIsUnique(1)
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

function addAttributetypeDateNoRequired($name, $entityid, $note, $attributeset, $attributegroup)       //lam viec voi table eav_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("datetime")
        ->setFrontendInput("date")
        ->setBackendModel("eav/entity_attribute_backend_datetime")
        ->setFrontendLabel($name)
        ->setIsRequired(0)
        ->setNote($note)
        ->setAttributeSetId($attributeset)
        ->setAttributeGroupId($attributegroup);
    $attribute->save();
}

function addAttributetypeSelect($name, $entityid, $note, $attributeset, $attributegroup, $arrayoption)       //lam viec voi table eav_attribute va eav_entity_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("varchar")
        ->setFrontendInput("select")
        ->setBackendModel('eav/entity_attribute_backend_array')
        ->setFrontendLabel($name)
        ->setSourceModel("datacategory/source_optionfoodvsbeverages")
        ->setOption($arrayoption)
        ->setIsRequired(1)
        ->setNote($note)
        ->setAttributeSetId($attributeset)
        ->setAttributeGroupId($attributegroup);
    $attribute->save();
}

function addAttributetypeSelectCountry($name, $entityid, $note, $attributeset, $attributegroup)       //lam viec voi table eav_attribute va eav_entity_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("varchar")
        ->setFrontendInput("select")
        ->setSourceModel('catalog/product_attribute_source_countryofmanufacture')
        ->setFrontendLabel($name)
        ->setIsRequired(1)
        ->setNote($note)
        ->setAttributeSetId($attributeset)
        ->setAttributeGroupId($attributegroup);
//    $attribute->setData('source', 'catalog/product_attribute_source_countryofmanufacture');
    $attribute->save();
}

function addAttributetypeYesno($name, $entityid, $note, $attributeset, $attributegroup)       //lam viec voi table eav_attribute va eav_entity_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("int")
        ->setFrontendInput("boolean")
        ->setFrontendLabel($name)
        ->setIsRequired(1)
        ->setNote($note)
        ->setAttributeSetId($attributeset)
        ->setAttributeGroupId($attributegroup);
    $attribute->save();
}

function addAttributetypeMulti($name, $entityid, $note, $attributeset, $attributegroup, $arrayoption)       //lam viec voi table eav_attribute va eav_entity_attribute : yeu cau ten entity , id entity (4)
{
    $attribute = Mage::getModel('eav/entity_attribute')
        ->setEntityTypeId($entityid)
        ->setAttributeCode($name)
        ->setBackendType("text")
        ->setFrontendInput("multiselect")
        ->setBackendModel('eav/entity_attribute_backend_array')
        ->setFrontendLabel($name)
        ->setOption($arrayoption)
        ->setIsRequired(1)
        ->setNote($note)
        ->setAttributeSetId($attributeset)
        ->setAttributeGroupId($attributegroup);
    $attribute->save();
}


$idset = addAttributeSet("Foods & Beverages", $iddefault);
$idgroup = addAttributeGroup("Foods & Beverages", $idset);
addAttributetypevarchar("Calories", $iddefault, "Amount of calories contain inside the food", $idset, $idgroup);
addAttributetypeDate("Expiry Date", $iddefault, "Date that the food will be expired and cannot be eaten anymore", $idset, $idgroup);
addAttributetypevarchar("Ingredients", $iddefault, "Details about ingredients used to make that food", $idset, $idgroup);
addAttributetypeSelect("Food Brand", $iddefault, "select one brand of food", $idset, $idgroup,
    array('value' => array('optionone' => array('Descendant of the Sun'),
        'optiontwo' => array('KFC'),
        'optionthree' => array('McDonald'),
        'optionfour' => array('Jesus'),
        'optionfive' => array('Mario Bros'),
        'optionsix' => array('Pho24'),
        'optionseven' => array('Teo Kai Chym Singapore'),
        'optioneight' => array('Phuc Dat Bich'))));


$idset = addAttributeSet("Materials", $iddefault);
$idgroup = addAttributeGroup("Materials", $idset);
addAttributetypeSelect("From Farm", $iddefault, "A list of farms provide Tres Bien food material for selling, at this moment", $idset, $idgroup, array('value' => array('optionone' => array('Cooking Recipe'),
    'optiontwo' => array('Bruce Lee'),
    'optionthree' => array('Small Ville'),
    'optionfour' => array('H.K.T'),
    'optionfive' => array('S.T MTP Vietnam'))));
addAttributetypeYesno("Is Raw?", $iddefault, "Indicate whether the material is raw or already cooked.", $idset, $idgroup);


$idset = addAttributeSet("e-Books", $iddefault);
$idgroup = addAttributeGroup("e-Books", $idset);
addAttributetypevarcharUnique("ISBN", $iddefault, "Unique serial number of the e-book", $idset, $idgroup);
addAttributetypevarchar("Author", $iddefault, "Name of the book’s author", $idset, $idgroup);
addAttributetypevarcharNoRequired("Publisher", $iddefault, "Name of the book’s publisher", $idset, $idgroup);
addAttributetypeMulti("Book Type", $iddefault, "A multi-selection of type for the e-book , initially accept the following types", $idset, $idgroup,
    array('value' => array('optionone' => array('Cooking Recipe'),
        'optiontwo' => array('Nutrition Guides'),
        'optionthree' => array('Electronic User Manual'),
        'optionfour' => array('Chef Biography'),
        'optionfive' => array('Others'))));
addAttributetypeDateNoRequired("Date of publishing", $iddefault, "The date when the e-book was published", $idset, $idgroup);


$idset = addAttributeSet("Cooking Appliances", $iddefault);
$idgroup = addAttributeGroup("Cooking Appliances", $idset);
addAttributetypevarchar("Voltage", $iddefault, "Indicate the number of voltage needed to use the appliance", $idset, $idgroup);
addAttributetypevarchar("Cooking appliances brand", $iddefault, "The brand of appliance", $idset, $idgroup);

addAttributetypeSelectCountry("Country of Manufacture", $iddefault, "Country that manufactures the appliance, input field appears as drop-down and lists all possible countries.", $idset, $idgroup);
$installer->endSetup();
