<?php
/**
 * File: Index.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 03.08.15 17:32
 * Package: Theam_Navigation
 */


class Theam_Navigation_Block_Adminhtml_Theam_Navigation_Menu extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Block constructor
     */
    public function __construct()
    {
        $this->_blockGroup = 'theam_navigation';
        $this->_controller = 'adminhtml_theam_navigation_menu';
        $this->_headerText = Mage::helper('theam_navigation')->__('Manage Menu');
        parent::__construct();
//        $this->_updateButton('add', 'label', Mage::helper('itanium_referral')->__('Add New History entry'));
        $this->removeButton('add');
    }
    protected function _prepareLayout()
    {
        $this->setChild( 'grid',
            $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_grid',
                $this->_controller . '.grid')->setSaveParametersInSession(true) );
        return parent::_prepareLayout();
    }


}