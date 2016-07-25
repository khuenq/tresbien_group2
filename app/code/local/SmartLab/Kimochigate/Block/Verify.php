<?php

class SmartLab_Kimochigate_Block_Verify extends Mage_Core_Block_Template
{
	public function getActionOfForm()
		{
		return $this->getUrl('kimochigate/index/verify');
	}

}