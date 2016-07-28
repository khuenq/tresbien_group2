<?php
$installer = $this;
$installer->startSetup();

$storeViewModel = Mage::getModel('core/store');
$menuGroupData = array(
    array(
        "title"     => "Vietnamese Viet Nam",
        "menutype"  => "vi_vn_tres_bien",
        "storeid"   => $storeViewModel->load('vi_vn_tres_bien','code')->getId()
    ),
    array(
        "title"     => "English Viet Nam",
        "menutype"  => "en_vn_tres_bien",
        "storeid"   => $storeViewModel->load('en_vn_tres_bien','code')->getId()
    ),
    array(
        "title"     => "Chinese China",
        "menutype"  => "zh_cn_tres_bien",
        "storeid"   => $storeViewModel->load('zh_cn_tres_bien','code')->getId()
    ),
    array(
        "title"     => "English China",
        "menutype"  => "en_cn_tres_bien",
        "storeid"   => $storeViewModel->load('en_cn_tres_bien','code')->getId()
    ),
    array(
        "title"     => "Korea Korea",
        "menutype"  => "ko_kr_tres_bien",
        "storeid"   => $storeViewModel->load('ko_kr_tres_bien','code')->getId()
    ),
    array(
        "title"     => "English Korea",
        "menutype"  => "en_kr_tres_bien",
        "storeid"   => $storeViewModel->load('en_kr_tres_bien','code')->getId()
    )
);

$megamenuBaseData = array(
            array(
            "title"=>"Foods and Beverages",
            "link"=>"foods-and-beverages-catalog.html",
            "url"=>"foods-and-beverages-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"foods-and-beverages-catalog.html",
            "cms"=>"home",
            "parent"=>0,
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>2,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),
            array(
                "title"=>"Appetizers",
                "link"=>"foods-and-beverages-catalog/appetizers-catalog.html",
                "url"=>"foods-and-beverages-catalog/appetizers-catalog.html",
                "catid"=>0,
                "menutype"=>"0",
                "category"=>"foods-and-beverages-catalog/appetizers-catalog.html",
                "cms"=>"home",
                "parent"=>"Foods and Beverages,3",
                "lft"=>0,
                "rgt"=>0,
                "mega_cols"=>1,
                "mega_group"=>0,
                "status"=>1,
                "ordering"=>1,
                "showtitle"=>1,
                "mega_subcontent"=>1,
                "mega_width"=>0,
                "mega_colw"=>0,
                "browserNav"=>0,
                "shownumproduct"=>2
            ),
            array(
                "title"=>"Breakfast",
                "link"=>"foods-and-beverages-catalog/breakfast-catalog.html",
                "url"=>"foods-and-beverages-catalog/breakfast-catalog.html",
                "catid"=>0,
                "menutype"=>"0",
                "category"=>"foods-and-beverages-catalog/breakfast-catalog.html",
                "cms"=>"home",
                "parent"=>"Foods and Beverages,3",
                "lft"=>0,
                "rgt"=>0,
                "mega_cols"=>1,
                "mega_group"=>0,
                "status"=>1,
                "ordering"=>2,
                "showtitle"=>1,
                "mega_subcontent"=>1,
                "mega_width"=>0,
                "mega_colw"=>0,
                "browserNav"=>0,
                "shownumproduct"=>2
            ),
            array(
                "title"=>"Lunch",
                "link"=>"foods-and-beverages-catalog/lunch-catalog.html",
                "url"=>"foods-and-beverages-catalog/lunch-catalog.html",
                "catid"=>0,
                "menutype"=>"0",
                "category"=>"foods-and-beverages-catalog/lunch-catalog.html",
                "cms"=>"home",
                "parent"=>"Foods and Beverages,3",
                "lft"=>0,
                "rgt"=>0,
                "mega_cols"=>1,
                "mega_group"=>0,
                "status"=>1,
                "ordering"=>3,
                "showtitle"=>1,
                "mega_subcontent"=>1,
                "mega_width"=>0,
                "mega_colw"=>0,
                "browserNav"=>0,
                "shownumproduct"=>2
            ),
            array(
            "title"=>"Dinner",
            "link"=>"foods-and-beverages-catalog/dinner-catalog.html",
            "url"=>"foods-and-beverages-catalog/dinner-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"foods-and-beverages-catalog/dinner-catalog.html",
            "cms"=>"home",
            "parent"=>"Foods and Beverages,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>4,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Street Foods",
            "link"=>"foods-and-beverages-catalog/street-foods-catalog.html",
            "url"=>"foods-and-beverages-catalog/street-foods-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"foods-and-beverages-catalog/street-foods-catalog.html",
            "cms"=>"home",
            "parent"=>"Foods and Beverages,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>5,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Bakery & Pastry",
            "link"=>"foods-and-beverages-catalog/street-foods-catalog.html",
            "url"=>"foods-and-beverages-catalog/street-foods-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"foods-and-beverages-catalog/street-foods-catalog.html",
            "cms"=>"home",
            "parent"=>"Foods and Beverages,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>6,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Pizzas",
            "link"=>"foods-and-beverages-catalog/pizzas-catalog.html",
            "url"=>"foods-and-beverages-catalog/pizzas-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"foods-and-beverages-catalog/pizzas-catalog.html",
            "cms"=>"home",
            "parent"=>"Foods and Beverages,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>7,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Traditional Sweets",
            "link"=>"foods-and-beverages-catalog/traditional-sweets-catalog.html",
            "url"=>"foods-and-beverages-catalog/traditional-sweets-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"foods-and-beverages-catalog/traditional-sweets-catalog.html",
            "cms"=>"home",
            "parent"=>"Foods and Beverages,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>8,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Beverages",
            "link"=>"foods-and-beverages-catalog/beverages-catalog.html",
            "url"=>"foods-and-beverages-catalog/beverages-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"foods-and-beverages-catalog/beverages-catalog.html",
            "cms"=>"home",
            "parent"=>"Foods and Beverages,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>9,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Materials",
            "link"=>"materials-catalog.html",
            "url"=>"materials-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog.html",
            "cms"=>"home",
            "parent"=>0,
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>6,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>3,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>1200,
            "mega_colw"=>200,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Meat",
            "link"=>"materials-catalog/meat-catalog.html",
            "url"=>"materials-catalog/meat-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/meat-catalog.html",
            "cms"=>"home",
            "parent"=>"Materials,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>1,
            "status"=>1,
            "ordering"=>1,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Meats Cut to Order",
            "link"=>"materials-catalog/meat-catalog/meats-cut-to-order-catalog.html",
            "url"=>"materials-catalog/meat-catalog/meats-cut-to-order-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/meat-catalog/meats-cut-to-order-catalog.html",
            "cms"=>"home",
            "parent"=>"Meat,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>1,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Grinds, Cubed & Sausage",
            "link"=>"materials-catalog/meat-catalog/grinds-cubed-sausage-catalog.html",
            "url"=>"materials-catalog/meat-catalog/grinds-cubed-sausage-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/meat-catalog/grinds-cubed-sausage-catalog.html",
            "cms"=>"home",
            "parent"=>"Meat,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>2,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Prepped to Cook",
            "link"=>"materials-catalog/meat-catalog/prepped-to-cook-catalog.html",
            "url"=>"materials-catalog/meat-catalog/prepped-to-cook-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/meat-catalog/prepped-to-cook-catalog.html",
            "cms"=>"home",
            "parent"=>"Meat,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>3,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Vegetables",
            "link"=>"materials-catalog/vegetables-catalog.html",
            "url"=>"materials-catalog/vegetables-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/vegetables-catalog.html",
            "cms"=>"home",
            "parent"=>"Materials,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>2,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Seafood",
            "link"=>"materials-catalog/seafood-catalog.html",
            "url"=>"materials-catalog/seafood-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/seafood-catalog.html",
            "cms"=>"home",
            "parent"=>"Materials,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>1,
            "status"=>1,
            "ordering"=>3,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Seafood",
            "link"=>"materials-catalog/seafood-catalog/seafood-catalog.html",
            "url"=>"materials-catalog/seafood-catalog/seafood-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/seafood-catalog/seafood-catalog.html",
            "cms"=>"home",
            "parent"=>"Seafood,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>1,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Prepped to Cook",
            "link"=>"materials-catalog/seafood-catalog/prepped-to-cook-catalog.html",
            "url"=>"materials-catalog/seafood-catalog/prepped-to-cook-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/seafood-catalog/prepped-to-cook-catalog.html",
            "cms"=>"home",
            "parent"=>"Seafood,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>2,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Cheese",
            "link"=>"materials-catalog/cheese-catalog.html",
            "url"=>"materials-catalog/cheese-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/cheese-catalog.html",
            "cms"=>"home",
            "parent"=>"Materials,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>1,
            "status"=>1,
            "ordering"=>4,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Cheese",
            "link"=>"materials-catalog/cheese-catalog/cheese-catalog.html",
            "url"=>"materials-catalog/cheese-catalog/cheese-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/cheese-catalog/cheese-catalog.html",
            "cms"=>"home",
            "parent"=>"Cheese,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>1,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Firmness",
            "link"=>"materials-catalog/cheese-catalog/firmness-catalog.html",
            "url"=>"materials-catalog/cheese-catalog/firmness-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/cheese-catalog/firmness-catalog.html",
            "cms"=>"home",
            "parent"=>"Cheese,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>2,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Fruit",
            "link"=>"materials-catalog/fruit-catalog.html",
            "url"=>"materials-catalog/fruit-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/fruit-catalog.html",
            "cms"=>"home",
            "parent"=>"Materials,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>1,
            "status"=>1,
            "ordering"=>5,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Pre-Cut",
            "link"=>"materials-catalog/fruit-catalog/pre-cut-catalog.html",
            "url"=>"materials-catalog/fruit-catalog/pre-cut-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/fruit-catalog/pre-cut-catalog.html",
            "cms"=>"home",
            "parent"=>"Fruit,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>1,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Tropical & Specialty",
            "link"=>"materials-catalog/fruit-catalog/tropical-specialty-catalog.html",
            "url"=>"materials-catalog/fruit-catalog/tropical-specialty-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/fruit-catalog/tropical-specialty-catalog.html",
            "cms"=>"home",
            "parent"=>"Fruit,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>2,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Dairy",
            "link"=>"materials-catalog/dairy-catalog.html",
            "url"=>"materials-catalog/dairy-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/dairy-catalog.html",
            "cms"=>"home",
            "parent"=>"Materials,3",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>1,
            "status"=>1,
            "ordering"=>6,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Butter & Margarine",
            "link"=>"materials-catalog/dairy-catalog/butter-margarine-catalog.html",
            "url"=>"materials-catalog/dairy-catalog/butter-margarine-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/dairy-catalog/butter-margarine-catalog.html",
            "cms"=>"home",
            "parent"=>"Dairy,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>1,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Eggs",
            "link"=>"materials-catalog/dairy-catalog/eggs-catalog.html",
            "url"=>"materials-catalog/dairy-catalog/eggs-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/dairy-catalog/eggs-catalog.html",
            "cms"=>"home",
            "parent"=>"Dairy,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>2,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Cream & Creamers",
            "link"=>"materials-catalog/dairy-catalog/cream-creamers-catalog.html",
            "url"=>"materials-catalog/dairy-catalog/cream-creamers-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"materials-catalog/dairy-catalog/cream-creamers-catalog.html",
            "cms"=>"home",
            "parent"=>"Dairy,4",
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>3,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Recipe e-Books",
            "link"=>"recipe-e-books-catalog.html",
            "url"=>"recipe-e-books-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"recipe-e-books-catalog.html",
            "cms"=>"home",
            "parent"=>0,
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>4,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Cooking Appliances",
            "link"=>"cooking-appliances-catalog.html",
            "url"=>"cooking-appliances-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"cooking-appliances-catalog.html",
            "cms"=>"home",
            "parent"=>0,
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>5,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            ),array(
            "title"=>"Customized Meals",
            "link"=>"customized-meals-catalog.html",
            "url"=>"customized-meals-catalog.html",
            "catid"=>0,
            "menutype"=>"0",
            "category"=>"customized-meals-catalog.html",
            "cms"=>"home",
            "parent"=>0,
            "lft"=>0,
            "rgt"=>0,
            "mega_cols"=>1,
            "mega_group"=>0,
            "status"=>1,
            "ordering"=>6,
            "showtitle"=>1,
            "mega_subcontent"=>1,
            "mega_width"=>0,
            "mega_colw"=>0,
            "browserNav"=>0,
            "shownumproduct"=>2
            )
        );
    $kitchen = array(
        "title"=>"Kitchen Stories",
        "link"=>"/blog/",
        "url"=>"/blog/",
        "catid"=>0,
        "menutype"=>"2",
        "category"=>"/blog/",
        "cms"=>"home",
        "parent"=>0,
        "lft"=>0,
        "rgt"=>0,
        "mega_cols"=>1,
        "mega_group"=>0,
        "status"=>1,
        "ordering"=>7,
        "showtitle"=>1,
        "mega_subcontent"=>1,
        "mega_width"=>0,
        "mega_colw"=>0,
        "browserNav"=>0,
        "shownumproduct"=>0
    );
    $home = array(
        "title"=>"Home",
        "link"=>"/",
        "url"=>"/",
        "catid"=>0,
        "menutype"=>"2",
        "category"=>"/",
        "cms"=>"home",
        "parent"=>0,
        "lft"=>0,
        "rgt"=>0,
        "mega_cols"=>1,
        "mega_group"=>0,
        "status"=>1,
        "ordering"=>1,
        "showtitle"=>1,
        "mega_subcontent"=>1,
        "mega_width"=>0,
        "mega_colw"=>0,
        "browserNav"=>0,
        "shownumproduct"=>0
    );
$menuGroupModel = Mage::getModel('jmmegamenu/jmmegamenugroup');
$menuStoreGroupModel = Mage::getModel('jmmegamenu/jmmegamenustoregroup');
$megaMenuModel = Mage::getModel('jmmegamenu/jmmegamenu');
$categoryModel = Mage::getModel('catalog/category');
$parentList = array_column($megamenuBaseData, 'title');

foreach ($menuGroupData as $storeview) {
    $menuGroupModel->setData($storeview)->save();
    $groupId = $menuGroupModel->getId();
    $asignData = array(
        'store_id'      => $storeview['storeid'],
        'menugroupid'   => $groupId
    );
    $menuStoreGroupModel->setData($asignData)->save();

    // Get all category
    $categoryRootId = Mage::app()->getStore($storeview['storeid'])->getRootCategoryId();
    $categories = $categoryModel->getCollection()
        ->addFieldToFilter('path', array('like'=> "1/".$categoryRootId."/%"))
        ->setOrder('name')
        ->getData();
        
    $megamenuData = $megamenuBaseData;

    // Insert menu
    for($index = 0; $index < count($megamenuData); $index++) {
        $megamenuData[$index]['menugroup']=$groupId;

        // Set categry Url
        // Set Url
        $categoryIndex = array_search($megamenuData[$index]['title'],array_column($categories,'name'));
        $categoryUrl = Mage::getSingleton('core/url_rewrite')
            ->getResource()
            ->getRequestPathByIdPath('category/' . $categories[$categoryIndex]['entity_id'], $storeview['storeid']);

        if(is_string($megamenuData[$index]['parent']))
        {
            // Set Url for item level 2 and level 3 parent
            $parentPaser = explode(',',$megamenuData[$index]['parent']);
            $categoryIndex = array_search($megamenuData[$index]['title'],array_column($categories,'name'));

            // Detect parent and child are the same name
            if($parentPaser[1] != $categories[$categoryIndex]['level'])
            {
                $categoriesCp = $categories;
                unset($categoriesCp[$categoryIndex]);
                $categoryIndex = array_search($megamenuData[$index]['title'],array_column($categoriesCp,'name'))+1;
            }
            $categoryUrl = Mage::getSingleton('core/url_rewrite')
                ->getResource()
                ->getRequestPathByIdPath('category/' . $categories[$categoryIndex]['entity_id'], $storeview['storeid']);

            // Set parent id for item level 2 and level 3 parent
            $parentIndex = array_search($parentPaser[0], $parentList);
            $megamenuData[$index]['parent'] = $megamenuData[$parentIndex]['menu_id'];
        }

        $megamenuData[$index]['url']=$categoryUrl;
        $megamenuData[$index]['link']=$categoryUrl;
        $megamenuData[$index]['category']=$categoryUrl;

        try
        {
            $megaMenuModel->setData($megamenuData[$index]);
            $megaMenuModel->save();
            $megamenuData[$index]['menu_id'] = $megaMenuModel->getId();
        }
        catch(Exception $e)
        {
        }
    }

    $kitchen['menugroup']=$groupId;
    $home['menugroup']=$groupId;
    $megaMenuModel->setData($kitchen);
    $megaMenuModel->save();
    $megaMenuModel->setData($home);
    $megaMenuModel->save();

}

$installer->endSetup();
?>