<?php

/*-----------------------------------------------------------------------------------------------------
 * Install Websites and Stores Structure
 *----------------------------------------------------------------------------------------------------*/
$vietCategory= Mage::getModel('catalog/category')
    ->getCollection()
    ->addFieldToFilter('name', 'Vietnam')->getFirstItem();
    $vietId= $vietCategory->getId();

    $koreaCategory=Mage::getModel('catalog/category')
    ->getCollection()
    ->addFieldToFilter('name', 'Korea')->getFirstItem();
    $koreaId=$koreaCategory->getId();

    $chinaCategory=Mage::getModel('catalog/category')
    ->getCollection()
    ->addFieldToFilter('name', 'China')->getFirstItem();
    $chinaId=$chinaCategory->getId();

//#addWebsite vn.local.tres-bien
    /** @var $website Mage_Core_Model_Website */
    $vnwebsite = Mage::getModel('core/website');
    $vnwebsite->setCode('vn_tres_bien')
        ->setName('vn.local.tres-bien.com')
        ->save();

//#addWebsite cn.local.tres-bien
    /** @var $website Mage_Core_Model_Website */
    $cnwebsite = Mage::getModel('core/website');
    $cnwebsite->setCode('cn_tres_bien')
        ->setName('cn.local.tres-bien.com')
        ->save();

//#addWebsite kr.local.tres-bien
    /** @var $website Mage_Core_Model_Website */
    $krwebsite = Mage::getModel('core/website');
    $krwebsite->setCode('kr_tres_bien')
        ->setName('kr.local.tres-bien.com')
        ->save();

//#addStoreGroup
        // Get category root id by code

    /** @var $storeGroup vn Mage_Core_Model_Store_Group */
    $vnstoreGroup = Mage::getModel('core/store_group');
    $vnstoreGroup->setWebsiteId($vnwebsite->getId())
        ->setName('Tres Bien VietNam')
        ->setRootCategoryId($vietId)
        ->save();

      /** @var $storeGroup cn Mage_Core_Model_Store_Group */
    $cnstoreGroup = Mage::getModel('core/store_group');
    $cnstoreGroup->setWebsiteId($cnwebsite->getId())
        ->setName('Tres Bien China')
        ->setRootCategoryId($chinaId)
        ->save();

      // * @var $storeGroup kr Mage_Core_Model_Store_Group 
    $krstoreGroup = Mage::getModel('core/store_group');
    $krstoreGroup->setWebsiteId($krwebsite->getId())
        ->setName('Tres Bien Korea')
        ->setRootCategoryId($koreaId)
        ->save();

//#addStore
    //* @var vn $store Mage_Core_Model_Store 
   
  

    $vnstore = Mage::getModel('core/store');
    $vnstore->setCode('en_vn_tres_bien')
        ->setWebsiteId($vnstoreGroup->getWebsiteId())
        ->setGroupId($vnstoreGroup->getId())
        ->setName('English')
        ->setIsActive(1)
        ->save();
  
            
    $vnstore2 = Mage::getModel('core/store');
    $vnstore2->setCode('vi_vn_tres_bien')
        ->setWebsiteId($vnstoreGroup->getWebsiteId())
        ->setGroupId($vnstoreGroup->getId())
        ->setName('Tiếng Việt')
        ->setIsActive(1)
        ->save();
   

     //* @var cn $store Mage_Core_Model_Store 
    $cnstore = Mage::getModel('core/store');
    $cnstore->setCode('en_cn_tres_bien')
        ->setWebsiteId($cnstoreGroup->getWebsiteId())
        ->setGroupId($cnstoreGroup->getId())
        ->setName('English')
        ->setIsActive(1)
        ->save();
  
            
    $cnstore2 = Mage::getModel('core/store');
    $cnstore2->setCode('cn_cn_tres_bien')
        ->setWebsiteId($cnstoreGroup->getWebsiteId())
        ->setGroupId($cnstoreGroup->getId())
        ->setName('China')
        ->setIsActive(1)
        ->save();
    

     //* @var kr $store Mage_Core_Model_Store 
    $krstore = Mage::getModel('core/store');
    $krstore->setCode('en_kr_tres_bien')
        ->setWebsiteId($krstoreGroup->getWebsiteId())
        ->setGroupId($krstoreGroup->getId())
        ->setName('English')
        ->setIsActive(1)
        ->save();
    
            
    $krstore2 = Mage::getModel('core/store');
    $krstore2->setCode('kr_kr_tres_bien')
        ->setWebsiteId($krstoreGroup->getWebsiteId())
        ->setGroupId($krstoreGroup->getId())
        ->setName('Korea')
        ->setIsActive(1)
        ->save();

    $installer=$this;
    $installer->startSetup();
    $vnvalue='http://vn.local.tres-bien.com/';
    $cnvalue='http://cn.local.tres-bien.com/';
    $krvalue='http://kr.local.tres-bien.com/';

    // VN store group url
    $vnWebsiteId = Mage::getModel('core/website')->load('vn_tres_bien','code')->getId();
    $installer->setConfigData('web/unsecure/base_url',$vnvalue,'websites',$vnWebsiteId);
    $installer->setConfigData('web/secure/base_url',$vnvalue,'websites',$vnWebsiteId);
     
    // CN store group url
    $cnWebsiteId = Mage::getModel('core/website')->load('cn_tres_bien','code')->getId();
    $installer->setConfigData('web/unsecure/base_url',$cnvalue,'websites',$cnWebsiteId);
    $installer->setConfigData('web/secure/base_url',$cnvalue,'websites',$cnWebsiteId);
    $installer->setConfigData('design/package/name/','sm','websites',$cnWebsiteId);
    $installer->setConfigData('currency/options/allow','CNY,KRW,USD,VND','default',0);

    // KR store group url
    $krWebsiteId = Mage::getModel('core/website')->load('kr_tres_bien','code')->getId();
    $installer->setConfigData('web/unsecure/base_url',$krvalue,'websites',$krWebsiteId);
    $installer->setConfigData('web/secure/base_url',$krvalue,'websites',$krWebsiteId);
    $installer->setConfigData('design/package/name/','sm','websites',$krWebsiteId);
    $installer->setConfigData('currency/options/allow','CNY,KRW,USD,VND','default',0);

    // Config by thanhnd
    // VN theme package, locale
    $installer->setConfigData('design/package/name','sm','websites',$vnWebsiteId);
    $installer->setConfigData('general/country/default','VN','websites',$vnWebsiteId);
    $installer->setConfigData('general/locale/code','vi_VN','websites',$vnWebsiteId);

     // CN theme package, locale
    $installer->setConfigData('design/package/name','sm','websites',$cnWebsiteId);
    $installer->setConfigData('general/country/default','CN','websites',$cnWebsiteId);
    $installer->setConfigData('general/locale/code','zh_CN','websites',$cnWebsiteId);

     // KR theme package, locale
    $installer->setConfigData('design/package/name','sm','websites',$krWebsiteId);
    $installer->setConfigData('general/country/default','KR','websites',$krWebsiteId);
    $installer->setConfigData('general/locale/code','ko_KR','websites',$krWebsiteId);

    $installer->endSetup();

?>
