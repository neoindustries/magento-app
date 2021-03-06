<?php
/**
 * Sales And Orders Feed Tool
 * Copyright © 2019 S&O LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace SalesAndOrders\FeedTool\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Integration\Model\ConfigBasedIntegrationManager;
use \Magento\Integration\Model\IntegrationFactory;

/**
 * Upgrade Data script
 */
class UpgradeData implements UpgradeDataInterface
{

    private $integrationManager;

    private $integrationFactory;

    public function __construct(
        ConfigBasedIntegrationManager $integrationManager,
        IntegrationFactory $integrationFactory
    ) {
        $this->integrationManager = $integrationManager;
        $this->integrationFactory = $integrationFactory;
    }
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $cnxt = $context;    // dummy
    // implemt on update
    }
}
