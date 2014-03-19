<?php
/**
 * Customer group attribute source, sorted by customer group code
 *
 * @category   Mage
 * @package    Mage_Customer
 * @author     Thomas Birke <tbirke@netextreme.de>
 */
class Quafzi_SortedCustomerGroups_Model_Customer_Attribute_Source_Group
   extends Mage_Customer_Model_Customer_Attribute_Source_Group
{
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = Mage::getResourceModel('customer/group_collection')
                ->setRealGroupsFilter()
                ->setOrder('customer_group_code', Varien_Data_Collection::SORT_ORDER_ASC)
                ->load()
                ->toOptionArray()
            ;
        }
        return $this->_options;
    }
}
