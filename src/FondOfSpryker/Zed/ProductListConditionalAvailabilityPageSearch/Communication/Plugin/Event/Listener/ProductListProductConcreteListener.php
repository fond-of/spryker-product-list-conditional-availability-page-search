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
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface[] $transfers
     * @param string $eventName
     *
     * @throws
     *
     * @return void
     */
    public function handleBulk(array $transfers, $eventName): void
    {
        $this->preventTransaction();

        $concreteIds = $this->getFactory()->getEventBehaviorFacade()
            ->getEventTransferForeignKeys($transfers, SpyProductListProductConcreteTableMap::COL_FK_PRODUCT);

        $conditionalAvailabilityIds = $this->getFactory()->getConditionalAvailabilityFacade()
            ->getConditionalAvailabilityIdsByProductConcreteIds($concreteIds);

        $this->getFactory()->getConditionalAvailabilityPageSearchFacade()->publish($conditionalAvailabilityIds);
    }
}
