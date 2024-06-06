---
title: Introduction to the Data API
---
The Data API in the dhl-magento2-plugin is a set of classes and methods that facilitate the interaction between the plugin and DHL's services. It is organized into Request and Response directories, each containing classes that represent different types of data that can be sent to or received from the DHL API. For example, the `Name` class in the Request directory represents the name of an addressee for a shipment, while the `Capability` class in the Response directory represents the capabilities of a service provided by DHL. These classes extend the `AbstractData` class, which provides common functionality for all data classes. The Data API is used throughout the plugin to handle tasks such as creating shipments, checking service capabilities, and handling responses from the DHL API.

<SwmSnippet path="/Model/Data/Api/Request/Shipment.php" line="7">

---

## Request Data API

The `Shipment` class in the Request Data API is used to structure the data for a shipment request. It extends the `AbstractData` class and includes properties for various shipment details like the receiver, shipper, options, and pieces. The `getClassMap` and `getClassArrayMap` methods are used to map these properties to their respective classes.

```hack
class Shipment extends AbstractData
{
    public $shipmentId;
    public $orderReference;
    /** @var  \DHLParcel\Shipping\Model\Data\Api\Request\Shipment\Addressee */
    public $receiver;
    /** @var  \DHLParcel\Shipping\Model\Data\Api\Request\Shipment\Addressee */
    public $shipper;
    /** @var  \DHLParcel\Shipping\Model\Data\Api\Request\Shipment\Addressee */
    public $onBehalfOf;
    public $accountId;
    /** @var  \DHLParcel\Shipping\Model\Data\Api\Request\Shipment\Option[] */
    public $options;
    public $returnLabel;
    /** @var  \DHLParcel\Shipping\Model\Data\Api\Request\Shipment\Piece[] */
    public $pieces;
    public $application;

    protected function getClassMap()
    {
        return [
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Data/Api/Response/Shipment.php" line="7">

---

## Response Data API

The Response Data API works similarly to the Request Data API but is used to structure the data received in the response of an API call. For example, the `Shipment` class in the Response Data API would be used to structure the data received in the response of a shipment request.

```hack
class Shipment extends AbstractData
{
    public $shipmentId;
    /** @var \DHLParcel\Shipping\Model\Data\Api\Response\Shipment\Piece[] */
    public $pieces;

    protected function getClassArrayMap()
    {
        return [
            'pieces' => 'DHLParcel\Shipping\Model\Data\Api\Response\Shipment\Piece',
        ];
    }
}

```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
