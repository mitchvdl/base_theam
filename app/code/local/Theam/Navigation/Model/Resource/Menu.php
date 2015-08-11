<?php
/**
 * File: Menu.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 03.08.15 17:06
 * Package: Theam_Navigation
 */

class Theam_Navigation_Model_Resource_Menu extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('theam_navigation/menu', 'entity_id');
    }
}
 