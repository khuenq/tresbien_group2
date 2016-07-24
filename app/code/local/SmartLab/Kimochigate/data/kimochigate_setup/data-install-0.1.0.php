<?php
$datas = array(
	array(
		'customer_name'=>'Nguyen Van A',
		'account_number'=>'1234567891113151719',
		'balances'=>1000000000000000.1234,
		'status'=>'1',
		'created_time'=>'2016-07-22',
		'update_time'=>'2016-07-22'
	),
	array(
		'customer_name'=>'Nguyen Van B',
		'account_number'=>'1234567891113151710',
		'balances'=>1000000000000000.1234,
		'status'=>'0',
		'created_time'=>'2016-07-22',
		'update_time'=>'2016-07-22'
	),
	array(
		'customer_name'=>'Nguyen Van C',
		'account_number'=>'1234567891113151711',
		'balances'=>0.0,
		'status'=>'1',
		'created_time'=>'2016-07-22',
		'update_time'=>'2016-07-22'
	),
);

$installer=$this;
$installer->startSetup();

$bankModel = Mage::getModel('kimochigate/bank');

foreach ($datas as $data) {
	$bankModel->setData($data);
	$bankModel->save();
}

$installer->endSetup();
?>
