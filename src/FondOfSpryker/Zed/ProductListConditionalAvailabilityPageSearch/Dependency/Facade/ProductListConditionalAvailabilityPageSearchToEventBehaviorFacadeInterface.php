<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade;

interface ProductListConditionalAvailabilityPageSearchToEventBehaviorFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\EventEntityTransfer[] $eventTransfers
     * @param string $foreignKeyColumnName
     *
     * @return array
     */
    public function getEventTransferForeignKeys(array $eventTransfers, $foreignKeyColumnName): array;
}
