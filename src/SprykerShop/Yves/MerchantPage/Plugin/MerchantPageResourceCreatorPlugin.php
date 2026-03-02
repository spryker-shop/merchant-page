<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantPage\Plugin;

use Spryker\Shared\MerchantStorage\MerchantStorageConfig;
use Spryker\Yves\Kernel\AbstractPlugin;
use SprykerShop\Yves\StorageRouterExtension\Dependency\Plugin\ResourceCreatorPluginInterface;

/**
 * @method \SprykerShop\Yves\MerchantPage\MerchantPageFactory getFactory()
 */
class MerchantPageResourceCreatorPlugin extends AbstractPlugin implements ResourceCreatorPluginInterface
{
    /**
     * @var string
     */
    public const ATTRIBUTE_MERCHANT_STORAGE_TRANSFER = 'merchantStorageTransfer';

    public function getType(): string
    {
        return MerchantStorageConfig::MERCHANT_RESOURCE_NAME;
    }

    public function getModuleName(): string
    {
        return 'MerchantPage';
    }

    public function getControllerName(): string
    {
        return 'Merchant';
    }

    public function getActionName(): string
    {
        return 'index';
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<string, mixed>
     */
    public function mergeResourceData(array $data): array
    {
        return [
            static::ATTRIBUTE_MERCHANT_STORAGE_TRANSFER => $this->getFactory()
                ->getMerchantStorageClient()
                ->mapMerchantStorageData($data),
        ];
    }
}
