<?php


namespace Naqel\ConsigneeCheckoutAddressFields\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->getConnection()->dropColumn($setup->getTable('quote_address'), 'consignee_national_id');
       

        $setup->getConnection()->dropColumn($setup->getTable('sales_order_address'), 'consignee_national_id');
      

        $setup->getConnection()->addColumn(
            $setup->getTable('quote_address'),
            'consignee_national_id',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 255,
                'comment' => 'Consignee National Id'
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_address'),
            'consignee_national_id',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 255,
                'comment' => 'Consignee National Id'
            ]
        );
    }
}