<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 7/21/2016
 * Time: 2:24 PM
 */
$installer = $this;
$installer->startSetup();
$templates = array(
    array(
        "name" => "Send Code To Customer",
        "code" => "sales_email_order_template",
        "config" => "sales_email/order/template",
        "text" => "
              {{template config_path='design/email/header'}}
        {{inlinecss file='email-inline.css'}}
        <table cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td>
                <table cellpadding='0' cellspacing='0' border='0'>
                <tr>
                    <td class='email-heading'>
                        <h1>Thanks for buying our product DC</h1>

                        <p>This email will be sent to you every week to provide you the newest gift code for your rank: {{var dc_rank}}</p>
                    </td>
                    <td class='store-info'>
                        <h4>Order Questions?</h4>
                        <p>
                            {{depend store_phone}}
                            <b>Call Us:</b>
                            <a href='tel:{{var phone}}'>{{var store_phone}}</a><br>
                            {{/depend}}
                            {{depend store_hours}}
                            <span class='no-link'>{{var store_hours}}</span><br>
                            {{/depend}}
                            {{depend store_email}}
                            <b>Email:</b> <a href='mailto:{{var store_email}}'>{{var store_email}}</a>
                            {{/depend}}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        </tr>
        <tr>
        <td class='order-details'>
            <h3>The certification ID number of this product is : </h3>
            <p> {{var dc_vipcode}}</p>
        </td>
        </tr>
        </table>
            <h2>Thank you very much.</h2>


")
);
foreach ($templates as $template) {
    // Load email template from file
    $fileTemplate = Mage::getModel('core/email_template')->loadDefault($template["code"]);
    // Create email template
    $templateDb = Mage::getModel('core/email_template')
        ->setTemplateCode($template["name"])
        ->setTemplateSubject("Subject: Weekly voucher for vip customer")
        ->setTemplateText($template["text"])
        ->setTemplateStyles($fileTemplate->getTemplateStyles())
        ->setModifiedAt(Mage::getSingleton('core/date')->gmtDate())
        ->setOrigTemplateCode($template["code"])
        ->setOrigTemplateVariables($fileTemplate->getOrigTemplateVariables())
        ->setTemplateType(Mage_Core_Model_Email_Template::TYPE_HTML)
        ->save();
    // Set this template in config
    $installer->setConfigData($template["config"], $templateDb->getId());
}
$this->endSetup();

