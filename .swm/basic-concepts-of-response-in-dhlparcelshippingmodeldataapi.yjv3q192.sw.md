---
title: Basic Concepts of Response in DHLParcel\\Shipping\\Model\\Data\\Api
---
<SwmSnippet path="/Model/Data/Api/Response/Capability.php" line="7">

---

The 'Response' in the DHLParcel\\Shipping\\Model\\Data\\Api\\Response namespace refers to the data returned from API calls. It's structured into different classes like 'Capability', 'Option', 'Product', etc. Each class represents a different aspect of the response. For example, 'Capability' class includes properties like 'rank', 'fromCountryCode', 'toCountryCode', 'product', 'parcelType', and 'options'. These properties represent different parts of the capability response from the API. The 'Response' classes are used to map the API response to objects that can be used within the application.

```hack
class Capability extends AbstractData
{
    public $rank;
    public $fromCountryCode;
    public $toCountryCode;
    /** @var \DHLParcel\Shipping\Model\Data\Api\Response\Capability\Product */
    public $product;
    /** @var \DHLParcel\Shipping\Model\Data\Api\Response\Capability\ParcelType */
    public $parcelType;
    /** @var \DHLParcel\Shipping\Model\Data\Api\Response\Capability\Option[] */
    public $options;

    protected function getClassMap()
    {
        return [
            'product'    => 'DHLParcel\Shipping\Model\Data\Api\Response\Capability\Product',
            'parcelType' => 'DHLParcel\Shipping\Model\Data\Api\Response\Capability\ParcelType',
        ];
    }

    protected function getClassArrayMap()
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Data/Api/Response/Capability.php" line="7">

---

# Response Classes

The 'Capability' class is an example of a 'Response' class. It represents the capabilities of a shipping option, such as the product type, parcel type, and available options. It includes methods to map the API response data to the class properties.

```hack
class Capability extends AbstractData
{
    public $rank;
    public $fromCountryCode;
    public $toCountryCode;
    /** @var \DHLParcel\Shipping\Model\Data\Api\Response\Capability\Product */
    public $product;
    /** @var \DHLParcel\Shipping\Model\Data\Api\Response\Capability\ParcelType */
    public $parcelType;
    /** @var \DHLParcel\Shipping\Model\Data\Api\Response\Capability\Option[] */
    public $options;

    protected function getClassMap()
    {
        return [
            'product'    => 'DHLParcel\Shipping\Model\Data\Api\Response\Capability\Product',
            'parcelType' => 'DHLParcel\Shipping\Model\Data\Api\Response\Capability\ParcelType',
        ];
    }

    protected function getClassArrayMap()
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Data/Api/Response/Capability/Option.php" line="7">

---

# Using Response Classes

The 'Option' class is another example of a 'Response' class. It represents an option for a shipping capability. It includes a property 'exclusions' which is an array of other 'Option' instances, demonstrating how these classes can be used to create a structured representation of the API response data.

```hack
class Option extends AbstractData
{
    public $key;
    public $description;
    public $rank;
    public $code;
    public $inputType;
    public $inputMax;
    public $optionType;
    /** @var \DHLParcel\Shipping\Model\Data\Api\Response\Capability\Option[] */
    public $exclusions;

    protected function getClassArrayMap()
    {
        return [
            'exclusions' => 'DHLParcel\Shipping\Model\Data\Api\Response\Capability\Option',
        ];
    }
}
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
