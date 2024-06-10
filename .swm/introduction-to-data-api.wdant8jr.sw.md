---
title: Introduction to Data API
---
The Data API in the dhl-magento2-plugin is a set of classes and methods that facilitate the interaction between the plugin and DHL's services. It is used to structure and send requests to DHL's API, as well as to handle the responses. The Data API is divided into two main parts: Request and Response. The Request part, located in the Model/Data/Api/Request directory, contains classes that represent different types of requests that can be sent to DHL's API, such as Shipment and CapabilityCheck. These classes define the structure of the request data. The Response part, located in the Model/Data/Api/Response directory, contains classes that represent different types of responses that can be received from DHL's API, such as Shipment and Capability. These classes define the structure of the response data.

<SwmSnippet path="/Model/Data/Api/Request/Shipment.php" line="3">

---

## Using the Request Classes

This is an example of a request class. The `Shipment` class extends `AbstractData`, which means it inherits all the methods and properties of `AbstractData`. You can use this class to create a shipment request to send to the DHL API.

```hack
namespace DHLParcel\Shipping\Model\Data\Api\Request;

use DHLParcel\Shipping\Model\Data\AbstractData;

class Shipment extends AbstractData
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Data/Api/Response/Shipment.php" line="3">

---

## Using the Response Classes

This is an example of a response class. The `Shipment` class also extends `AbstractData`, which means it inherits all the methods and properties of `AbstractData`. You can use this class to handle a shipment response from the DHL API.

```hack
namespace DHLParcel\Shipping\Model\Data\Api\Response;

use DHLParcel\Shipping\Model\Data\AbstractData;

class Shipment extends AbstractData
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
