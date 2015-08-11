<?php
/**
 * File: Grid.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 04.08.15 16:21
 * Package: Theam_Navigation
 */
 
class Theam_Navigation_Block_Adminhtml_Theam_Navigation_Menu_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Internal constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('theamNavigationMenuGrid');
    }

    /**
     * Prepare grid collection object
     *
     * @return Itanium_Referral_Block_Adminhtml_Referral_Rate_Grid
     */
    protected function _prepareCollection()
    {
        /* @var $collection Theam_Navigation_Model_Resource_Menu_Collection */
        $collection = Mage::getModel('theam_navigation/menu')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Prepare grid columns
     *
     * @return Itanium_Referral_Block_Adminhtml_Referral_Rate_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('rate_id', array(
            'header' => Mage::helper('theam_navigation')->__('ID'),
            'align'  => 'left',
            'index'  => 'rate_id',
            'width'  => 1,
        ));

        $this->addColumn('website_id', array(
            'header'  => Mage::helper('theam_navigation')->__('Website'),
            'index'   => 'website_id',
            'type'    => 'options',
//            'options' => Mage::getModel('theam_navigation/source_website')->toOptionArray()
        ));

        $this->addColumn('customer_group_id', array(
            'header'  => Mage::helper('theam_navigation')->__('Customer Group'),
            'index'   => 'customer_group_id',
            'type'    => 'options',
//            'options' => Mage::getModel('theam_navigation/source_customer_groups')->toOptionArray()
        ));

        $this->addColumn('rate', array(
            'header'   => Mage::helper('theam_navigation')->__('Rate'),
            'filter'   => false,
            'sortable' => false,
            'html_decorators' => 'nobr',
        ));

        return parent::_prepareColumns();
    }

    /**
     * Row click url
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('rate_id' => $row->getId()));
    }

}