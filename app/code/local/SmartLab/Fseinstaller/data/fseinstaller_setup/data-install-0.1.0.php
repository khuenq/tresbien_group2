<?php  
/*-----------------------------------------------------------------------------------------------------
 * Install Category Structure
 *----------------------------------------------------------------------------------------------------*/
//add rootcategory
//return id rootcategory
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
        $category->setData('is_active', 1);
        $category->getResource()->save($category);
        $categoryId = $category->getId();


        $parentId = 1;
        $category->move($parentId, null);

        return $categoryId;
    }

    return $dataname[0]['entity_id'];
}

//add subcategory
//return subcategoryid
function addSubCategory($name, $rootCateIds)
{
//    $rootCateIds = addRootCategory($nameroot);

    $parentCategory = Mage::getModel('catalog/category')->load($rootCateIds);
    $path = $parentCategory->getPath();

    $category = Mage::getModel('catalog/category');
//    $dataname = $category->getCollection()
//        ->addAttributeToFilter('name', $name)->getData();
//    if (!$dataname) {
    $category->setId(null);
    $category->setData('name', $name);
    $category->setData('url_key', $name . '_catalog');
    $category->setData('display_mode', 'PRODUCTS');
    $category->setData('is_active', 1);
    $category->setData('path', $path);
    $category->getResource()->save($category);
    $categoryId = $category->getId();

    return $categoryId;
//    }
//    return $dataname[0]['entity_id'];
}



//add root category
$idlv0 = addRootCategory("China");
//add subcategory theo cac rootcategory

$idlvl1 = addSubCategory("Materials", $idlv0);
$idlvl2 = addSubCategory("Meat", $idlvl1);
addSubCategory("Meats Cut to Order", $idlvl2);
addSubCategory("Grinds, Cubed & Sausage", $idlvl2);
addSubCategory("Prepped to Cook", $idlvl2);
addSubCategory("Vegetables", $idlvl1);

$idlvl2 = addSubCategory("Seafood", $idlvl1);
addSubCategory("Seafood", $idlvl2);
addSubCategory("Prepped to Cook", $idlvl2);

$idlvl2 = addSubCategory("Cheese", $idlvl1);
addSubCategory("Cheese", $idlvl2);
addSubCategory("Firmness", $idlvl2);

$idlvl2 = addSubCategory("Fruit", $idlvl1);
addSubCategory("Pre-Cut", $idlvl2);
addSubCategory("Tropical & Specialty", $idlvl2);

$idlvl2 = addSubCategory("Dairy", $idlvl1);
addSubCategory("Butter & Margarine", $idlvl2);
addSubCategory("Eggs", $idlvl2);
addSubCategory("Cream & Creamers", $idlvl2);

$idlvl1 = addSubCategory("Foods and Beverages", $idlv0);
addSubCategory("Appetizers", $idlvl1);
addSubCategory("Breakfast", $idlvl1);
addSubCategory("Lunch", $idlvl1);
addSubCategory("Dinner", $idlvl1);
addSubCategory("Street Foods", $idlvl1);
addSubCategory("Bakery & Pastry", $idlvl1);
addSubCategory("Pizzas", $idlvl1);
addSubCategory("Traditional Sweets", $idlvl1);
addSubCategory("Beverages", $idlvl1);
addSubCategory("Recipe e-Books", $idlv0);
addSubCategory("Cooking Appliances", $idlv0);
addSubCategory("Customized Meals", $idlv0);


//tree of korea
$idlv0 = addRootCategory("Korea");
$idlvl1 = addSubCategory("Materials", $idlv0);
$idlvl2 = addSubCategory("Meat", $idlvl1);
addSubCategory("Meats Cut to Order", $idlvl2);
addSubCategory("Grinds, Cubed & Sausage", $idlvl2);
addSubCategory("Prepped to Cook", $idlvl2);
addSubCategory("Vegetables", $idlvl1);

$idlvl2 = addSubCategory("Seafood", $idlvl1);
addSubCategory("Seafood", $idlvl2);
addSubCategory("Prepped to Cook", $idlvl2);

$idlvl2 = addSubCategory("Cheese", $idlvl1);
addSubCategory("Cheese", $idlvl2);
addSubCategory("Firmness", $idlvl2);

$idlvl2 = addSubCategory("Fruit", $idlvl1);
addSubCategory("Pre-Cut", $idlvl2);
addSubCategory("Tropical & Specialty", $idlvl2);

$idlvl2 = addSubCategory("Dairy", $idlvl1);
addSubCategory("Butter & Margarine", $idlvl2);
addSubCategory("Eggs", $idlvl2);
addSubCategory("Cream & Creamers", $idlvl2);

$idlvl1 = addSubCategory("Foods and Beverages", $idlv0);
addSubCategory("Appetizers", $idlvl1);
addSubCategory("Breakfast", $idlvl1);
addSubCategory("Lunch", $idlvl1);
addSubCategory("Dinner", $idlvl1);
addSubCategory("Street Foods", $idlvl1);
addSubCategory("Bakery & Pastry", $idlvl1);
addSubCategory("Pizzas", $idlvl1);
addSubCategory("Traditional Sweets", $idlvl1);
addSubCategory("Beverages", $idlvl1);


addSubCategory("Recipe e-Books", $idlv0);
addSubCategory("Cooking Appliances", $idlv0);
addSubCategory("Customized Meals", $idlv0);


//tree of vietnam
$idlv0 = addRootCategory("Vietnam");
$idlvl1 = addSubCategory("Materials", $idlv0);
$idlvl2 = addSubCategory("Meat", $idlvl1);
addSubCategory("Meats Cut to Order", $idlvl2);
addSubCategory("Grinds, Cubed & Sausage", $idlvl2);
addSubCategory("Prepped to Cook", $idlvl2);
addSubCategory("Vegetables", $idlvl1);

$idlvl2 = addSubCategory("Seafood", $idlvl1);
addSubCategory("Seafood", $idlvl2);
addSubCategory("Prepped to Cook", $idlvl2);

$idlvl2 = addSubCategory("Cheese", $idlvl1);
addSubCategory("Cheese", $idlvl2);
addSubCategory("Firmness", $idlvl2);

$idlvl2 = addSubCategory("Fruit", $idlvl1);
addSubCategory("Pre-Cut", $idlvl2);
addSubCategory("Tropical & Specialty", $idlvl2);

$idlvl2 = addSubCategory("Dairy", $idlvl1);
addSubCategory("Butter & Margarine", $idlvl2);
addSubCategory("Eggs", $idlvl2);
addSubCategory("Cream & Creamers", $idlvl2);

$idlvl1 = addSubCategory("Foods and Beverages", $idlv0);
addSubCategory("Appetizers", $idlvl1);
addSubCategory("Breakfast", $idlvl1);
addSubCategory("Lunch", $idlvl1);
addSubCategory("Dinner", $idlvl1);
addSubCategory("Street Foods", $idlvl1);
addSubCategory("Bakery & Pastry", $idlvl1);
addSubCategory("Pizzas", $idlvl1);
addSubCategory("Traditional Sweets", $idlvl1);
addSubCategory("Beverages", $idlvl1);


addSubCategory("Recipe e-Books", $idlv0);
addSubCategory("Cooking Appliances", $idlv0);
addSubCategory("Customized Meals", $idlv0);
?>
