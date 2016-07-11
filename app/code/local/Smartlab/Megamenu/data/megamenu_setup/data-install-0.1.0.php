<?php  

	define("CN_WEBSITE_CODE", 'cn_tresbien');
	define("VN_WEBSITE_CODE", 'vn_tresbien');
	define("KR_WEBSITE_CODE", 'kr_tresbien');

	// Get all store
	function getAllWebsiteStore($website_code)
	{
		// Get website
		$website = Mage::getModel('core/website')->load($website_code, 'code');

		// Get all store
		$stores = $website->getStoreIds();

		return $stores;
	}

	// Create website megamenu
	function createMegaMenu($website_code)
	{
		// Get website
		$website = Mage::getSingleton('core/website')->load($website_code, 'code');

		// Get all store id
		$storeIds = $website->getStoreIds();

		// Get Category tree
		foreach ($storeIds as $storeId) {
			$rootCategoryId = Mage::getSingleton('core/store')->load($storeId)->getRootCategoryId();
			$categories = Mage::getSingleton('catalog/category')->getCategories($rootCategoryId);

			echo "<pre>";
			var_dump($categories); die();
		}
		
	}

	createMegaMenu(VN_WEBSITE_CODE);

	$vnStores = getAllWebsiteStore(VN_WEBSITE_CODE);
	$cnStores = getAllWebsiteStore(CN_WEBSITE_CODE);
	$krStores = getAllWebsiteStore(KR_WEBSITE_CODE);

	$tresbienStores = array_merge($vnStores,$cnStores,$krStores);

	//var_dump($tresbienStores); die();
	// Get vietnam website
	/*$vnSiteId = Mage::getResourceModel('core/website_collection')
		->addFieldToFilter('code',VN_WEBSITE_CODE)->getFirstItem()->getId();

	var_dump($vnSiteId); die();

	// Gets the current store's details
	$store = Mage::getModel('core/store')->getStore();
 
	// Gets the current store's id
	$storeId = Mage::app()->getStore()->getStoreId();

	var_dump($storeId); die();

	$getTestMegamenu = Mage::getModel('jmmegamenu/jmmegamenustoregroup')->load(1)->getData();
	var_dump($getTestMegamenu); die();*/
	//$testMegamneu = array();
?>
