---
title: Understanding Data Models
---
Data Models in the dhl-magento2-plugin refer to the structure of data that is used within the plugin. They are used to define the data's attributes and their relationships. For instance, the `Piece` class in `Model/Piece.php` is a data model that represents a piece of a shipment. It is initialized with a resource model, which is responsible for the database operations related to the `Piece` data model. Similarly, the `Collection` class in `Model/ResourceModel/Piece/Collection.php` is a data model that represents a collection of `Piece` objects. It is also initialized with a resource model, which handles the database operations for the collection. These data models are used throughout the plugin to handle data related to shipments, rates, carriers, and more.

# Endpoint Overview

This section provides an overview of the 'authenticate/api-key' and 'capabilities/business' endpoints and how they are used in the dhl-magento2-plugin.

<SwmSnippet path="/Model/Api/Connector.php" line="18">

---

# 'authenticate/api-key' Endpoint

The 'authenticate/api-key' endpoint is used for authentication. The `post` method is used to send a POST request to this endpoint with the user ID and API key as parameters. If the authentication is successful, an access token is returned which is then used for authorization in subsequent API requests.

```hack
    const AUTH_API = 'authenticate/api-key';
    protected $accessToken;
    protected $apiCache;
    /** @var Client */
    protected $client;
    protected $debugLogger;
    protected $failedAuthentication = false;
    protected $helper;
    protected $url = 'https://api-gw.dhlparcel.nl/';
    public $isError = false;
    public $errorId = null;
    public $errorCode = null;
    public $errorMessage = null;

    public function __construct(
        ApiCache $apiCache,
        Client $client,
        Data $helper,
        DebugLogger $debugLogger
    ) {
        $this->apiCache = $apiCache;
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Service/Capability.php" line="192">

---

# 'capabilities/business' Endpoint

The 'capabilities/business' endpoint is used to fetch the capabilities of the business. The `get` method is used to send a GET request to this endpoint with a 'CapabilityCheck' object as a parameter. The response includes an array of capabilities that the business has.

```hack
    protected function sendRequest($storeId, $capabilityCheck)
    {
        $cacheKey = $this->apiCache->createKey($storeId, 'capabilities', $capabilityCheck->toArray(true));
        $json = $this->apiCache->load($cacheKey);

        if ($json === false) {
            $response = $this->connector->get('capabilities/business', $capabilityCheck->toArray(true));
            if (!empty($response)) {
                $this->apiCache->save(json_encode($response), $cacheKey, [], 3600);
            }
        } else {
            $response = json_decode($json, true);
        }

        $capabilities = [];
        if ($response && is_array($response)) {
            foreach ($response as $entry) {
                $capabilities[] = $this->capabilityFactory->create(['automap' => $entry]);
            }
        }

```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
