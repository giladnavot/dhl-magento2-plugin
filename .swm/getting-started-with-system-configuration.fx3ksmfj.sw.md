---
title: Getting Started with System Configuration
---
System Configuration in the DHL Magento 2 plugin refers to the settings and parameters that determine how the plugin operates within a Magento 2 store. It includes settings related to DHL services, such as shipping options, label printing, and region-specific configurations. These settings are accessible and modifiable through the Magento 2 admin panel, allowing store administrators to customize the plugin's functionality to best suit their store's needs and their customers' preferences.

<SwmSnippet path="/view/adminhtml/layout/default.xml" line="19">

---

# System Configuration in XML files

This is an example of a System Configuration in the `default.xml` file. It defines the layout of the admin page and includes a reference to the `legacy.css` stylesheet.

```xml
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" layout="admin-1column"
      xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <head>
        <css src="DHLParcel_Shipping::css/legacy.css"/>
```

---

</SwmSnippet>

<SwmSnippet path="/view/adminhtml/layout/adminhtml_system_config_edit.xml" line="1">

---

# System Configuration for specific admin pages

This is an example of a System Configuration for a specific admin page, in this case, the system config edit page. It includes a reference to the `same-day-check.css` stylesheet.

```xml
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <head>
        <css src="DHLParcel_Shipping::css/same-day-check.css"/>
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
