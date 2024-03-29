<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailabilityPageSearch\Business\ConditionalAvailabilityPageSearchFacadeInterface;

class ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade\ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeBridge
     */
    protected $productListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityPageSearch\Business\ConditionalAvailabilityPageSearchFacadeInterface
     */
    protected $conditionalAvailabilityPageSearchFacadeInterfaceMock;

    /**
     * @var array<int>
     */
    protected $conditionalAvailabilityIds;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityPageSearchFacadeInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityPageSearchFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityIds = [1];

        $this->productListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeBridge = new ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeBridge(
            $this->conditionalAvailabilityPageSearchFacadeInterfaceMock,
        );
    }

    /**
     * @return void
     */
    public function testPublish(): void
    {
        $this->conditionalAvailabilityPageSearchFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('publish')
            ->with($this->conditionalAvailabilityIds);

        $this->productListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeBridge->publish(
            $this->conditionalAvailabilityIds,
        );
    }
}
