---
title: Overview of Storefront UI
---
Storefront UI in the dhl-magento2-plugin refers to the user interface elements that are visible to the end-users of the Magento 2 online stores. It includes all the components and templates that are used to create the visual layout and interactive features of the store. This includes the delivery options provided by the DHL plugin, the interface for printing shipping labels, and any other DHL related features that are accessible from the store's frontend.

<SwmSnippet path="/view/frontend/web/js/view/deliveryoptions-info.js" line="1">

---

# JavaScript Files in Storefront UI

The `deliveryoptions-info.js` file is responsible for displaying delivery options to the customers.

```javascript
define([
    'jquery',
    'ko',
    'uiComponent',
    'mage/url',
    'Magento_Checkout/js/model/quote',
    'Magento_Checkout/js/action/select-shipping-method',
    'Magento_Checkout/js/model/shipping-rate-registry',
    'Magento_Checkout/js/model/shipping-rate-processor/new-address',
    'Magento_Checkout/js/model/shipping-rate-processor/customer-address'
], function ($, ko, Component, urlBuilder, quote, selectShippingMethodAction, rateRegistry, defaultProcessor, customerAddressProcessor) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'DHLParcel_Shipping/deliveryoptions-info'
        },

        /** DeliveryTimes **/
        timesEnabled: ko.observable(false),

```

---

</SwmSnippet>

<SwmSnippet path="/view/frontend/layout/checkout_index_index.xml" line="1">

---

# Layout Files in Storefront UI

The `checkout_index_index.xml` layout file is used to structure the checkout page where the delivery options are displayed.

```xml
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <head>
        <css src="DHLParcel_Shipping::css/deliveryoptions.css" />
        <css src="DHLParcel_Shipping::css/servicepoint.modal.css" />
        <css src="https://static.dhlparcel.nl/fonts/Delivery.css" src_type="url" />
    </head>
    <body>
        <referenceContainer name="after.body.start">
            <block class="Magento\Framework\View\Element\Template" template="DHLParcel_Shipping::js/servicepoint-loader.phtml" />
        </referenceContainer>
        <referenceBlock name="checkout.root">
            <arguments>
                <argument name="jsLayout" xsi:type="array">
                    <item name="components" xsi:type="array">
                        <item name="checkout" xsi:type="array">
                            <item name="children" xsi:type="array">
                                <item name="steps" xsi:type="array">
                                    <item name="children" xsi:type="array">
                                        <item name="shipping-step" xsi:type="array">
                                            <item name="children" xsi:type="array">
```

---

</SwmSnippet>

<SwmSnippet path="/view/frontend/templates/servicepoint.modal.phtml" line="1">

---

# Template Files in Storefront UI

The `servicepoint.modal.phtml` template file is used to create a modal for service point selection.

```html+php
<div id="dhlparcel-shipping-modal-content">
    <div id="dhlparcel_shipping_locator_real_reset">
        <div id="dhl-servicepoint-locator-component"
         data-query=""
         data-limit="7"
         data-locale="<?=$block->escapeHtml($block->getLanguage())?>"
         data-setup="dhlparcel_shipping_reset_servicepoint"
         data-maps-key="<?=$block->escapeHtml($block->getGoogleMapsKey())?>"
        ></div>
    </div>
</div>

```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
