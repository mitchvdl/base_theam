<?php
/**
 * File: Element.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 03.08.15 17:05
 * Package: Theam_Navigation
 */

class Theam_Navigation_Model_Element extends Mage_Core_Model_Abstract
{

    protected $_eventObject = 'element';

    protected function _construct()
    {
        $this->_init('theam_navigation/element');
    }
}
 