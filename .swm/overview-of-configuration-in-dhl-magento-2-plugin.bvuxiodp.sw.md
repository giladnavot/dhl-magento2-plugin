---
title: Overview of Configuration in DHL Magento 2 Plugin
---
Configuration in the DHL Magento 2 plugin refers to the setup of various parameters that control the behavior of the plugin. This includes settings related to shipping methods, delivery times, usability, and debugging. These configurations are primarily stored in the `etc/config.xml` file. This file contains default settings for the plugin, such as whether certain shipping methods are enabled, the maximum package weight, and error messages to display. Other configuration files like `etc/module.xml`, `etc/di.xml` and files in the `etc/frontend` directory also contribute to the overall configuration of the plugin. The `AdminLogin` class in `Observer/AdminLogin.php` also uses configuration data to control its behavior.

<SwmSnippet path="/etc/config.xml" line="1">

---

# Configuration File

This is the main configuration file for the DHL Magento2 Plugin. It contains various settings that control the behavior of the plugin. For example, the `<active>` tag under `<dhlparcel>` determines whether the plugin is active or not. Similarly, the `<title>` tag sets the title of the plugin that will be displayed to the user. Each of these settings can be customized as per the requirements of the store.

```xml
<?xml version="1.0"?>
<!--
  ~ Dhl Shipping
  ~
  ~ DISCLAIMER
  ~
  ~ Do not edit or add to this file if you wish to upgrade this extension to
  ~ newer versions in the future.
  ~
  ~ PHP version 5.6+
  ~
  ~ @category  DHLParcel
  ~ @package   DHLParcel\Shipping
  ~ @author    Ron Oerlemans <ron.oerlemans@dhl.com>
  ~ @copyright 2017 DHLParcel
  ~ @link      https://www.dhlparcel.nl/
  -->

<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Store:etc/config.xsd">
    <default>
        <carriers>
```

---

</SwmSnippet>

<SwmSnippet path="/Observer/AdminLogin.php" line="34">

---

# Using Configuration in Code

Here is an example of how the configuration settings are used in the application code. In the `execute` method of the `AdminLogin` class, the `getConfigData('active')` method is used to check whether the plugin is active or not. If the plugin is not active or is in test mode, the method returns early. This shows how the configuration settings can control the behavior of the plugin.

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

# Configuration Endpoints

This section provides an overview of the endpoints defined in the DHL Magento2 Plugin and how they are used to manage the plugin's configuration.

<SwmSnippet path="/etc/adminhtml/routes.xml" line="21">

---

# Admin Endpoints

This file defines the admin endpoint for the DHL Magento2 Plugin. The 'dhlparcel_shipping' route is defined for the 'admin' router. This means that when the 'dhlparcel_shipping' URL is accessed in the admin panel, the DHLParcel_Shipping module is invoked.

```xml
    <router id="admin">
        <route frontName="dhlparcel_shipping" id="dhlparcel_shipping">
            <module before="Magento_Backend" name="DHLParcel_Shipping"/>
        </route>
```

---

</SwmSnippet>

<SwmSnippet path="/etc/frontend/routes.xml" line="20">

---

# Frontend Endpoints

This file defines the frontend endpoint for the DHL Magento2 Plugin. Similar to the admin endpoint, the 'dhlparcel_shipping' route is defined, but this time for the 'standard' router. This means that when the 'dhlparcel_shipping' URL is accessed on the frontend, the DHLParcel_Shipping module is invoked.

```xml
    <router id="standard">
        <route id="dhlparcel_shipping" frontName="dhlparcel_shipping">
            <module name="DHLParcel_Shipping" />
        </route>
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
