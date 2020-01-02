<?php

namespace FondOfSpryker\Client\ProductListConditionalAvailabilityPageSearch;

use FondOfSpryker\Client\ProductListConditionalAvailabilityPageSearch\Dependency\Client\ProductListConditionalAvailabilityPageSearchToCustomerClientInterface;
use Spryker\Client\Kernel\AbstractFactory;

class ProductListConditionalAvailabilityPageSearchFactory extends AbstractFactory
{
    /**
     * @throws
     *
     * @return \FondOfSpryker\Client\ProductListConditionalAvailabilityPageSearch\Dependency\Client\ProductListConditionalAvailabilityPageSearchToCustomerClientInterface
     */
    public function getCustomerClient(): ProductListConditionalAvailabilityPageSearchToCustomerClientInterface
    {
        return $this->getProvidedDependency(
            ProductListConditionalAvailabilityPageSearchDependencyProvider::CLIENT_CUSTOMER
        );
    }
}
