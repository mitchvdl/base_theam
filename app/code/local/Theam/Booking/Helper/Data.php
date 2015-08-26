<?php
/**
 * Contacts base helper
 *
 * @category   Theam
 * @package    Theam_Booking
 * @author     spam@mitchvdl.be
 */
class Theam_Booking_Helper_Data extends Mage_Core_Helper_Abstract
{

    const XML_PATH_ENABLED   = 'theam_booking/contacts/enabled';

    public function isEnabled()
    {
        return Mage::getStoreConfig( self::XML_PATH_ENABLED );
    }

    public function getUserName()
    {
        if ( Mage::getSingleton('core/session')->getBookingData() ) {
            return Mage::getSingleton('core/session')->getBookingData()->getName();
        }

        if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
            return '';
        }
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        return trim($customer->getName());
    }

    public function getUserEmail()
    {
        if ( Mage::getSingleton('core/session')->getBookingData() ) {
            return Mage::getSingleton('core/session')->getBookingData()->getEmail();
        }

        if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
            return '';
        }
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        return $customer->getEmail();
    }

    public function getTelephone()
    {
        if ( Mage::getSingleton('core/session')->getBookingData() ) {
            return Mage::getSingleton('core/session')->getBookingData()->getTelephone();
        }

        return false;
    }

    public function getSelectedOptions()
    {
        if ( Mage::getSingleton('core/session')->getBookingData() ) {
            return Mage::getSingleton('core/session')->getBookingData()->getSelectedOptions();
        }

        return false;
    }

    public function getDate()
    {
        if ( Mage::getSingleton('core/session')->getBookingData() ) {
            return Mage::getSingleton('core/session')->getBookingData()->getDate();
        }
        return false;
    }

    public function getComment()
    {
        if ( Mage::getSingleton('core/session')->getBookingData() ) {
            return Mage::getSingleton('core/session')->getBookingData()->getComment();
        }
        return false;
    }

    public function getProduct()
    {
        if ( Mage::getSingleton('core/session')->getBookingData() ) {
            return Mage::getSingleton('core/session')->getBookingData()->getProduct();
        }

        return false;
    }
}
