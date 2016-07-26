<?php
/**
 * Created by PhpStorm.
 * User: ThaoHoang
 * Date: 7/26/2016
 * Time: 15:48
 */

$installer = $this;
$installer->startSetup();

$installer->run("
INSERT INTO `neotheme_blog_category` (`status`, `name`, `store_ids`, `cms_identifier`, `root_template`)VALUES
('1', 'Foods and Beverages', '2,3,4,5,6,7', 'food-beverage', 'one_column'),
        ('1', 'Materials', '2,3,4,5,6,7', 'materials', 'one_column'),
        ('1', 'Receipt e-Book', '2,3,4,5,6,7', 'recipe-ebooks', 'one_column'),
        ('1', 'Cooking Appliances', '2,3,4,5,6,7', 'cooking-appliances', 'one_column'),
        ('1', 'Customized Meals', '2,3,4,5,6,7', 'customized-meals', 'one_column');         
");
$installer->endSetup();