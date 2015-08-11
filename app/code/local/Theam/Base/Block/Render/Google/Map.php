<?php
/**
 * File: Map.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 07.08.15 08:02
 * Package: Theam_Base
 */

class Theam_Base_Block_Render_Google_Map extends Mage_Core_Block_Template
{
    /**
     * Internal constructor, that is called from real constructor
     *
     */
    protected function _construct()
    {
        parent::_construct();

        /*
         * In case template was passed through constructor
         * we assign it to block's property _template
         * Mainly for those cases when block created
         * not via Mage_Core_Model_Layout::addBlock()
         */
        if (!$this->hasData('template')) {
            $this->setTemplate('base/render/google/block.phtml');
        }
    }

    public function getZoomLevel()
    {
        if ( !$this->hasData('zoom_level')) {
            return 16;
        }
        return $this->getData('zoom_level');
    }

    public function getMapVariable()
    {
        return sprintf('map_%s', substr(sha1(implode('|', $this->getData())), 0, 8));
    }
}
 