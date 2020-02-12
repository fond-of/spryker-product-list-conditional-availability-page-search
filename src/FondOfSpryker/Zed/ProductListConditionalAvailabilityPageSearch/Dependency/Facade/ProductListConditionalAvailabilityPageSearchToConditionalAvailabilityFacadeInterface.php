<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade;

interface ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityFacadeInterface
{
    /**
     * @param int[] $productConcreteIds
     *
     * @return int[]
     */
    public function getConditionalAvailabilityIdsByProductConcreteIds(array $productConcreteIds): array;
}
