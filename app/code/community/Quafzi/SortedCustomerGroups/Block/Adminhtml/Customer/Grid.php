<?php
/**
 * Customer grid with customer groups dropdown sorted by customer group code
 *
 * @category   Mage
 * @package    Mage_Customer
 * @author     Thomas Birke <tbirke@netextreme.de>
 */
class Quafzi_SortedCustomerGroups_Block_Adminhtml_Customer_Grid
    extends Mage_Adminhtml_Block_Customer_Grid
{
    protected function _prepareGrid()
    {
        parent::_prepareGrid();

        $groups = Mage::getResourceModel('customer/group_collection')
        ->setOrder('customer_group_code', Varien_Data_Collection::SORT_ORDER_ASC)
            ->addFieldToFilter('customer_group_id', array('gt'=> 0))
            ->load()
            ->toOptionHash();
        $this->_columns['group']->setOptions($groups);

        return $this;
    }
}
