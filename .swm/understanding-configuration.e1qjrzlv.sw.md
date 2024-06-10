---
title: Understanding Configuration
---
Configuration in the dhl-magento2-plugin refers to the setup and customization of the DHL shipping plugin for Magento 2 online stores. It involves setting up various parameters and options that determine how the plugin behaves. This includes enabling or disabling certain features, setting default values, and specifying behavior under certain conditions. The configuration is primarily handled through XML files, such as the etc/config.xml file, which contains various settings for the plugin. These settings can be modified to customize the functionality of the plugin. Additionally, the plugin's configuration can be updated and modified over time using PHP scripts in the Setup directory, such as UpgradeData.php, which can update configuration paths and add new attributes.

<SwmSnippet path="/etc/config.xml" line="19">

---

# Configuration File

The `etc/config.xml` file contains the default configuration settings for the plugin. These settings include the status of the plugin (active or not), shipping methods, delivery times, usability features, and debugging options. Each setting is represented as an XML node with a value.

```xml
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Store:etc/config.xsd">
    <default>
        <carriers>
            <dhlparcel>
                <active>1</active>
                <title>DHL eCommerce</title>
                <sallowspecific>0</sallowspecific>
                <showmethod>0</showmethod>
                <specificerrmsg>This shipping method is not available. To use this shipping method, please contact us.</specificerrmsg>
                <label>
                    <create_label_by_default>1</create_label_by_default>
                    <default_to_business>0</default_to_business>
                    <default_reference_enabled>1</default_reference_enabled>
                    <default_reference_source>order_number</default_reference_source>
                    <default_reference2_enabled>0</default_reference2_enabled>
                    <default_return_label>0</default_return_label>
                    <default_hide_shipper>0</default_hide_shipper>
                    <alternative_tracking>
                        <enabled>0</enabled>
                        <url><![CDATA[https://www.dhlparcel.nl/nl/volg-uw-zending?tc={{trackerCode}}&pc={{postalCode}}]]></url>
                    </alternative_tracking>
```

---

</SwmSnippet>

<SwmSnippet path="/Setup/UpgradeData.php" line="92">

---

# Configuration Management

The `updateConfigPaths` function in `Setup/UpgradeData.php` is used to update the paths of configuration settings. This is used when the structure of the configuration file changes, to ensure that existing settings are correctly mapped to their new locations.

```hack
    private function updateConfigPaths($replaceConfigs)
    {
        foreach ($replaceConfigs as $oldPath => $newPath) {
            if ($this->configReader->getValue($oldPath)) {
                // Replace values to new path
                $this->configWriter->save($newPath, $this->configReader->getValue($oldPath));
            }
            $this->configWriter->delete($oldPath);
        }
    }
```

---

</SwmSnippet>

# Configuration Endpoints

Understanding Configuration Endpoints

<SwmSnippet path="/etc/adminhtml/routes.xml" line="21">

---

## dhlparcel_shipping in adminhtml/routes.xml

This endpoint is defined within the admin router. It specifies that the 'dhlparcel_shipping' frontName (or URL segment) is associated with the 'DHLParcel_Shipping' module. This means that when an admin user navigates to a URL that includes 'dhlparcel_shipping', they are interacting with the 'DHLParcel_Shipping' module.

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

## dhlparcel_shipping in frontend/routes.xml

This endpoint is defined within the standard router. Similar to the adminhtml endpoint, it associates the 'dhlparcel_shipping' frontName with the 'DHLParcel_Shipping' module. However, this endpoint is used for frontend users, not admin users.

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
