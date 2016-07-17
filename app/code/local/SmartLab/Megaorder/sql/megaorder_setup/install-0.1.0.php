<?php
$installer = $this;
$statusOrderTable = $installer->getTable('sales/order_status');
$stateOrderStatus = $installer->getTable('sales/order_status_state');

$installer->getConnection()->insertArray(
	$statusOrderTable,
	array('status','label'),
	array(
		array('status'=>'shipped','label'=>'Shipped')
	)
);

$installer->getConnection()->insertArray(
	$stateOrderStatus,
	array('status','state','is_default'),
	array(
		array('status'=>'shipped', 'state'=>'processing', 'is_default'=>0)
	)
);

?>
