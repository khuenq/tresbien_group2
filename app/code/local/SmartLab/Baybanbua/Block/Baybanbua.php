<?php
/**
* 
*/
class SmartLab_Baybanbua_Block_Baybanbua extends Mage_Checkout_Block_Onepage_Shipping_Method_Available
{
	public function __construct(){
        $this->setTemplate('smartlab/baybanbua/termandcondition.phtml');      
    }
}
?>