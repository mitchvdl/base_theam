<?php
/**
 * booking form
 *
 * @category   Theam
 * @package    Theam_Booking
 * @author     spam@mitchvdl.be
 */
class Theam_Booking_Block_Contact_Form extends Mage_Core_Block_Template
{

    protected $_product = null;

    /**
     * @return Mage_Catalog_Model_Product
     */
    public function getProduct()
    {
        if ( null === $this->_product ) {
            $productId = Mage::app()->getRequest()->getParam('product_id', false);
            if ( $productId === false ) {
                $this->_product = Mage::getModel('catalog/product');
            } else {
                $this->_product = Mage::getModel('catalog/product')->load($productId);
            }
        }
        return $this->_product;
    }

    public function getSelectedAttributes()
    {
        // Get super attributes
        $attributes = Mage::app()->getRequest()->getparam('super_attribute', []);

        $attributeMap = [];
        foreach ( $attributes as $_idx => $_val) {
            /** @var Mage_Catalog_model_Resource_Eav_Attribute $attribute */
            $attribute = Mage::getSingleton('eav/config')->getAttribute('catalog_product', $_idx);

            /** @var Mage_Catalog_Model_Product $product */
            $product = Mage::getModel('catalog/product')
                ->setStoreId(Mage::app()->getStore()->getId())
                ->setData($attribute->getAttributeCode(), $_val);

            $attributeMap[] = $product->getAttributeText($attribute->getAttributeCode());
        }

        $options = Mage::app()->getRequest()->getparam('options', []);
        foreach ( $options as $_idx => $_val) {
            $_options = $this->getProduct()->getOptionById($_val)->getValues();
            if ( isset($_options[$_idx]) ) {
                $_tmpOptionValue = $_options[$_idx];
                $attributeMap[] = $_tmpOptionValue->getTitle();
            }
        }
        return $attributeMap;
    }
}
