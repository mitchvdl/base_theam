<?php
/**
 * Advanced search form
 *
 * @category   Theam
 * @package    Theam_AdvancedSearch

 */
class Theam_CatalogSearch_Block_Advanced_Form extends Mage_CatalogSearch_Block_Advanced_Form
{
    /**
     * Build attribute select element html string
     *
     * @param Mage_Eav_Model_Entity_Attribute_Abstract $attribute
     * @param string $class
     * @return string
     */
    public function getAttributeSelectElement($attribute, $class = '')
    {
        $extra = '';
        $options = $attribute->getSource()->getAllOptions(false);

        $name = $attribute->getAttributeCode();

        // 2 - avoid yes/no selects to be multiselects
        if (is_array($options) && count($options)>2) {
            $extra = 'multiple="multiple" size="4"';
            $name.= '[]';
        }
        else {
            array_unshift($options, array('value'=>'', 'label'=>Mage::helper('catalogsearch')->__('All')));
        }

        return $this->_getSelectBlock()
            ->setName($name)
            ->setId($attribute->getAttributeCode())
            ->setTitle($this->getAttributeLabel($attribute))
            ->setExtraParams($extra)
            ->setValue($this->getAttributeValue($attribute))
            ->setOptions($options)
            ->setClass('multiselect ' . $class)
            ->getHtml();
    }

    /**
     * Retrieve yes/no element html for provided attribute
     *
     * @param Mage_Eav_Model_Entity_Attribute_Abstract $attribute
     * @param string $class
     * @return string
     */
    public function getAttributeYesNoElement($attribute, $class = '')
    {
        $options = array(
            array('value' => '',  'label' => Mage::helper('catalogsearch')->__('All')),
            array('value' => '1', 'label' => Mage::helper('catalogsearch')->__('Yes')),
            array('value' => '0', 'label' => Mage::helper('catalogsearch')->__('No'))
        );

        $name = $attribute->getAttributeCode();
        return $this->_getSelectBlock()
            ->setName($name)
            ->setId($attribute->getAttributeCode())
            ->setTitle($this->getAttributeLabel($attribute))
            ->setExtraParams("")
            ->setValue($this->getAttributeValue($attribute))
            ->setOptions($options)
            ->setClass($class)
            ->getHtml();
    }

    /**
     * Build date element html string for attribute
     *
     * @param Mage_Eav_Model_Entity_Attribute_Abstract $attribute
     * @param string $part
     * @param string $class
     * @return string
     */
    public function getDateInput($attribute, $part = 'from', $class = '')
    {
        $name = $attribute->getAttributeCode() . '[' . $part . ']';
        $value = $this->getAttributeValue($attribute, $part);

        return $this->_getDateBlock()
            ->setName($name)
            ->setId($attribute->getAttributeCode() . ($part == 'from' ? '' : '_' . $part))
            ->setTitle($this->getAttributeLabel($attribute))
            ->setValue($value)
            ->setImage($this->getSkinUrl('images/calendar.gif'))
            ->setFormat('%m/%d/%y')
            ->setClass('input-text ' . $class)
            ->getHtml();
    }
}
