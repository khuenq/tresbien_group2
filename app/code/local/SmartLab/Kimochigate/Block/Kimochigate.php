<?php

class SmartLab_Kimochigate_Block_Kimochigate extends Mage_Core_Block_Template
{
	// public function _prepareLayout(){
	// 	return parent::_prepareLayout();
	// }
	 // public function __construct()
  // {
  //   $this->setTemplate('kimochigate/kimochigate.phtml');  
  // }
	public function getActionOfForm()
		{
		return $this->getUrl('kimochigate');
	}

}