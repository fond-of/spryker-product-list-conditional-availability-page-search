<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Communication\ConditionalAvailabilityPageSearchExtension;

use FondOfSpryker\Zed\ConditionalAvailabilityPageSearchExtension\Dependency\Plugin\ConditionalAvailabilityPeriodPageMapExpanderPluginInterface;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Generated\Shared\Transfer\ProductListMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class ProductListPageMapExpanderPlugin extends AbstractPlugin implements ConditionalAvailabilityPeriodPageMapExpanderPluginInterface
{
    protected const DATA_KEY_PRODUCT_LIST_MAP = 'product_list_map';

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $conditionalAvailabilityPeriodData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expand(
        PageMapTransfer $pageMapTransfer,
        PageMapBuilderInterface $pageMapBuilder,
        array $conditionalAvailabilityPeriodData,
        LocaleTransfer $localeTransfer
    ): PageMapTransfer {
        if (!isset($conditionalAvailabilityPeriodData[static::DATA_KEY_PRODUCT_LIST_MAP])) {
            return $pageMapTransfer;
        }

        $productListMapTransfer = (new ProductListMapTransfer())
            ->fromArray($conditionalAvailabilityPeriodData[static::DATA_KEY_PRODUCT_LIST_MAP]);

        return $pageMapTransfer->setProductLists($productListMapTransfer);
    }
}
