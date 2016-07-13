<?php

function addRootCategory($name)
{

    $category = Mage::getModel('catalog/category');
    $dataname = $category->getCollection()
        ->addAttributeToFilter('name', $name)->getData();
//    kiem tra dataname da ton tai

    if (!$dataname) {
        $category->setId(null);
        $category->setData('name', $name);
        $category->setData('display_mode', 'PRODUCTS');
        $category->setData('level', 1);
        $category->setData('active', 1);
        $category->getResource()->save($category);
        $categoryId = $category->getId();


        $parentId = 1;
        $category->move($parentId, null);

        return $categoryId;
    }

    return $dataname[0]['entity_id'];
}

//add root category
addRootCategory("China");
addRootCategory("Korea");
addRootCategory("Vietnam");

function addSubCategory($name, $nameroot)
{
    $rootCateIds = addRootCategory($nameroot);

    $parentCategory = Mage::getModel('catalog/category')->load($rootCateIds);
    $path = $parentCategory->getPath();

    $category = Mage::getModel('catalog/category');
    $dataname = $category->getCollection()
        ->addAttributeToFilter('name', $name)->getData();
    if (!$dataname) {
        $category->setId(null);
        $category->setData('name', $name);
        $category->setData('url_key', $name . '_catalog');
        $category->setData('display_mode', 'PRODUCTS');
        $category->setData('active', 1);
        $category->setData('path', $path);
        $category->getResource()->save($category);
        $categoryId = $category->getId();


        return $categoryId;
    }
    return $dataname[0]['entity_id'];
}

//add subcategory theo cac rootcategory
addSubCategory("Materials", 'China');
addSubCategory("Foods and Beverages", 'China');
addSubCategory("Recipe e-Books", 'China');
addSubCategory("Cooking Appliances", 'China');
addSubCategory("Customized Meals", 'China');

addSubCategory("Materials", 'Korea');
addSubCategory("Foods and Beverages", 'Korea');
addSubCategory("Recipe e-Books", 'Korea');
addSubCategory("Cooking Appliances", 'Korea');
addSubCategory("Customized Meals", 'Korea');

addSubCategory("Materials", 'Vietnam');
addSubCategory("Foods and Beverages", 'Vietnam');
addSubCategory("Recipe e-Books", 'Vietnam');
addSubCategory("Cooking Appliances", 'Vietnam');
addSubCategory("Customized Meals", 'Vietnam');


function addSubCategoryLv2($name, $namesub, $nameroot)
{
    $rootCateIds = addSubCategory($namesub, $nameroot);
    $parentCategory = Mage::getModel('catalog/category')->load($rootCateIds);

    $path = $parentCategory->getPath();

    $category = Mage::getModel('catalog/category');

    $dataname = $category->getCollection()
        ->addAttributeToFilter('name', $name)->getData();
    if (!$dataname) {
        $category->setId(null);
        $category->setData('name', $name);
        $category->setData('url_key', $name . '_catalog');
        $category->setData('display_mode', 'PRODUCTS');
        $category->setData('active', 1);
        $category->setData('path', $path);
        $category->getResource()->save($category);
        $categoryId = $category->getId();

        return $categoryId;
    }
    return $dataname[0]['entity_id'];
}

//add subcategorylv2 theo cac subcategorylv1
addSubCategoryLv2('Appetizers', 'Foods and Beverages', 'China');
addSubCategoryLv2("Breakfast", 'Foods and Beverages', 'China');
addSubCategoryLv2("Lunch", 'Foods and Beverages', 'China');
addSubCategoryLv2("Dinner", 'Foods and Beverages', 'China');
addSubCategoryLv2("Street Foods", 'Foods and Beverages', 'China');
addSubCategoryLv2("Bakery & Pastry", 'Foods and Beverages', 'China');
addSubCategoryLv2("Pizzas", 'Foods and Beverages', 'China');
addSubCategoryLv2("Traditional Sweets", 'Foods and Beverages', 'China');
addSubCategoryLv2("Beverages", 'Foods and Beverages', 'China');

addSubCategoryLv2("Meat", 'Materials', 'China');
addSubCategoryLv2("Vegetables", 'Materials', 'China');
addSubCategoryLv2("Seafood", 'Materials', 'China');
addSubCategoryLv2("Cheese", 'Materials', 'China');
addSubCategoryLv2("Fruit", 'Materials', 'China');
addSubCategoryLv2("Dairy", 'Materials', 'China');

addSubCategoryLv2("Appetizers", 'Foods and Beverages', 'Korea');
addSubCategoryLv2("Breakfast", 'Foods and Beverages', 'Korea');
addSubCategoryLv2("Lunch", 'Foods and Beverages', 'Korea');
addSubCategoryLv2("Dinner", 'Foods and Beverages', 'Korea');
addSubCategoryLv2("Street Foods", 'Foods and Beverages', 'Korea');
addSubCategoryLv2("Bakery & Pastry", 'Foods and Beverages', 'Korea');
addSubCategoryLv2("Pizzas", 'Foods and Beverages', 'Korea');
addSubCategoryLv2("Traditional Sweets", 'Foods and Beverages', 'Korea');
addSubCategoryLv2("Beverages", 'Foods and Beverages', 'Korea');

addSubCategoryLv2("Meat", 'Materials', 'Korea');
addSubCategoryLv2("Vegetables", 'Materials', 'Korea');
addSubCategoryLv2("Seafood", 'Materials', 'Korea');
addSubCategoryLv2("Cheese", 'Materials', 'Korea');
addSubCategoryLv2("Fruit", 'Materials', 'Korea');
addSubCategoryLv2("Dairy", 'Materials', 'Korea');

addSubCategoryLv2("Appetizers", 'Foods and Beverages', 'Vietnam');
addSubCategoryLv2("Breakfast", 'Foods and Beverages', 'Vietnam');
addSubCategoryLv2("Lunch", 'Foods and Beverages', 'Vietnam');
addSubCategoryLv2("Dinner", 'Foods and Beverages', 'Vietnam');
addSubCategoryLv2("Street Foods", 'Foods and Beverages', 'Vietnam');
addSubCategoryLv2("Bakery & Pastry", 'Foods and Beverages', 'Vietnam');
addSubCategoryLv2("Pizzas", 'Foods and Beverages', 'Vietnam');
addSubCategoryLv2("Traditional Sweets", 'Foods and Beverages', 'Vietnam');
addSubCategoryLv2("Beverages", 'Foods and Beverages', 'Vietnam');

addSubCategoryLv2("Meat", 'Materials', 'Vietnam');
addSubCategoryLv2("Vegetables", 'Materials', 'Vietnam');
addSubCategoryLv2("Seafood", 'Materials', 'Vietnam');
addSubCategoryLv2("Cheese", 'Materials', 'Vietnam');
addSubCategoryLv2("Fruit", 'Materials', 'Vietnam');
addSubCategoryLv2("Dairy", 'Materials', 'Vietnam');

////add subcategorylv3 theo cac subcategory lv2
//addSubCategory("Meats Cut to Order", 'Meat');
//addSubCategory("Grinds, Cubed & Sausage", 'Meat');
//addSubCategory("Prepped to Cook", 'Meat');
//
//addSubCategory("Seafood", 'Seafood');
//addSubCategory("Prepped to Cook", 'Seafood');
//
//addSubCategory("Cheese", "Cheese");
//addSubCategory("Firmness", "Cheese");
//
//addSubCategory("Pre-Cut", "Fruit");
//addSubCategory("Tropical & Specialty", "Fruit");
//
//addSubCategory("Butter & Margarine", "Dairy");
//addSubCategory("Eggs", "Dairy");
//addSubCategory("Cream & Creamers", "Dairy");



