<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Communication\ConditionalAvailabilityPageSearchExtension;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class ProductListPageMapExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Communication\ConditionalAvailabilityPageSearchExtension\ProductListPageMapExpanderPlugin
     */
    protected $productListPageMapExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PageMapTransfer
     */
    protected $pageMapTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface
     */
    protected $pageMapBuilderInterfaceMock;

    /**
     * @var array
     */
    protected $conditionalAvailabilityPeriodData;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\LocaleTransfer
     */
    protected $localeTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->pageMapTransferMock = $this->getMockBuilder(PageMapTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->pageMapBuilderInterfaceMock = $this->getMockBuilder(PageMapBuilderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityPeriodData = [
            'product_list_map' => [],
        ];

        $this->localeTransferMock = $this->getMockBuilder(LocaleTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListPageMapExpanderPlugin = new ProductListPageMapExpanderPlugin();
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->pageMapTransferMock->expects($this->atLeastOnce())
            ->method('setProductLists')
            ->willReturnSelf();

        $this->assertInstanceOf(
            PageMapTransfer::class,
            $this->productListPageMapExpanderPlugin->expand(
                $this->pageMapTransferMock,
                $this->pageMapBuilderInterfaceMock,
                $this->conditionalAvailabilityPeriodData,
                $this->localeTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testExpandEmpty(): void
    {
        $this->assertInstanceOf(
            PageMapTransfer::class,
            $this->productListPageMapExpanderPlugin->expand(
                $this->pageMapTransferMock,
                $this->pageMapBuilderInterfaceMock,
                [],
                $this->localeTransferMock
            )
        );
    }
}
