<?php

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->run("
UPDATE {$this->getTable('core_email_template')} SET `template_text` = 'Name: {{var data.name}}\r\nE-mail: {{var data.email}}\r\nTelephone: {{var data.telephone}}\r\n\r\nComment: {{var data.comment}}' WHERE template_code = 'Booking Contact Form (Plain)';
");
$installer->endSetup();
