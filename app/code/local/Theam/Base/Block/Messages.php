<?php
/**
 * File: Messages.php
 *
 * User: Mitch Vanderlinden
 * email: mitchvdl@gmail.com
 * Date: 30.07.15 18:27
 * Package: Theam_Base
 */

class Theam_Base_Block_Messages extends Mage_Core_Block_Messages
{
    protected function _construct()
    {
        if ( !$this->hasData('template') ) {
            $this->setData('template', 'core/messages.phtml');
        }

        parent::_construct();
    }

    /**
     * Retrieve messages in HTML format grouped by type
     * @return string
     * @internal param string $type
     */
    public function getGroupedHtml()
    {
        return $this->_toHtml();

        $types = array(
            Mage_Core_Model_Message::ERROR,
            Mage_Core_Model_Message::WARNING,
            Mage_Core_Model_Message::NOTICE,
            Mage_Core_Model_Message::SUCCESS
        );
        $html = '';
        foreach ($types as $type) {
            if ( $messages = $this->getMessages($type) ) {
                if ( !$html ) {
                    $html .= '<' . $this->_messagesFirstLevelTagName . ' class="row messages">';
                }
                $html .= '<' . $this->_messagesSecondLevelTagName . ' class="' . $type . '-msg bs-callout bs-callout-' . $type . '">';
                $html .= '<' . $this->_messagesFirstLevelTagName . '>';

                foreach ( $messages as $message ) {
                    $html.= '<' . $this->_messagesSecondLevelTagName . '>';
                    $html.= '<' . $this->_messagesContentWrapperTagName . '>';
                    $html.= ($this->_escapeMessageFlag) ? $this->escapeHtml($message->getText()) : $message->getText();
                    $html.= '</' . $this->_messagesContentWrapperTagName . '>';
                    $html.= '</' . $this->_messagesSecondLevelTagName . '>';
                }
                $html .= '</' . $this->_messagesFirstLevelTagName . '>';
                $html .= '</' . $this->_messagesSecondLevelTagName . '>';
            }
        }
        if ( $html) {
            $html .= '</' . $this->_messagesFirstLevelTagName . '>';
        }
        return $html;
    }


    /**
     * Reinsated the block since it was removed by the parent (by Magento), We'd like to use the regular template file system
     *
     * Render block HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->getTemplate()) {
            return '';
        }

        $html = $this->renderView();
        return $html;
    }
}
 