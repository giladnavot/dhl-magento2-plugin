---
title: Understanding Data Models
---
Data Models in the dhl-magento2-plugin are used to represent and manage data. They are organized into different directories such as Model/Data, Model/ResourceModel, and Model/Entity. These models define the structure of the data and the operations that can be performed on it. For instance, the `Collection` class in Model/ResourceModel/Piece/Collection.php defines a collection of pieces, and the `Piece` class in Model/Piece.php represents a single piece. These models are used throughout the codebase to interact with the data, whether it's retrieving data from the database, manipulating it, or storing it back.

<SwmSnippet path="/Model/ResourceModel/Piece/Collection.php" line="7">

---

# Collection Class

The `Collection` class is a type of Data Model that represents a collection of data items. It extends the `AbstractCollection` class and defines the model and resource model in its `_construct` method. This class is used to perform operations on collections of data.

```hack
class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'DHLParcel\Shipping\Model\Piece',
            'DHLParcel\Shipping\Model\ResourceModel\Piece'
        );
    }
}
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Piece.php" line="7">

---

# Piece Class

The `Piece` class is another example of a Data Model. It extends the `AbstractModel` class and defines the resource model in its `_construct` method. This class is used to perform operations on individual pieces of data.

```hack
class Piece extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('DHLParcel\Shipping\Model\ResourceModel\Piece');
    }
}
```

---

</SwmSnippet>

# Data Model Functions

The data models in the DHL Magento 2 plugin are used to encapsulate data and the logic that manipulates this data. The main functions in these data models are setArray, toJSON, and \_construct.

<SwmSnippet path="/Model/Data/AbstractData.php" line="17">

---

## setArray

The `setArray` function is used to set the properties of a data model from an array. It checks if the array is associative and if it is, it maps the array to the properties of the data model. If the array is not associative, it simply assigns the array to the property.

```hack
    public function setArray($array = [])
    {
        if (!is_array($array) || empty($array)) {
            return;
        }

        $me = $this;
        $properties = function () use ($me) {
            return get_object_vars($me);
        };

        $classMap = $this->getClassMap();
        $classArrayMap = $this->getClassArrayMap();

        foreach ($properties() as $key => $value) {
            if (array_key_exists($key, $array)) {
                if (is_array($array[$key])) {
                    if (array_key_exists($key, $classArrayMap)) {
                        // Class array mapper
                        $class = $classArrayMap[$key];
                        foreach ($array[$key] as $entry) {
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Data/AbstractData.php" line="59">

---

## toJSON

The `toJSON` function is used to convert the data model to a JSON string. It has an optional parameter that, if set to true, will remove null values from the JSON string.

```hack
    public function toJSON($removeNulls = false)
    {
        $json = json_encode($this);
        if ($removeNulls) {
            $json = $this->removeNulls($json);
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Data/AbstractData.php" line="9">

---

## \_construct

The `_construct` function is the constructor of the data model. It initializes the object manager and calls the `setArray` function to set the properties of the data model from an array.

```hack
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectmanager,
        $automap = []
    ) {
        $this->objectManager = $objectmanager;
        $this->setArray($automap);
    }
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
