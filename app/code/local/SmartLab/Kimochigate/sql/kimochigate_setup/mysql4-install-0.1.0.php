<?php

$installer = $this;
$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('kimochigate')};
CREATE TABLE {$this->getTable('kimochigate')} (
  `kimochigate_id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `cardno` varchar(50) NOT NULL default '',
  PRIMARY KEY (`kimochigate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 