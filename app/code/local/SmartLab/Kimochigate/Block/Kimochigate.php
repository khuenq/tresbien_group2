<?php

class SmartLab_Kimochigate_Block_Kimochigate extends Mage_Core_Block_Template
{
	public function getActionOfForm()
		{
		return $this->getUrl('kimochigate');
	}

}