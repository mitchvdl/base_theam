<?php
/**
 * File: install-1.0.0.0.php
 * 
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 */

/** @var Theam_Navigation_Model_Resource_Setup $installer */
$installer = $this;

$table = $installer->getConnection()
    ->newTable($installer->getTable('theam_navigation/menu'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Entity Id')
    ->addColumn('website_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
    ), 'Website Id')
    ->addColumn('Label', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => true,
    ), 'Label')
    ->addColumn('checksum', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => true,
    ), 'checksum')
    ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
    ), 'Is Active')
    ->addColumn('active_from', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ), 'Active From')
    ->addColumn('active_untill', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => true,
    ), 'Active Until')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
        'default'   => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
    ), 'Created At')
    ->setComment('Theam Navigation Menu');

$installer->getConnection()->createTable($table);
$installer->endSetup();
