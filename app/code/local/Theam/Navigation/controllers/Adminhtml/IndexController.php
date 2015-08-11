<?php
/**
 * File: IndexController.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 03.08.15 16:46
 * Package: Theam_Navigation
 */
 

class Theam_Navigation_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        echo now();
    }
    protected function _isAllowed()
    {
        return true;
    }


}