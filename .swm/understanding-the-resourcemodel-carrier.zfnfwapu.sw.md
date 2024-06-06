---
title: Understanding the ResourceModel Carrier
---
The ResourceModel Carrier in the DHL Magento 2 plugin refers to the data access layer for the Carrier model. It is responsible for managing the database operations related to the Carrier model, such as fetching, saving, and deleting data. The Carrier ResourceModel is organized into different classes, each serving a specific purpose. For instance, the `Rate` class handles operations related to carrier rates, the `Import` class is responsible for importing carrier rates, and the `RateManager` class manages the overall operations related to carrier rates. The `CSV` directory contains classes for handling CSV-related operations, such as resolving columns and parsing rows.

<SwmSnippet path="/Model/ResourceModel/Carrier/RateManager.php" line="17">

---

# RateManager Class

The RateManager class is the main class in the ResourceModel Carrier. It extends the Magento Framework's AbstractDb class, which provides basic functionalities for database operations. The RateManager class defines several properties and methods for managing the rates for the DHL shipping carrier. It uses the Import and RateQuery classes to import and query rates, respectively.

```hack
class RateManager extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @var int
     */
    protected $_importedRows = 0;
    /**
     * @var array|string[]
     */
    protected $conditionFullNames = [];
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $coreConfig;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
```

---

</SwmSnippet>

<SwmSnippet path="/Model/ResourceModel/Carrier/Rate/Import.php" line="16">

---

# Import Class

The Import class is used by the RateManager class to import rates from a CSV file. It uses the ColumnResolver and RowParser classes to parse the CSV file and convert it into a format that can be stored in the database.

```hack
class Import
```

---

</SwmSnippet>

# Understanding RateManager and Collection Classes

Let's take a closer look at the RateManager and Collection classes and their functions.

<SwmSnippet path="/Model/ResourceModel/Carrier/RateManager.php" line="17">

---

# RateManager Class

The RateManager class extends the Magento Framework's AbstractDb class, which provides basic functionalities for database operations. It has several properties and a constructor that initializes these properties. The constructor takes in various dependencies like the LoggerInterface, RequestInterface, and others, which are used in the class methods. The RateManager class is responsible for managing the shipping rates in the database.

```hack
class RateManager extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @var int
     */
    protected $_importedRows = 0;
    /**
     * @var array|string[]
     */
    protected $conditionFullNames = [];
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $coreConfig;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
```

---

</SwmSnippet>

<SwmSnippet path="/Model/ResourceModel/Carrier/Rate/Collection.php" line="9">

---

# Collection Class

The Collection class extends the Magento Framework's AbstractCollection class, which provides functionalities for handling collections of data. It has methods for initializing the select query, adding filters, and ordering the results. The Collection class is used to retrieve a collection of shipping rates from the database.

```hack
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Directory/country table name
     *
     * @var string
     */
    protected $countryTable;
    /**
     * Directory/country_region table name
     *
     * @var string
     */
    protected $regionTable;

    protected function _construct()
    {
        $this->_init(
            \DHLParcel\Shipping\Model\Carrier::class,
            \DHLParcel\Shipping\Model\ResourceModel\Carrier\RateManager::class
        );
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
