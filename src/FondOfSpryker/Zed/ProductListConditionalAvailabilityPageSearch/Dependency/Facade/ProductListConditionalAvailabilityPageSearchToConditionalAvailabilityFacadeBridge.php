<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade;

use FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface;

class ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityFacadeBridge implements ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface
     */
    protected $conditionalAvailabilityFacade;

    /**
     * @param \FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface $conditionalAvailabilityFacade
     */
    public function __construct(ConditionalAvailabilityFacadeInterface $conditionalAvailabilityFacade)
    {
        $this->conditionalAvailabilityFacade = $conditionalAvailabilityFacade;
    }

    /**
     * @param array<int> $productConcreteIds
     *
     * @return array<int>
     */
    public function getConditionalAvailabilityIdsByProductConcreteIds(array $productConcreteIds): array
    {
        return $this->conditionalAvailabilityFacade->getConditionalAvailabilityIdsByProductConcreteIds(
            $productConcreteIds,
        );
    }
}
