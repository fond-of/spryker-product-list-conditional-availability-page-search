<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business\Model\ConditionalAvailabilityPeriodPageSearchExpanderInterface;
use FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade\ProductListConditionalAvailabilityPageSearchToProductListFacadeInterface;
use FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\ProductListConditionalAvailabilityPageSearchDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductListConditionalAvailabilityPageSearchBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business\ProductListConditionalAvailabilityPageSearchBusinessFactory
     */
    protected $productListConditionalAvailabilityPageSearchBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade\ProductListConditionalAvailabilityPageSearchToProductListFacadeInterface
     */
    protected $productListConditionalAvailabilityPageSearchToProductListFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListConditionalAvailabilityPageSearchToProductListFacadeInterfaceMock = $this->getMockBuilder(ProductListConditionalAvailabilityPageSearchToProductListFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListConditionalAvailabilityPageSearchBusinessFactory = new ProductListConditionalAvailabilityPageSearchBusinessFactory();
        $this->productListConditionalAvailabilityPageSearchBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateConditionalAvailabilityPeriodPageSearchExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(ProductListConditionalAvailabilityPageSearchDependencyProvider::FACADE_PRODUCT_LIST)
            ->willReturn($this->productListConditionalAvailabilityPageSearchToProductListFacadeInterfaceMock);

        $this->assertInstanceOf(
            ConditionalAvailabilityPeriodPageSearchExpanderInterface::class,
            $this->productListConditionalAvailabilityPageSearchBusinessFactory->createConditionalAvailabilityPeriodPageSearchExpander()
        );
    }
}
