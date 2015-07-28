<?php
/**
 * File: Footer.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 28.07.15 09:57
 * Package: Theam_Page
 */

class Theam_Page_Block_Html_Footer extends Theam_Page_Block_Html_Head
{
    /**
     * Initialize template
     *
     */
    protected function _construct()
    {
        $this->setTemplate('page/html/widget/footer.phtml');
        $this->setData('is_enterprise', Mage::getEdition() == Mage::EDITION_ENTERPRISE);
    }


    /**
     * Add CSS file to HEAD entity
     *
     * @param string $name
     * @param string $params
     *
     * @return Mage_Page_Block_Html_Head
     */
    public function addCss($name, $params = "")
    {
        Mage::throwException($this->__('Unable to add CSS content to footer'));
    }

    /**
     * Add CSS file for Internet Explorer only to HEAD entity
     *
     * @param string $name
     * @param string $params
     *
     * @return Mage_Page_Block_Html_Head
     */
    public function addCssIe($name, $params = "")
    {
        Mage::throwException($this->__('Unable to add CSS content to footer'));
    }

    /**
     * Add HEAD Item
     *
     * Allowed types:
     *  - js
     *  - js_css
     *  - skin_js
     *  - skin_css
     *  - rss
     *
     * @param string $type
     * @param string $name
     * @param string $params
     * @param string $if
     * @param string $cond
     * @return Mage_Page_Block_Html_Head
     */
    public function addItem($type, $name, $params=null, $if=null, $cond=null)
    {
        if ($type==='skin_css' && empty($params)) {
            Mage::throwException($this->__('Unable to add CSS content to footer'));
        }
        $this->_data['items'][$type.'/'.$name] = array(
            'type'   => $type,
            'name'   => $name,
            'params' => $params,
            'if'     => $if,
            'cond'   => $cond,
        );
        return $this;
    }

    /**
     * @return string
     */
    public function getJsHtml()
    {
        return parent::getCssJsHtml();
    }

    /**
     * Render arbitrary HTML head items
     *
     * @see self::getCssJsHtml()
     *
     * @param array $items
     *
     * @return string
     */
    protected function _prepareOtherHtmlHeadElements($items)
    {
        return '';
    }


}
 