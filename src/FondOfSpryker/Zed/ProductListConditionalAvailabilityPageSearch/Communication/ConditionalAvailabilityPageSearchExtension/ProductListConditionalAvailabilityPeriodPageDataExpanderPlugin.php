<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Communication\ConditionalAvailabilityPageSearchExtension;

use FondOfSpryker\Zed\ConditionalAvailabilityPageSearchExtension\Dependency\Plugin\ConditionalAvailabilityPeriodPageDataExpanderPluginInterface;
use Generated\Shared\Transfer\ConditionalAvailabilityPeriodPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business\ProductListConditionalAvailabilityPageSearchFacadeInterface getFacade()
 */
class ProductListConditionalAvailabilityPeriodPageDataExpanderPlugin extends AbstractPlugin implements ConditionalAvailabilityPeriodPageDataExpanderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\ConditionalAvailabilityPeriodPageSearchTransfer $conditionalAvailabilityPeriodPageSearchTransfer
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityPeriodPageSearchTransfer
     */
    public function expand(
        ConditionalAvailabilityPeriodPageSearchTransfer $conditionalAvailabilityPeriodPageSearchTransfer
    ): ConditionalAvailabilityPeriodPageSearchTransfer {
        return $this->getFacade()->expandConditionalAvailabilityPeriodPageSearchTransferWithProductLists(
            $conditionalAvailabilityPeriodPageSearchTransfer
        );
    }
}
