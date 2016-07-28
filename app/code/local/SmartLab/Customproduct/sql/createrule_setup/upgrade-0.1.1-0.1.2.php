<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 7/25/2016
 * Time: 10:41 AM
 */

$customerGroupIds = Mage::getModel('customer/group')->getCollection()->getAllIds();
$websiteIds = Mage::getModel('core/website')->getCollection()->getAllIds();
$from_date = date("Y-m-d", strtotime('-1 day'));
$to_date = $date = date('Y-m-d', strtotime('+2 month'));
$data = array(
    'product_ids' => null,
    'name' => 'Auto create rank 3 discount',
    'description' => 'Auto create rank 3 discount',
    'is_active' => 1,
    'website_ids' => $websiteIds,
    'customer_group_ids' => $customerGroupIds,
    'coupon_type' => 2,
    'coupon_code' => Mage::helper('core')->getRandomString(16),
    'uses_per_coupon' => 1000,
    'uses_per_customer' => 1000,
    'from_date' => $from_date,
    'to_date' => $to_date,
    'sort_order' => null,
    'is_rss' => 1,
    'rule' => array(
        'conditions' => array(
            array(
                'type' => 'salesrule/rule_condition_combine',
                'aggregator' => 'all',
                'value' => 1,
                'new_child' => null
            )
        )
    ),
    'simple_action' => 'by_percent',
    'discount_amount' => 30,
    'discount_qty' => 0,
    'discount_step' => null,
    'apply_to_shipping' => 0,
    'simple_free_shipping' => 0,
    'stop_rules_processing' => 0,
    'rule' => array(
        'actions' => array(
            array(
                'type' => 'salesrule/rule_condition_product_combine',
                'aggregator' => 'all',
                'value' => 1,
                'new_child' => null
            )
        )
    ),
    'store_labels' => array('30% discount for customer rank 3')
);

$model = Mage::getModel('salesrule/rule');
$validateResult = $model->validateData(new Varien_Object($data));

if ($validateResult == true) {

    if (isset($data['simple_action']) && $data['simple_action'] == 'by_percent'
        && isset($data['discount_amount'])
    ) {
        $data['discount_amount'] = min(100, $data['discount_amount']);
    }

    if (isset($data['rule']['conditions'])) {
        $data['conditions'] = $data['rule']['conditions'];
    }

    if (isset($data['rule']['actions'])) {
        $data['actions'] = $data['rule']['actions'];
    }

    unset($data['rule']);

    $model->loadPost($data);

    $model->save();
}
