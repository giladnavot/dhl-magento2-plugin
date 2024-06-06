---
title: Runtime Adaptability of the Admin View
---
This document will cover how the system handles changes in the Admin View at runtime, such as when changing shipping options. We'll cover:

1. The role of the `ChangeShippingMethodName` class
2. How the `adminhtml_order_shipment_new.xml` layout file contributes to this process.

<SwmSnippet path="/Plugin/ChangeShippingMethodName.php" line="10">

---

# The Role of the ChangeShippingMethodName Class

The `ChangeShippingMethodName` class is part of the DHLParcel Shipping plugin. It is constructed with a `TimeSelectionFactory` object and a `Data` helper object. The `TimeSelectionFactory` object is used to create time selection instances, which could be related to the shipping options.

```hack
class ChangeShippingMethodName
{
    /**
     * @var TimeSelectionFactory
     */
    protected $timeSelectionFactory;

    /**
     * @var Data
     */
    protected $helper;

    public function __construct(
        TimeSelectionFactory $timeSelectionFactory,
        Data $helper
    ) {
        $this->timeSelectionFactory = $timeSelectionFactory;
        $this->helper = $helper;
    }
```

---

</SwmSnippet>

<SwmSnippet path="/view/adminhtml/layout/adminhtml_order_shipment_new.xml" line="1">

---

# The adminhtml_order_shipment_new.xml Layout File

This layout file defines the structure of the new shipment page in the admin view. It includes a CSS file for styling the shipping options and a JavaScript file for handling interactions with these options. The `dhlparcel_shipping_shipment_create` block is defined here, which uses the `DHLParcel\Shipping\Block\Adminhtml\Order\Shipment\Create` class and the `DHLParcel_Shipping::order/shipment/create.phtml` template. This block could be responsible for displaying and handling changes to the shipping options.

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
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <head>
        <css src="DHLParcel_Shipping::css/options.css"/>
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
