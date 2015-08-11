<?php
/**
 * File: Data.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 28.07.15 09:53
 * Package: Theam_Design
 */

class Theam_Design_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XPATH_DEV_JS_MERGE_VERSION = 'dev/js/merge_version';
    const XPATH_DEV_CSS_MERGE_VERSION = 'dev/js/merge_version';

    /**
     * Return the merged JS version
     * @return string
     */
    public function getJsMergeVersion()
    {
        return Mage::getStoreConfig(self::XPATH_DEV_JS_MERGE_VERSION) ?: '0';
    }

    /**
     * REturn the merged CSS version
     * @return string
     */
    public function getCssMergeVersion()
    {
        return Mage::getStoreConfig(self::XPATH_DEV_JS_MERGE_VERSION) ?: '0';
    }
}
 