<?php
/**
 * File: Data.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 28.07.15 09:53
 * Package: Theam_Base
 */

class Theam_Base_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XPATH_STORE_INFO_MAP_ENABLED = 'general/store_information/display_map';
    const XPATH_STORE_INFO_LONGITUDE = 'general/store_information/longitude';
    const XPATH_STORE_INFO_LATITUDE = 'general/store_information/latitude';

    public function isMapDisplayEnabled()
    {
        return Mage::getStoreConfigFlag(self::XPATH_STORE_INFO_MAP_ENABLED);
    }

    public function getLongitude()
    {
        return Mage::getStoreConfig(self::XPATH_STORE_INFO_LONGITUDE);
    }

    public function getLatitude()
    {
        return Mage::getStoreConfig(self::XPATH_STORE_INFO_LATITUDE);
    }
}
