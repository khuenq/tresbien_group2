<?php
//Mage::registry('isSecureArea');

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
        ->setName('vn_tres_bien')
        ->setRootCategoryId($vietId)
        //->setRootCategoryId('default')
        ->save();
    //$vnstoreGroup = Mage::getModel('core/store');
    //var_dump($vnstoreGroup->load('en_vn_tres_bien','name')->getData()); die();

      /** @var $storeGroup cn Mage_Core_Model_Store_Group */
    $cnstoreGroup = Mage::getModel('core/store_group');
    $cnstoreGroup->setWebsiteId($cnwebsite->getId())
        ->setName('cn_tres_bien')
        ->setRootCategoryId($chinaId)
        //->setRootCategoryId('default')
        ->save();

      /** @var $storeGroup kr Mage_Core_Model_Store_Group */
    $krstoreGroup = Mage::getModel('core/store_group');
    $krstoreGroup->setWebsiteId($krwebsite->getId())
        ->setName('kr_tres_bien')
        ->setRootCategoryId($koreaId)
        //->setRootCategoryId('default')
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
    $vnvalue='http://vn.local.tres-bien.com:4040/';
    $cnvalue='http://cn.local.tres-bien.com:4040/';
    $krvalue='http://kr.local.tres-bien.com:4040/';

    // VN website url
    $vnstoreGroupId = Mage::getModel('core/website')->load('vn_tres_bien','code')->getId();
    $installer->setConfigData('web/unsecure/base_url',$vnvalue,'websites',$vnstoreGroupId);
    $installer->setConfigData('web/secure/base_url',$vnvalue,'websites',$vnstoreGroupId);
     
    // CN website url
    $cnstoreGroupId = Mage::getModel('core/website')->load('cn_tres_bien','code')->getId();
    $installer->setConfigData('web/unsecure/base_url',$cnvalue,'websites',$cnstoreGroupId);
    $installer->setConfigData('web/secure/base_url',$cnvalue,'websites',$cnstoreGroupId);

    // KR website url
    $krstoreGroupId = Mage::getModel('core/website')->load('kr_tres_bien','code')->getId();
    $installer->setConfigData('web/unsecure/base_url',$krvalue,'websites',$krstoreGroupId);
    $installer->setConfigData('web/secure/base_url',$krvalue,'websites',$krstoreGroupId);
    $installer->endSetup();

    ?>