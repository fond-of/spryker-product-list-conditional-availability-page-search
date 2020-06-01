<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Communication\ConditionalAvailabilityPageSearchExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business\ProductListConditionalAvailabilityPageSearchFacadeInterface;
use Generated\Shared\Transfer\ConditionalAvailabilityPeriodPageSearchTransfer;

class ProductListConditionalAvailabilityPeriodPageDataExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Communication\ConditionalAvailabilityPageSearchExtension\ProductListConditionalAvailabilityPeriodPageDataExpanderPlugin
     */
    protected $productListPageDataExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business\ProductListConditionalAvailabilityPageSearchFacadeInterface
     */
    protected $productListConditionalAvailabilityPageSearchFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ConditionalAvailabilityPeriodPageSearchTransfer
     */
    protected $conditionalAvailabilityPeriodPageSearchTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->productListConditionalAvailabilityPageSearchFacadeInterfaceMock = $this->getMockBuilder(ProductListConditionalAvailabilityPageSearchFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityPeriodPageSearchTransferMock = $this->getMockBuilder(ConditionalAvailabilityPeriodPageSearchTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListPageDataExpanderPlugin = new class (
            $this->productListConditionalAvailabilityPageSearchFacadeInterfaceMock
        ) extends ProductListConditionalAvailabilityPeriodPageDataExpanderPlugin {
            /**
             * @var \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business\ProductListConditionalAvailabilityPageSearchFacadeInterface
             */
            protected $productListConditionalAvailabilityPageSearchFacade;

            /**
             * @param \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business\ProductListConditionalAvailabilityPageSearchFacadeInterface $productListConditionalAvailabilityPageSearchFacade
             */
            public function __construct(ProductListConditionalAvailabilityPageSearchFacadeInterface $productListConditionalAvailabilityPageSearchFacade)
            {
                $this->productListConditionalAvailabilityPageSearchFacade = $productListConditionalAvailabilityPageSearchFacade;
            }

            /**
             * @return \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business\ProductListConditionalAvailabilityPageSearchFacadeInterface
             */
            public function getFacade(): ProductListConditionalAvailabilityPageSearchFacadeInterface
            {
                return $this->productListConditionalAvailabilityPageSearchFacade;
            }
        };
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->productListConditionalAvailabilityPageSearchFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('expandConditionalAvailabilityPeriodPageSearchTransferWithProductLists')
            ->with($this->conditionalAvailabilityPeriodPageSearchTransferMock)
            ->willReturn($this->conditionalAvailabilityPeriodPageSearchTransferMock);

        $this->assertInstanceOf(
            ConditionalAvailabilityPeriodPageSearchTransfer::class,
            $this->productListPageDataExpanderPlugin->expand(
                $this->conditionalAvailabilityPeriodPageSearchTransferMock
            )
        );
    }
}
