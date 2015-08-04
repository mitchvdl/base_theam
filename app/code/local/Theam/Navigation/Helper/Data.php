<?php
/**
 * File: Data.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 28.07.15 09:53
 * Package: Theam_Navigation
 */

class Theam_Navigation_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_SECTION_GENERAL = 'theam_navigation/general/';


    const XML_PATH_ENABLED = 'theam_navigation/general/is_enabled';



    /**
     * Check whether the module is enabled in system config
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_ENABLED);
    }

    /**
     * Retrieve value of given field and website from config
     *
     * @param string $section
     * @param string $field
     * @param integer $websiteId
     * @return mixed
     */
    public function getConfigValue($section, $field, $websiteId = null)
    {
        if ($websiteId === null) {
            $websiteId = Mage::app()->getWebsite()->getId();
        }
        return (string)Mage::app()->getConfig()->getNode($section . $field, 'website', (int)$websiteId);
    }

    /**
     * Retrieve config value from General section
     *
     * @param string $field
     * @param integer $websiteId
     * @return mixed
     */
    public function getGeneralConfig($field, $websiteId = null)
    {
        return $this->getConfigValue(self::XML_PATH_SECTION_GENERAL, $field, $websiteId);
    }
}
 