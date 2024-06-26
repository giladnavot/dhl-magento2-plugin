<?php

namespace DHLParcel\Shipping\Observer\Checkout;

use DHLParcel\Shipping\Model\Service\DeliveryTimes as DeliveryTimesService;
use DHLParcel\Shipping\Helper\Data;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Checkout\Model\Session as CheckoutSession;

class DeliveryTimes implements ObserverInterface
{
    protected $deliveryTimesService;
    protected $checkoutSession;
    protected $helper;

    public function __construct(
        DeliveryTimesService $deliveryTimesService,
        CheckoutSession $checkoutSession,
        Data $helper
    ) {
        $this->deliveryTimesService = $deliveryTimesService;
        $this->checkoutSession = $checkoutSession;
        $this->helper = $helper;
    }

    public function execute(EventObserver $observer)
    {
        if (!$this->helper->getConfigData('active')) {
            return $this;
        }

        /** @var \Magento\Sales\Api\Data\OrderInterface|\Magento\Sales\Model\Order $order */
        $order = $observer->getOrder();

        $enabled = $this->deliveryTimesService->isEnabled();
        if (!$enabled) {
            return $this;
        }

        $identifier = $this->checkoutSession->getDHLParcelShippingDeliveryTimesIdentifier();
        if (empty($identifier)) {
            return $this;
        }

        $shippingAddress = $order->getShippingAddress();
        if (!$shippingAddress) {
            return $this;
        }

        if ($shippingAddress->getCountryId() !== 'NL') {
            return $this;
        }

        $shippingMethod = $order->getShippingMethod();
        if ($shippingMethod !== 'dhlparcel_door'
            && $shippingMethod !== 'dhlparcel_evening'
            && $shippingMethod !== 'dhlparcel_no_neighbour'
            && $shippingMethod !== 'dhlparcel_no_neighbour_evening'
        ) {
            return $this;
        }

        $date = $this->checkoutSession->getDHLParcelShippingDeliveryTimesDate();
        $startTime = $this->checkoutSession->getDHLParcelShippingDeliveryTimesStartTime();
        $endTime = $this->checkoutSession->getDHLParcelShippingDeliveryTimesEndTime();

        $this->deliveryTimesService->saveTimeSelection($order, $date, $startTime, $endTime);

        return $this;
    }
}
