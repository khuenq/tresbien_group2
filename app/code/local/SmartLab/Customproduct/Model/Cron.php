<?php

/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 7/25/2016
 * Time: 9:20 AM
 */
class SmartLab_Customproduct_Model_Cron
{

//    tao mot rule moi
    public function createRuleRank1()
    {
        $customerGroupIds = Mage::getModel('customer/group')->getCollection()->getAllIds();
        $websiteIds = Mage::getModel('core/website')->getCollection()->getAllIds();
        $from_date = date("Y-m-d", strtotime('-1 day'));
        $to_date = date('Y-m-d', strtotime('+2 month'));
        $data = array(
            'product_ids' => null,
            'name' => 'Auto create rank 1 discount',
            'description' => 'Auto create rank 1 discount',
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
            'discount_amount' => 10,
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
            'store_labels' => array('10% discount for customer rank 1')
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
    }

    public function createRuleRank2()
    {
        $customerGroupIds = Mage::getModel('customer/group')->getCollection()->getAllIds();
        $websiteIds = Mage::getModel('core/website')->getCollection()->getAllIds();
        $from_date = date("Y-m-d", strtotime('-1 day'));
        $to_date = $date = date('Y-m-d', strtotime('+2 month'));
        $data = array(
            'product_ids' => null,
            'name' => 'Auto create rank 2 discount',
            'description' => 'Auto create rank 2 discount',
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
            'discount_amount' => 20,
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
            'store_labels' => array('20% discount for customer rank 2')
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

    }

    public function createRuleRank3()
    {
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

    }

    public function sendEmailToCustomer($customer_mail, $customer_name, $ranknote, $rdCode)
    {
        $mailTemplate = Mage::getModel('core/email_template');
        $mail = $mailTemplate->loadByCode('Send Code To Customer');
        $templateId = $mail->getId();
        $template_collection = $mailTemplate->load($templateId);
        $template_data = $template_collection->getData();

        $translate = Mage::getSingleton('core/translate');
        $mailSubject = $template_data['template_subject'];
        $from_email = Mage::getStoreConfig('trans_email/ident_general/email'); //fetch sender email
        $from_name = Mage::getStoreConfig('trans_email/ident_general/name'); //fetch sender name

        $sender = array('name' => $from_name,
            'email' => $from_email);
        $vars = array('dc_code' => "Vip code",
            'dc_rank' => $ranknote,
            'dc_vipcode' => $rdCode); //for replacing the variables in email with data
        /*This is optional*/
        $storeId = Mage::app()->getStore()->getId();
        $model = $mailTemplate->setReplyTo($sender['email'])->setTemplateSubject($mailSubject);
        $email = $customer_mail;
        $name = $customer_name;
        $model->sendTransactional($templateId, $sender, $email, $name, $vars, $storeId);
        if (!$mailTemplate->getSentSuccess()) {
            throw new Exception();
        }
        $translate->setTranslateInline(true);
    }

    public function cronRank1()
    {
        $date = date("Y-m-d", Mage::getModel('core/date')->timestamp(time()));
//        lay data rule co ten la auto create rank 1
        $model = Mage::getModel('salesrule/rule')
            ->getCollection()
            ->addFieldToFilter('name', array('eq' => 'Auto create rank 1 discount'))
            ->getFirstItem();

        $todate = $model->getto_date();

//        so sanh ngay het han voi ngay hom nay
        if ($todate > $date) {

            $collection = mage::getModel('customer/customer')->getCollection()
                ->addAttributeToSelect('productcode');
//            lay danh sach user co rank 1
            foreach ($collection as $user) {
                $rank = substr($user->getData("productcode"), -1);
                if ($rank == "1") {
                    $customer_mail = $user->getEmail();
                    $customer_name = $user->getName();
                    $ranknote = "Bronze";
                    $rdCode = $model->getCode();
                    $this->sendEmailToCustomer($customer_mail, $customer_name, $ranknote, $rdCode);
                }
            }
        } else {
            $model->delete();
            $this->createRuleRank1();

            $model = Mage::getModel('salesrule/rule')
                ->getCollection()
                ->addFieldToFilter('name', array('eq' => 'Auto create rank 1 discount'))
                ->getFirstItem();

            $collection = mage::getModel('customer/customer')->getCollection()
                ->addAttributeToSelect('productcode');

            foreach ($collection as $user) {
                $rank = substr($user->getData("productcode"), -1);
                if ($rank == "1") {
                    $customer_mail = $user->getEmail();
                    $customer_name = $user->getName();
                    $email_subject = "Subject: Weekly voucher for vip customer";
                    $ranknote = "Bronze";
                    $rdCode = $model->getCode();
                    $this->sendEmailToCustomer($customer_mail, $customer_name, $email_subject, $ranknote, $rdCode);
                }
            }
        }
    }

    public function cronRank2()
    {
        $date = date("Y-m-d", Mage::getModel('core/date')->timestamp(time()));
//        lay data rule co ten la auto create rank 1
        $model = Mage::getModel('salesrule/rule')
            ->getCollection()
            ->addFieldToFilter('name', array('eq' => 'Auto create rank 2 discount'))
            ->getFirstItem();

        $todate = $model->getto_date();

//        so sanh ngay het han voi ngay hom nay
        if ($todate > $date) {

            $collection = mage::getModel('customer/customer')->getCollection()
                ->addAttributeToSelect('productcode')
                ->addAttributeToSort('email', 'ASC');

//            lay danh sach user co rank 1
            foreach ($collection as $user) {
                $rank = substr($user->getData("productcode"), -1);
                if ($rank == "2") {
                    $customer_mail = $user->getEmail();
                    $customer_name = $user->getName();
                    $ranknote = "Silver";
                    $rdCode = $model->getCode();
                    $this->sendEmailToCustomer($customer_mail, $customer_name, $ranknote, $rdCode);
                }
            }
        } else {
            $model->delete();
            $this->createRuleRank2();

            $model = Mage::getModel('salesrule/rule')
                ->getCollection()
                ->addFieldToFilter('name', array('eq' => 'Auto create rank 2 discount'))
                ->getFirstItem();

            $collection = mage::getModel('customer/customer')->getCollection()
                ->addAttributeToSelect('productcode')
                ->addAttributeToSort('email', 'ASC');

            foreach ($collection as $user) {
                $rank = substr($user->getData("productcode"), -1);
                if ($rank == "2") {
                    $customer_mail = $user->getEmail();
                    $customer_name = $user->getName();
                    $email_subject = "Subject: Weekly voucher for vip customer";
                    $ranknote = "Silver";
                    $rdCode = $model->getCode();
                    $this->sendEmailToCustomer($customer_mail, $customer_name, $email_subject, $ranknote, $rdCode);
                }
            }
        }
    }

    public function cronRank3()
    {
        $date = date("Y-m-d", Mage::getModel('core/date')->timestamp(time()));
//        lay data rule co ten la auto create rank 1
        $model = Mage::getModel('salesrule/rule')
            ->getCollection()
            ->addFieldToFilter('name', array('eq' => 'Auto create rank 3 discount'))
            ->getFirstItem();

        $todate = $model->getto_date();

//        so sanh ngay het han voi ngay hom nay
        if ($todate > $date) {

            $collection = mage::getModel('customer/customer')->getCollection()
                ->addAttributeToSelect('productcode')
                ->addAttributeToSort('email', 'ASC');

//            lay danh sach user co rank 1
            foreach ($collection as $user) {
                $rank = substr($user->getData("productcode"), -1);
                if ($rank == "3") {
                    $customer_mail = $user->getEmail();
                    $customer_name = $user->getName();
                    $ranknote = "Gold";
                    $rdCode = $model->getCode();
                    $this->sendEmailToCustomer($customer_mail, $customer_name, $ranknote, $rdCode);
                }
            }
        } else {
            $model->delete();
            $this->createRuleRank3();

            $model = Mage::getModel('salesrule/rule')
                ->getCollection()
                ->addFieldToFilter('name', array('eq' => 'Auto create rank 3 discount'))
                ->getFirstItem();

            $collection = mage::getModel('customer/customer')->getCollection()
                ->addAttributeToSelect('productcode')
                ->addAttributeToSort('email', 'ASC');

            foreach ($collection as $user) {
                $rank = substr($user->getData("productcode"), -1);
                if ($rank == "3") {
                    $customer_mail = $user->getEmail();
                    $customer_name = $user->getName();
                    $email_subject = "Subject: Weekly voucher for vip customer";
                    $ranknote = "Gold";
                    $rdCode = $model->getCode();
                    $this->sendEmailToCustomer($customer_mail, $customer_name, $email_subject, $ranknote, $rdCode);
                }
            }
        }
    }

//    function cron
    public function cronTest()
    {
        $this->cronRank1();
        $this->cronRank2();
        $this->cronRank3();


    }


}