<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade;

interface ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeInterface
{
    /**
     * @param array<int> $conditionalAvailabilityIds
     *
     * @return void
     */
    public function publish(array $conditionalAvailabilityIds): void;
}
