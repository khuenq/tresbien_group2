<?php
$installer = $this;
$installer->startSetup();
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$attribute= array(
    'type'          => 'varchar',
    'label'         => 'Baybanbua Code',
    'source'        => 'eav/entity_attribute_backend_array',
    'backend'       => 'eav/entity_attribute_backend_table',
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'       => true,
    'required'      => false,
    'grid'			=> true,
);

// Add to eav attribute
$setup->addAttribute('order', 'baybanbua_code', $attribute);
// Add colum to flat and grid
$installer->addAttribute('order', 'baybanbua_code', $attribute);

$installer->endSetup();
?>