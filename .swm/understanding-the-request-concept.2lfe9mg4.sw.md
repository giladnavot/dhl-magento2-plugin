---
title: Understanding the Request Concept
---
In the DHL Magento 2 plugin, 'Request' is a concept used to structure the data that is sent to the DHL API. It is organized in a hierarchical manner, with the 'Shipment' class being a primary example. This class contains various properties such as 'shipmentId', 'orderReference', 'receiver', 'shipper', and 'onBehalfOf', each representing different parts of a shipment request. These properties are objects themselves, further detailing the request. For instance, 'receiver', 'shipper', and 'onBehalfOf' are instances of the 'Addressee' class, which includes properties like 'name', 'address', 'email', and 'phoneNumber'. This structure allows for a comprehensive representation of a shipment request, facilitating communication with the DHL API.

<SwmSnippet path="/Model/Data/Api/Request/Shipment.php" line="7">

---

# Shipment Request

The 'Shipment' class is a type of 'Request' that represents a shipment to be created in the DHL system. It contains various properties such as 'receiver', 'shipper', 'onBehalfOf', 'options', and 'pieces' that represent different aspects of the shipment. These properties are instances of other classes within the Request directory, such as 'Addressee', 'Option', and 'Piece'.

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

<SwmSnippet path="/Model/Data/Api/Request/Shipment/Addressee.php" line="7">

---

# Addressee Request

The 'Addressee' class is another type of 'Request' that represents the addressee of a shipment. It contains properties such as 'name' and 'address' that are instances of other classes within the Request directory. This class is used within the 'Shipment' class to represent the 'receiver', 'shipper', and 'onBehalfOf' properties.

```hack
class Addressee extends AbstractData
{
    /** @var \DHLParcel\Shipping\Model\Data\Api\Request\Shipment\Addressee\Name */
    public $name;
    /** @var \DHLParcel\Shipping\Model\Data\Api\Request\Shipment\Addressee\Address */
    public $address;
    public $email;
    public $phoneNumber;

    protected function getClassMap()
    {
        return [
            'name'    => 'DHLParcel\Shipping\Model\Data\Api\Request\Shipment\Addressee\Name',
            'address' => 'DHLParcel\Shipping\Model\Data\Api\Request\Shipment\Addressee\Address',
        ];
    }
}
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
