---
title: Getting Started with Shipping Management
---
Shipping in the DHL Magento 2 plugin refers to the process of managing and handling the delivery of orders. The `Controller/Adminhtml/Shipment` directory contains various PHP files that handle different aspects of the shipping process. For instance, `Download.php` might be responsible for downloading shipping-related documents, `Labelrequest.php` could be handling requests for shipping labels, `PrintAction.php` might be managing the printing of shipping labels, `UndoShipped.php` could be used to revert a shipment status, and `Capabilities.php` might be checking the capabilities of the shipping service. The `Shipment` namespace is used across these files, indicating that they share common functionalities related to shipping. The `Data` alias is used to access helper functions related to shipping data, while the `ShipmentRepository` alias is used to interact with the shipment data in the database. The `Order` alias is used to handle order-related services.

<SwmSnippet path="/Controller/Adminhtml/Shipment/Capabilities.php" line="3">

---

# Shipping Controller

The Shipping Controller is defined in the `DHLParcel\Shipping\Controller\Adminhtml\Shipment` namespace. It uses the `Data` helper from `DHLParcel\Shipping\Helper\Data` to perform various shipping-related tasks.

```hack
namespace DHLParcel\Shipping\Controller\Adminhtml\Shipment;

use DHLParcel\Shipping\Helper\Data;
```

---

</SwmSnippet>

<SwmSnippet path="/Controller/ServicePoint/Validate.php" line="13">

---

# Shipping Methods

The `shippingMethod` field is used to store the selected shipping method for an order. This is used when validating the selected service point.

```hack
    protected $shippingMethod;

```

---

</SwmSnippet>

# Shipping Functions Overview

Let's delve into the key functions related to shipping in the DHL Magento 2 plugin.

<SwmSnippet path="/Controller/Adminhtml/Shipment/UndoShipped.php" line="19">

---

## UndoShipped

The `UndoShipped` function is part of the DHLParcel\\Shipping\\Controller\\Adminhtml\\Shipment namespace. It is used when a shipment needs to be marked as not shipped, perhaps due to an error or change in the order.

```hack
namespace DHLParcel\Shipping\Controller\Adminhtml\Shipment;

use DHLParcel\Shipping\Model\Service\Order;
use DHLParcel\Shipping\Model\Service\Order as OrderService;
use DHLParcel\Shipping\Model\Service\Notification as NotificationService;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Sales\Model\Order\Shipment;
use Magento\Sales\Model\Order\ShipmentRepository;

class UndoShipped extends \Magento\Backend\App\Action
```

---

</SwmSnippet>

<SwmSnippet path="/Controller/Adminhtml/Shipment/Capabilities.php" line="3">

---

## Capabilities

The `Capabilities` function is part of the DHLParcel\\Shipping\\Controller\\Adminhtml\\Shipment namespace. It is used to check the capabilities of the shipping service, such as available delivery options.

```hack
namespace DHLParcel\Shipping\Controller\Adminhtml\Shipment;

use DHLParcel\Shipping\Helper\Data;
use DHLParcel\Shipping\Model\Service\Capability as CapabilityService;

class Capabilities extends \Magento\Backend\App\Action
```

---

</SwmSnippet>

<SwmSnippet path="/Controller/Adminhtml/Shipment/PrintAction.php" line="19">

---

## PrintAction

The `PrintAction` function is part of the DHLParcel\\Shipping\\Controller\\Adminhtml\\Shipment namespace. It is used to handle the action of printing shipping labels for a shipment.

```hack
namespace DHLParcel\Shipping\Controller\Adminhtml\Shipment;

use DHLParcel\Shipping\Model\Service\Label as LabelService;
use DHLParcel\Shipping\Model\Service\Notification as NotificationService;
use DHLParcel\Shipping\Model\Service\Printing as PrintingService;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Sales\Model\Order\Shipment;
use Magento\Sales\Model\Order\ShipmentRepository;

class PrintAction extends \Magento\Backend\App\Action
```

---

</SwmSnippet>

## Enabled

The `Enabled` function is part of the DHLParcel\\Shipping\\Controller\\DeliveryServices namespace. It is used to check if the delivery services are enabled or not.

<SwmSnippet path="/Controller/DeliveryServices/Available.php" line="10">

---

## Available

The `Available` function is part of the DHLParcel\\Shipping\\Controller\\DeliveryServices namespace. It is used to check the availability of delivery services based on certain parameters like country and postal code.

```hack
class Available extends \DHLParcel\Shipping\Controller\AbstractResponse
{
    protected $storeManager;
    protected $capabilityService;
    protected $deliveryServicesService;
    protected $checkoutSession;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        CapabilityService $capabilityService,
        DeliveryServicesService $deliveryServicesService,
        CheckoutSession $checkoutSession
    ) {
        parent::__construct($context);
        $this->storeManager = $storeManager;
        $this->capabilityService = $capabilityService;
        $this->deliveryServicesService = $deliveryServicesService;
        $this->checkoutSession = $checkoutSession;
    }

```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
