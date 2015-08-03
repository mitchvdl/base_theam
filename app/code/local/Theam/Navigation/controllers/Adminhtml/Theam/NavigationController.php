<?php
/**
 * File: NavigationController.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 03.08.15 16:46
 * Package: Theam_Navigation
 */
 

class Theam_Navigation_Adminhtml_Theam_NavigationController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        echo now();
    }

    /**
     * Check if admin has permissions to visit related pages
     *
     * @return boolean
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('theam/theam_navigation');
    }


}