<?php
/**
 * File: Collection.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 03.08.15 17:08
 * Package: Theam_Navigation
 */

class Theam_Navigation_Model_Resource_Element_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    protected function _construct()
    {
        $this->_init('theam_navigation/element');
    }
}
 