<?php

class SmartLab_Kimochigate_VerifyController extends Mage_Core_Controller_Front_Action
{
    	public function indexAction ()
   { 
		$layout = Mage::getSingleton('core/layout');
		$block = $layout->createBlock('kimochigate/kimochiverify');
		$block->setTemplate('kimochiverify/kimochiverify.phtml');
		 
		echo $block->renderView();
    }
}