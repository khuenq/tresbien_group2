<?php

$installer = $this;
$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS {$this->getTable('kimochibank')};
CREATE TABLE {$this->getTable('kimochibank')} (
  `kimochibank_id` int(11) unsigned NOT NULL auto_increment,
  `customer_name` varchar(255) NOT NULL default '',
  `account_number` varchar(255) NOT NULL default '',
  `balances` decimal(20,4) NOT NULL default '0',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`kimochibank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 