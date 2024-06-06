---
title: Introduction to the Admin View
---
The Admin View in the dhl-magento2-plugin refers to the backend interface of the Magento 2 store where administrators can manage various aspects of the DHL shipping plugin. It includes templates for system configurations, order views, and shipment grids, among others. The Admin View also contains web assets like JavaScript and CSS files for the frontend presentation of the admin interface. The layout files define the structure of the admin pages, while the templates contain the HTML to be rendered on these pages. The 'view/adminhtml' directory is where all these files related to the Admin View are located.

## Directory Structure

The Admin View is organized into several directories. The 'templates' directory contains .phtml files which define the HTML structure of different pages. The 'web/js' directory contains JavaScript files for client-side functionality. The 'ui_component' directory contains XML files that define UI components for the Magento admin panel. The 'layout' directory contains XML files that define the layout structure of different pages.

<SwmSnippet path="/view/adminhtml/layout/adminhtml_system_config_edit.xml" line="1">

---

## Layout Configuration

This is an example of a layout configuration file. It defines the layout for the system configuration edit page. The 'css' tag within the 'head' tag is used to include a CSS file for this page.

```xml
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <head>
        <css src="DHLParcel_Shipping::css/same-day-check.css"/>
    </head>
```

---

</SwmSnippet>

# Admin View Functions

In the Admin View, there are several key functions that contribute to the rendering of the admin panel. These include the JavaScript files in the view/adminhtml/web/js directory and the layout configurations in the view/adminhtml/layout directory.

<SwmSnippet path="/view/adminhtml/web/js/options.js" line="1">

---

# JavaScript Files

The `options.js` file contains JavaScript functions that handle the behavior of various elements in the admin panel. For example, it may contain functions for handling button clicks, form submissions, and other user interactions.

```javascript
require([
    "jquery",
    "jquery/ui"
], function ($) {

    $.widget('dhlparcel.optionsform', {
        options: {
            container: null,
            enableCheckbox: null,
            baseUrl: '',
```

---

</SwmSnippet>

<SwmSnippet path="/view/adminhtml/layout/adminhtml_system_config_edit.xml" line="1">

---

# Layout Configurations

The `adminhtml_system_config_edit.xml` file is a layout configuration file. It defines the structure of the admin panel, including the placement of elements and the inclusion of CSS files. In this case, it includes the `same-day-check.css` file, which likely contains styles for a same-day shipping option.

```xml
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <head>
        <css src="DHLParcel_Shipping::css/same-day-check.css"/>
    </head>
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
