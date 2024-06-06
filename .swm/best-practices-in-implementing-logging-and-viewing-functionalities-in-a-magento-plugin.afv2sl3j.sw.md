---
title: >-
  Best Practices in Implementing Logging and Viewing Functionalities in a
  Magento Plugin
---
This document will cover the best practices in the implementation of logging and viewing functionalities in a Magento plugin. We'll cover:

1. The role of the Observer class in logging
2. The use of the execute function for logging and viewing functionalities.

<SwmSnippet path="/Observer/AdminLogin.php" line="11">

---

# The Role of the Observer Class in Logging

The `AdminLogin` class, which implements the `ObserverInterface`, is a key part of the logging functionality. It is constructed with several dependencies including `ApiCache`, `Connector`, `Data`, and `NotificationService`. These dependencies are used within the `execute` method to perform various logging and viewing operations.

```hack
//on admin login valid authentication check
class AdminLogin implements \Magento\Framework\Event\ObserverInterface
{
    protected $apiCache;
    protected $connector;
    protected $helper;
    protected $notificationService;

    public function __construct(
        ApiCache $apiCache,
        Connector $connector,
        Data $helper,
        NotificationService $notificationService
    ) {
        $this->apiCache = $apiCache;
        $this->connector = $connector;
        $this->helper = $helper;
        $this->notificationService = $notificationService;
    }

    /**
```

---

</SwmSnippet>

<SwmSnippet path="/Observer/AdminLogin.php" line="34">

---

# The Use of the Execute Function for Logging and Viewing Functionalities

The `execute` function is where the actual logging and viewing functionalities are implemented. It first checks if the plugin is active or in test mode. If not, it returns early. It then checks if a valid authentication is cached. If it is, it returns early. If not, it attempts to authenticate and logs an error message if the authentication fails. If the authentication is successful, it caches the valid authentication to reduce unnecessary load.

```hack
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (!$this->helper->getConfigData('active') || $this->helper->getConfigData('active') == YesNoTest::OPTION_TEST) {
            // plugin not active or in test mode
            return;
        }

        $cacheKey = $this->apiCache->createKey(0, 'authentication');

        if ($this->apiCache->load($cacheKey) !== false) {
            // valid authentication cached
            return;
        }

        // the configs here dont use
        $response = $this->connector->testAuthenticate($this->helper->getConfigData('api/user'), $this->helper->getConfigData('api/key'));
        if ($response === false) {
            // invalid authentication message
            $this->notificationService->error(__('DHL eCommerce extension has been turned on but user ID and API key combination is invalid'));
        } else {
            // cache valid authentication to reduce unnecessary load
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
