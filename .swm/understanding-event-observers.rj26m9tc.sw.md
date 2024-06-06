---
title: Understanding Event Observers
---
Event Observers in the DHL Magento 2 plugin are classes that listen for specific events in the application. When these events occur, the observer executes a function, typically called `execute()`. This function contains the logic that should be run in response to the event. For example, in the `AdminLogin` observer, the `execute()` function checks if the plugin is active and if the user is authenticated. In the `Shipment` observer, the `execute()` function creates a DHL shipment and adds tracking information. Observers allow the plugin to react to events in the Magento application, such as a successful admin login or the creation of a shipment, and perform additional processing as needed.

# Event Observers in Checkout Process

In the Observer/Checkout directory, there are several classes that implement the ObserverInterface. Each of these classes has an execute function that is triggered when a specific event occurs. Let's take a closer look at these functions.

<SwmSnippet path="/Observer/Checkout/ServicePoint.php" line="23">

---

# ServicePoint Observer

The execute function in the ServicePoint class is triggered when an order is placed with the shipping method 'dhlparcel_servicepoint'. It retrieves the ServicePoint ID from the checkout session and saves it to the order.

```hack
    public function execute(EventObserver $observer)
    {
        if (!$this->helper->getConfigData('active')) {
            return $this;
        }

        $order = $observer->getOrder();
        if ($order->getShippingMethod() === 'dhlparcel_servicepoint') {
            // Save session ServicePoint to order
            $servicePointId = $this->checkoutSession->getDHLParcelShippingServicePointId();
            if ($servicePointId) {
                $order->setData('dhlparcel_shipping_servicepoint_id', $servicePointId);
            }
        }
        return $this;
    }
```

---

</SwmSnippet>

<SwmSnippet path="/Observer/Checkout/DeliveryServices.php" line="28">

---

# DeliveryServices Observer

The execute function in the DeliveryServices class is triggered when an order is placed. It retrieves the delivery services from the checkout session, filters out the allowed services, and saves the selection to the order.

```hack
    public function execute(EventObserver $observer)
    {
        if (!$this->helper->getConfigData('active')) {
            return $this;
        }

        /** @var \Magento\Sales\Api\Data\OrderInterface|\Magento\Sales\Model\Order $order */
        $order = $observer->getOrder();

        $deliveryServices = $this->checkoutSession->getDHLParcelShippingDeliveryServices();
        $deliveryServices = $this->deliveryServicesService->filterAllowedOnly($deliveryServices);
        if (empty($deliveryServices)) {
            return $this;
        }

        $shippingAddress = $order->getShippingAddress();
        if (!$shippingAddress) {
            return $this;
        }

        $shippingMethod = $order->getShippingMethod();
```

---

</SwmSnippet>

<SwmSnippet path="/Observer/Checkout/DeliveryTimes.php" line="27">

---

# DeliveryTimes Observer

The execute function in the DeliveryTimes class is triggered when an order is placed. It checks if the delivery times feature is enabled and if a delivery time identifier is set in the checkout session. If these conditions are met, it saves the selected delivery time to the order.

```hack
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
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
