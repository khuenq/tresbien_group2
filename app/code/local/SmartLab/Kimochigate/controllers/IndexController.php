<?php

//require_once '/home/.../public_html/.../app/Mage.php';

class SmartLab_Kimochigate_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction ()
    {	
		$this->loadLayout();
		$this->renderLayout();
    }

    public function verifyAction()
    {
    	$this->loadLayout();
		$this->renderLayout();
    }

    public function successAction()
    {
    	$data = $this->getRequest()->getParams();
    	if (0 == $data['success']) {
    		$this->_redirect('godzaipayment/index/response',array('_secure'=>false,'flag'=>0,'orderId'=>$orderId));
    	}
    	else
    	{
    		$orderId = explode('^_^',base64_decode($data['orderDetail']))[0];
    		$this->_redirect('godzaipayment/index/response',array('_secure'=>false,'flag'=>1,'orderId'=>$orderId));
    	}
    }

    public function paidAction()
    {
    	$data = $this->getRequest()->getParams();
    	$account = Mage::getModel('kimochigate/bank')->load($data['account'],'account_number');
    	$checkPaid = 0;
    	if(0 == $account->getStatus())
    	{
    		$checkPaid = 1;
    	}
    	else if($account->getBalances() < $data['price']+5000)
    	{
    		$checkPaid = 2;
    	}
    	$this->getResponse()->setBody(json_encode($checkPaid));
    }
}