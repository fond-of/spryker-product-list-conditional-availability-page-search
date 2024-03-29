<?php

namespace FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Communication\Plugin\Event\Listener;

use Orm\Zed\ProductList\Persistence\Map\SpyProductListProductConcreteTableMap;
use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PropelOrm\Business\Transaction\DatabaseTransactionHandlerTrait;

/**
 * @method \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Business\ProductListConditionalAvailabilityPageSearchFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ProductListConditionalAvailabilityPageSearch\Communication\ProductListConditionalAvailabilityPageSearchCommunicationFactory getFactory()
 */
class ProductListProductConcreteListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    use DatabaseTransactionHandlerTrait;

    /**
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventEntityTransfers, $eventName): void
    {
        $this->preventTransaction();

        $concreteIds = $this->getFactory()->getEventBehaviorFacade()
            ->getEventTransferForeignKeys($eventEntityTransfers, SpyProductListProductConcreteTableMap::COL_FK_PRODUCT);

        $conditionalAvailabilityIds = $this->getFactory()->getConditionalAvailabilityFacade()
            ->getConditionalAvailabilityIdsByProductConcreteIds($concreteIds);

        $this->getFactory()->getConditionalAvailabilityPageSearchFacade()->publish($conditionalAvailabilityIds);
    }
}
