<?php
/**
 * File: Observer.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 06.08.15 17:27
 * Package: Theam_Customer
 */

class Theam_Customer_Model_Observer extends Varien_Object
{
    /**
     * Set cookie for logged in customer
     *
     * @param Varien_Event_Observer $observer
     * @return Theam_Customer_Model_Observer
     */
    public function customerLogin(Varien_Event_Observer $observer)
    {
        //set($name, $value, $period = null, $path = null, $domain = null, $secure = null, $httponly = null)
        $this->_getCookie()->set('CMR_LOGGEDIN', 1, null,null, null, null, false);

        $this->updateWishList();

        return $this;
    }

    /**
     * Remove customer cookie
     *
     * @param Varien_Event_Observer $observer
     * @return Theam_Customer_Model_Observer
     */
    public function customerLogout(Varien_Event_Observer $observer)
    {
        $this->_getCookie()->delete('CMR_LOGGEDIN');
        $this->_getCookie()->delete('CMR_WISHLIST_CNT');

        return $this;
    }

    /**
     * Remove customer cookie
     *
     * @param Varien_Event_Observer $observer
     * @return Theam_Customer_Model_Observer
     */
    public function updateWishList(Varien_Event_Observer $observer)
    {

        $this->_getCookie()->set('CMR_WISHLIST_CNT',  Mage::helper('wishlist')->getItemCount(), null,null, null, null, false);


        return $this;
    }

    /**
     * Retrieve cookie instance
     *
     * @return Mage_Core_Model_Cookie
     */
    protected function _getCookie()
    {
        return Mage::getSingleton('core/cookie');
    }
}
 