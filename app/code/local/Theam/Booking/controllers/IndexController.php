<?php
/**
 * Booking index controller
 *
 * @category   Theam
 * @package    Theam_Booking
 * @author     spam@mitchvdl.be
 */
class Theam_Booking_IndexController extends Mage_Core_Controller_Front_Action
{

    const XML_PATH_EMAIL_RECIPIENT  = 'theam_booking/email/recipient_email';
    const XML_PATH_EMAIL_SENDER     = 'theam_booking/email/sender_email_identity';
    const XML_PATH_EMAIL_TEMPLATE   = 'theam_booking/email/email_template';
    const XML_PATH_ENABLED          = 'theam_booking/contacts/enabled';

    public function preDispatch()
    {
        parent::preDispatch();

        if( !Mage::getStoreConfigFlag(self::XML_PATH_ENABLED) ) {
            $this->norouteAction();
        }
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('contactForm')
            ->setFormAction( Mage::getUrl('*/*/post', array('product_id' => $this->getRequest()->getParam('product_id', false))) );

        $this->_initLayoutMessages('customer/session');
        $this->_initLayoutMessages('catalog/session');
        $this->renderLayout();
    }

    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        if ( $post ) {
            $translate = Mage::getSingleton('core/translate');
            /* @var $translate Mage_Core_Model_Translate */
            $translate->setTranslateInline(false);
            try {
                $postObject = new Varien_Object();
                $postObject->setData($post);
                /** Mage_Core_Model_Session $session */
                $session = Mage::getSingleton('core/session')->setBookingData($postObject);

                $error = false;

                if (!Zend_Validate::is(trim($post['name']) , 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['product']), 'NotEmpty')) {
                    Mage::getSingleton('customer/session')->addError(Mage::helper('contacts')->__('No product has been selected, please visit the product page and try again'));
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['telephone']), 'NotEmpty')) {
                    $error = true;
                }

//                if (!Zend_Validate::is(trim($post['selected_options']), 'NotEmpty')) {
//                    Mage::getSingleton('customer/session')->addError(Mage::helper('contacts')->__('No product has been selected, please visit the product page and try again'));
//                    $error = true;
//                }

                if (!Zend_Validate::is(trim($post['date']), 'NotEmpty')) {
                    $error = true;
                }

                if ($error) {
                    throw new Exception();
                }
                $mailTemplate = Mage::getModel('core/email_template');
                /* @var $mailTemplate Mage_Core_Model_Email_Template */
                $mailTemplate->setDesignConfig(array('area' => 'frontend'))
                    ->setReplyTo($post['email'])
                    ->sendTransactional(
                        Mage::getStoreConfig(self::XML_PATH_EMAIL_TEMPLATE),
                        Mage::getStoreConfig(self::XML_PATH_EMAIL_SENDER),
                        Mage::getStoreConfig(self::XML_PATH_EMAIL_RECIPIENT),
                        null,
                        array('data' => $postObject)
                    );

                if (!$mailTemplate->getSentSuccess()) {
                    throw new Exception();
                }

//                $mailTemplate = Mage::getModel('core/email_template');
//                /* @var $mailTemplate Mage_Core_Model_Email_Template */
//
//                // Send email to client
//                $mailTemplate->setDesignConfig(array('area' => 'frontend'))
//                    ->setReplyTo(Mage::getStoreConfig(self::XML_PATH_EMAIL_SENDER))
//                    ->sendTransactional(
//                        Mage::getStoreConfig(self::XML_PATH_EMAIL_TEMPLATE),
//                        $post['email'],
//                        $post['name'],
//                        null,
//                        array('data' => $postObject)
//                    );
//
//                if (!$mailTemplate->getSentSuccess()) {
//                    throw new Exception();
//                }

                Mage::getSingleton('core/session')->unsBookingData();
                $translate->setTranslateInline(true);

                Mage::getSingleton('customer/session')->addSuccess(Mage::helper('contacts')->__('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.'));
                $this->_redirect('*/*/');

                return;
            } catch (Exception $e) {
                $translate->setTranslateInline(true);

                Mage::getSingleton('customer/session')->addError(Mage::helper('contacts')->__('Unable to submit your request. Please, try again later'));
                $this->_redirect('*/*/');
                return;
            }

        } else {
            $this->_redirect('*/*/');
        }
    }

}
