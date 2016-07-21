<?php

//require_once '/home/.../public_html/.../app/Mage.php';

class SmartLab_Kimochigate_IndexController extends Mage_Core_Controller_Front_Action
{
	// public function indexAction(){
	// 	$this->loadLayout();
	//     $this->renderLayout();
	// }
	public function indexAction ()
   { 
   	
		// // umask(0);
		/* not Mage::run(); */
		Mage::app('base');
		 
		// get layout object
		$layout = Mage::getSingleton('core/layout');
		 
		//get block object
		$block = $layout->createBlock('kimochigate/kimochigate');
		 
		/* choose whatever category ID you want */
		//$block->setCategoryId(3);
		$block->setTemplate('kimochigate/kimochigate.phtml');
		 
		echo $block->renderView();
    }
}