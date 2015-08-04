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

    /**
     * Check if module functionality enabled
     *
     * @return Itanium_Referral_Adminhtml_Referral_RateController
     */
    public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::helper('theam_navigation')->isEnabled() && $this->getRequest()->getActionName() != 'noroute') {
            $this->_forward('noroute');
        }
        return $this;
    }

    /**
     * Initialize layout, breadcrumbs
     *
     * @return Itanium_Referral_Adminhtml_Referral_RateController
     */
    protected function _initAction()
    {
        $this->loadLayout()
//            ->_setActiveMenu('theam/theam_navigation')
//            ->_setActiveMenu('itaniumextensions/itanium_menu')
//            ->_addBreadcrumb(Mage::helper('theam_navigation')->__('Theam'),
//                Mage::helper('theam_navigation')->__('Theam'))
//            ->_addBreadcrumb(Mage::helper('theam_navigation')->__('Overview Menu'),
//                Mage::helper('theam_navigation')->__('Overview Menu'))
        ;
        return $this;
    }

    /**
     * Index Action
     */
    public function indexAction()
    {
        $this->_title($this->__('Theam'))->_title($this->__('Overview Menu'));

        $this->_initAction()
            ->renderLayout();
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