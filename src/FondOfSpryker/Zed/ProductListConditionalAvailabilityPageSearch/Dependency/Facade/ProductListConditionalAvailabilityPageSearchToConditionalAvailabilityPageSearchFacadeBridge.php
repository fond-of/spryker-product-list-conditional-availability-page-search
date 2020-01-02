<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade;

use FondOfSpryker\Zed\ConditionalAvailabilityPageSearch\Business\ConditionalAvailabilityPageSearchFacadeInterface;

class ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeBridge implements ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityPageSearch\Business\ConditionalAvailabilityPageSearchFacadeInterface
     */
    protected $conditionalAvailabilityPageSearchFacade;

    /**
     * @param \FondOfSpryker\Zed\ConditionalAvailabilityPageSearch\Business\ConditionalAvailabilityPageSearchFacadeInterface $conditionalAvailabilityPageSearchFacade
     */
    public function __construct(
        ConditionalAvailabilityPageSearchFacadeInterface $conditionalAvailabilityPageSearchFacade
    ) {
        $this->conditionalAvailabilityPageSearchFacade = $conditionalAvailabilityPageSearchFacade;
    }

    /**
     * @param int[] $concreteIds
     *
     * @return int[]
     */
    public function getConditionalAvailabilityIdsByConcreteIds(array $concreteIds): array
    {
        return $this->conditionalAvailabilityPageSearchFacade->getConditionalAvailabilityIdsByConcreteIds($concreteIds);
    }

    /**
     * @param int[] $conditionalAvailabilityIds
     *
     * @return void
     */
    public function publish(array $conditionalAvailabilityIds): void
    {
        $this->conditionalAvailabilityPageSearchFacade->publish($conditionalAvailabilityIds);
    }
}
