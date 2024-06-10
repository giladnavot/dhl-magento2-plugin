---
title: Understanding Delivery Times
---
Delivery Times in the DHL Magento 2 plugin refers to the functionality that manages the timeframes for delivery of orders. It is implemented in the `DHLParcel\Shipping\Model\Config\Source\DeliveryTimes` namespace, with classes like `CutoffTime`, `TransitDays`, and `DisplayDays` providing specific configurations for different aspects of delivery times. The `DeliveryTimes` service in `Model/Service/DeliveryTimes.php` uses these configurations to determine if delivery times are enabled, whether they should be displayed on the frontend, and to handle stock-related settings. It also provides methods to retrieve and parse timeframes for delivery based on postal code and country code.

<SwmSnippet path="/Model/Config/Source/DeliveryTimes/CutoffTime.php" line="1">

---

# Cutoff Time

The `CutoffTime` class is used to generate an array of hours from 1 to 24, which can be used to set the cutoff time for same-day shipping. The last hour is set to '23:59' to represent the end of the day.

```hack
<?php

namespace DHLParcel\Shipping\Model\Config\Source\DeliveryTimes;

class CutoffTime implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $ceil = 24;
        $hours = range(1, $ceil);

        $list = array();
        foreach ($hours as $hour) {
            if ($hour === 24) {
                $list[$hour] = '23:59';
            } else {
                $list[$hour] = sprintf('%s:00', $hour);
            }
        }

        return $list;
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Config/Source/DeliveryTimes/DisplayDays.php" line="1">

---

# Display Days

The `DisplayDays` class is used to set the number of days to display for delivery in the frontend. This allows the store to manage customer expectations by showing them when they can expect their order to be delivered.

```hack
<?php

namespace DHLParcel\Shipping\Model\Config\Source\DeliveryTimes;

class DisplayDays implements \Magento\Framework\Option\ArrayInterface
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Config/Source/DeliveryTimes/TransitDays.php" line="1">

---

# Transit Days

The `TransitDays` class is used to set the transit days for each shipping method. This is the number of days it takes for an order to be delivered after it has been shipped.

```hack
<?php

namespace DHLParcel\Shipping\Model\Config\Source\DeliveryTimes;

class TransitDays implements \Magento\Framework\Option\ArrayInterface
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Service/DeliveryTimes.php" line="16">

---

# Delivery Times Service

The `DeliveryTimes` service is used to manage the delivery times functionality. It includes methods to check if the functionality is enabled, to get the delivery time frames based on the postal code and country code, and to parse the time window data received from the DHL API.

```hack
class DeliveryTimes
{
    const SHIPPING_PRIORITY_BACKLOG = 'shipping_priority_backlog';
    const SHIPPING_PRIORITY_SOON = 'shipping_priority_soon';
    const SHIPPING_PRIORITY_TODAY = 'shipping_priority_today';
    const SHIPPING_PRIORITY_ASAP = 'shipping_priority_asap';

    protected $helper;
    protected $connector;
    protected $deliveryTimeFactory;
    protected $timeWindowFactory;
    protected $timeSelectionFactory;
    protected $stockRegistry;
    protected $checkoutSession;
    /** @var \Magento\Config\Model\Config\Source\Locale\Weekdays */
    protected $weekdays;

    /**
     * @var TimezoneInterface
     */
    protected $timezone;
```

---

</SwmSnippet>

# Delivery Times Functionality

The Delivery Times functionality is a crucial part of the DHL Magento 2 plugin, allowing the store to manage and display various aspects of delivery times to the customers.

<SwmSnippet path="/Model/Config/Source/DeliveryTimes/CutoffTime.php" line="1">

---

## CutoffTime

The `CutoffTime` class is part of the Delivery Times functionality. It likely deals with the cutoff time for orders to be included in the current day's deliveries.

```hack
<?php

namespace DHLParcel\Shipping\Model\Config\Source\DeliveryTimes;

class CutoffTime implements \Magento\Framework\Option\ArrayInterface
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Config/Source/DeliveryTimes/TransitDays.php" line="1">

---

## TransitDays

The `TransitDays` class is another part of the Delivery Times functionality. It likely manages the number of days it takes for a delivery to reach the customer.

```hack
<?php

namespace DHLParcel\Shipping\Model\Config\Source\DeliveryTimes;

class TransitDays implements \Magento\Framework\Option\ArrayInterface
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Config/Source/DeliveryTimes/DisplayDays.php" line="1">

---

## DisplayDays

The `DisplayDays` class is also part of the Delivery Times functionality. It likely controls how many days are displayed to the customer in the delivery options.

```hack
<?php

namespace DHLParcel\Shipping\Model\Config\Source\DeliveryTimes;

class DisplayDays implements \Magento\Framework\Option\ArrayInterface
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
