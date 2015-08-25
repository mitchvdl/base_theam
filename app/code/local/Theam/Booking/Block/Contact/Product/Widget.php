<?php
/**
 * product widget
 *
 * @category   Theam
 * @package    Theam_Booking
 * @author     spam@mitchvdl.be
 */
class Theam_Booking_Block_Contact_Product_Widget extends Mage_Core_Block_Template
{

    protected $_product = null;

    public function getProduct()
    {
        if ( null === $this->_product ) {
            $productId = Mage::app()->getRequest()->get('product_id', false);
            if ( $productId === false ) {
                $this->_product = Mage::getModel('catalog/product');
            } else {
                $this->_product = Mage::getModel('catalog/product')->load($productId);
            }
        }
        return $this->_product;
    }

}
