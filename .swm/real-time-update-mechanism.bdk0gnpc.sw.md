---
title: 'Real-Time Update Mechanism '
---
This document will cover how real-time updates are handled on the storefront in the DHL Magento 2 plugin. We'll cover:

1. The role of the Order class
2. The creation and undoing of shipments
3. The Carrier class and its responsibilities.

<SwmSnippet path="/Model/Service/Order.php" line="16">

---

# The Role of the Order Class

The `Order` class is responsible for managing shipments. It uses various services like `ShipmentLoader`, `ShipmentResource`, `TransactionFactory`, `Registry`, and `ShipmentRepository` to load, create, and manage shipments associated with an order.

```hack
class Order
{
    protected $shipmentLoader;
    protected $shipmentResource;
    protected $transactionFactory;
    protected $shipmentRepository;
    protected $registry;

    public function __construct(
        ShipmentLoader $shipmentLoader,
        ShipmentResource $shipmentResource,
        TransactionFactory $transactionFactory,
        Registry $registry,
        ShipmentRepository $shipmentRepository
    ) {
        $this->shipmentLoader = $shipmentLoader;
        $this->shipmentResource = $shipmentResource;
        $this->transactionFactory = $transactionFactory;
        $this->registry = $registry;
        $this->shipmentRepository = $shipmentRepository;
    }
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Service/Order.php" line="38">

---

# Creation and Undoing of Shipments

The `createShipment` method is used to create a shipment for a given order. It sets the order ID, preloads the shipment, and then loads the shipment. If the shipment cannot be created, it throws an exception. The `undoShipment` method is used to undo a shipment for a given shipment ID.

```hack
    public function createShipment($orderId)
    {
        $this->shipmentLoader->setOrderId($orderId);
        $this->preloadShipment();
        $shipment = $this->shipmentLoader->load();
        if ($shipment === false) {
            throw new NotShippableException(__("A shipment cannot be created for the order"));
        }

        try {
            $shipment->setData('dhlparcel_shipping_is_created', true);
            $this->shipmentResource->saveAttribute($shipment, ['dhlparcel_shipping_is_created']);
            $shipment->register();
            $this->saveShipment($shipment);
        } catch (\Exception $e) {
            if ($e instanceof FaultyServiceOptionException) {
                throw new FaultyServiceOptionException(__($e->getMessage()), $e);
            } elseif ($e instanceof LabelCreationException) {
                throw new LabelCreationException(__($e->getMessage()), $e);
            } elseif ($e instanceof NoTrackException) {
                throw new NoTrackException(__($e->getMessage()), $e);
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Carrier.php" line="19">

---

# The Carrier Class and Its Responsibilities

The `Carrier` class extends the `AbstractCarrierOnline` and implements the `CarrierInterface`. It is responsible for managing the carrier-related functionalities like tracking, rate management, and delivery services. It uses various services and factories to perform these tasks.

```hack
class Carrier extends \Magento\Shipping\Model\Carrier\AbstractCarrierOnline implements \Magento\Shipping\Model\Carrier\CarrierInterface
{
    // Attributes are restricted to Mage_Eav_Model_Entity_Attribute::ATTRIBUTE_CODE_MAX_LENGTH = 30 max characters
    const BLACKLIST_GENERAL = 'dhlparcel_blacklist';
    const BLACKLIST_SERVICEPOINT = 'dhlparcel_blacklist_sp';
    const BLACKLIST_ALL = 'dhlparcel_blacklist_all';
    protected $_code = 'dhlparcel';
    protected $capabilityService;
    protected $cartService;
    protected $checkoutSession;
    protected $debugLogger;
    protected $defaultConditionName;
    protected $pieceFactory;
    protected $pieceResource;
    protected $deliveryTimesService;
    protected $deliveryServicesService;
    protected $presetService;
    protected $rateManager;
    protected $servicePointService;
    protected $storeManager;
    protected $trackingUrl = 'https://my.dhlparcel.nl/home/tracktrace/{{trackerCode}}?lang={{locale}}';
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
