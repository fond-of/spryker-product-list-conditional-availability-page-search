<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch;

use FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade\ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityFacadeBridge;
use FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade\ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeBridge;
use FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade\ProductListConditionalAvailabilityPageSearchToEventBehaviorFacadeBridge;
use FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Dependency\Facade\ProductListConditionalAvailabilityPageSearchToProductListFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductListConditionalAvailabilityPageSearchDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_EVENT_BEHAVIOR = 'FACADE_EVENT_BEHAVIOR';

    /**
     * @var string
     */
    public const FACADE_CONDITIONAL_AVAILABILITY_PAGE_SEARCH = 'FACADE_CONDITIONAL_AVAILABILITY_PAGE_SEARCH';

    /**
     * @var string
     */
    public const FACADE_CONDITIONAL_AVAILABILITY = 'FACADE_CONDITIONAL_AVAILABILITY';

    /**
     * @var string
     */
    public const FACADE_PRODUCT_LIST = 'FACADE_PRODUCT_LIST';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addProductListFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addEventBehaviorFacade($container);
        $container = $this->addConditionalAvailabilityPageSearchFacade($container);
        $container = $this->addConditionalAvailabilityFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductListFacade(Container $container): Container
    {
        $container[static::FACADE_PRODUCT_LIST] = static function (Container $container) {
            return new ProductListConditionalAvailabilityPageSearchToProductListFacadeBridge(
                $container->getLocator()->productList()->facade(),
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addConditionalAvailabilityPageSearchFacade(Container $container): Container
    {
        $container[static::FACADE_CONDITIONAL_AVAILABILITY_PAGE_SEARCH] = static function (Container $container) {
            return new ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityPageSearchFacadeBridge(
                $container->getLocator()->conditionalAvailabilityPageSearch()->facade(),
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addEventBehaviorFacade(Container $container): Container
    {
        $container[static::FACADE_EVENT_BEHAVIOR] = static function (Container $container) {
            return new ProductListConditionalAvailabilityPageSearchToEventBehaviorFacadeBridge(
                $container->getLocator()->eventBehavior()->facade(),
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addConditionalAvailabilityFacade(Container $container): Container
    {
        $container[static::FACADE_CONDITIONAL_AVAILABILITY] = static function (Container $container) {
            return new ProductListConditionalAvailabilityPageSearchToConditionalAvailabilityFacadeBridge(
                $container->getLocator()->conditionalAvailability()->facade(),
            );
        };

        return $container;
    }
}
