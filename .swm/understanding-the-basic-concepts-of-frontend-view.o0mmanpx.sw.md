---
title: Understanding the Basic Concepts of Frontend View
---
The Frontend View in the dhl-magento2-plugin refers to the user interface and its associated functionalities that the end-users interact with. It is primarily located in the 'view/frontend' directory. This directory contains subdirectories such as 'web/js/view', 'web/template', 'templates', and 'layout'. The 'web/js/view' directory contains JavaScript files that handle various functionalities like shipping rates validation, delivery options, and service point validation. The 'web/template' directory contains templates for the frontend. The 'templates' directory contains additional templates, including those for emails and service point modals. The 'layout' directory contains XML files that define the layout of the frontend pages. There is also a 'View' class in 'Controller/Adminhtml/Log/View.php' that handles the viewing of logs in the backend.

<SwmSnippet path="/view/frontend/web/js/view/deliveryoptions-info.js" line="1">

---

## JavaScript Files

For instance, the deliveryoptions-info.js file handles the display and functionality of delivery options on the frontend. It interacts with the Magento 2 store's frontend to display delivery options to the user and handle user interactions.

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

<SwmSnippet path="/view/frontend/templates/js/servicepoint-loader.phtml" line="1">

---

## Template Files

The servicepoint-loader.phtml file is a template file that defines the HTML structure and appearance of the service point loader on the frontend. It is rendered on the frontend to display the service point loader to the user.

```html+php
<nav data-mage-init='{"dhlparcel-shipping-servicepoint": {}}'></nav>

```

---

</SwmSnippet>

<SwmSnippet path="/view/frontend/requirejs-config.js" line="1">

---

## Configuration File

The requirejs-config.js file is used to load and configure the required JavaScript modules for the frontend view. It maps the 'dhlparcel-shipping-servicepoint' module to the 'servicepoint-loader' JavaScript file and configures mixins for the 'Magento_Checkout/js/view/shipping' module.

```javascript
var config = {
    map: {
        '*': {
            'dhlparcel-shipping-servicepoint': 'DHLParcel_Shipping/js/view/servicepoint-loader'
        }
    },
    'config': {
        'mixins': {
            'Magento_Checkout/js/view/shipping': {
                'DHLParcel_Shipping/js/view/servicepoint-validate-mixin': true,
                'DHLParcel_Shipping/js/view/deliverytimes-validate-mixin': true,
                'DHLParcel_Shipping/js/view/deliveryservices-validate-mixin': true
            }
        }
    }
};
```

---

</SwmSnippet>

# Frontend View Functions

In the view/frontend/web/js/view directory, there are several JavaScript files each serving a specific purpose in the frontend view. These include shipping-rates-validation.js, deliveryoptions-info.js, deliveryservices-validate-mixin.js, deliverytimes-validate-mixin.js, servicepoint-loader.js, servicepoint-validate-mixin.js, and servicepoint-info.js.

<SwmSnippet path="/view/frontend/web/js/view/shipping-rates-validation.js" line="1">

---

# Shipping Rates Validation

This file contains the logic for validating the shipping rates provided by DHL. It ensures that the rates are valid and applicable for the selected delivery options.

```javascript
define([
        'uiComponent',
        'Magento_Checkout/js/model/shipping-rates-validator',
        'Magento_Checkout/js/model/shipping-rates-validation-rules',
        'DHLParcel_Shipping/js/model/dhlparcel-validator',
        'DHLParcel_Shipping/js/model/dhlparcel-rules'
    ], function (
        Component,
        defaultShippingRatesValidator,
        defaultShippingRatesValidationRules,
        shippingRatesValidator,
        shippingRatesValidationRules
    ) {
        'use strict';
        defaultShippingRatesValidator.registerValidator('dhlparcel', shippingRatesValidator);
        defaultShippingRatesValidationRules.registerRules('dhlparcel', shippingRatesValidationRules);
        return Component;
    }
);

```

---

</SwmSnippet>

<SwmSnippet path="/view/frontend/web/js/view/deliveryoptions-info.js" line="1">

---

# Delivery Options Information

This file provides the functionality to display information about the available delivery options to the user. It fetches the data from the backend and formats it for display on the frontend.

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

<SwmSnippet path="/view/frontend/web/js/view/servicepoint-loader.js" line="1">

---

# Service Point Loader

This file is responsible for loading the service points available for delivery. It fetches the data from the backend and prepares it for display on the frontend.

```javascript
define([
    'jquery',
    'Magento_Checkout/js/model/quote',
    'Magento_Checkout/js/model/shipping-rate-registry',
    'Magento_Ui/js/modal/modal',
    'mage/url',
    'Magento_Checkout/js/model/shipping-rate-processor/new-address',
    'Magento_Checkout/js/model/shipping-rate-processor/customer-address'
], function($, quote, rateRegistry, modal, urlBuilder, defaultProcessor, customerAddressProcessor) {
    return function(config, element) {
        var dhlparcel_shipping_servicepoint_modal_loading_busy = false;
        var dhlparcel_shipping_servicepoint_modal_loaded = false;
        var dhlparcel_shipping_servicepoint_selected = false;

        $(document.body).on('dhlparcel_shipping:load_servicepoint_modal', function(e) {
            if (dhlparcel_shipping_servicepoint_modal_loaded === true) {
                return;
            }

            /* Prevent loading additional times while loading by checking if it's busy loading */
            if (dhlparcel_shipping_servicepoint_modal_loading_busy === true) {
```

---

</SwmSnippet>

<SwmSnippet path="/view/frontend/web/js/view/servicepoint-validate-mixin.js" line="1">

---

# Service Point Validation

This file contains the logic for validating the selected service point. It ensures that the service point is valid and available for the selected delivery options.

```javascript
define([
        'jquery',
        'ko',
        'Magento_Checkout/js/model/quote'
    ], function ($, ko, quote) {
        'use strict';

        return function (shippingAction) {
            return shippingAction.extend({
                errorDeliveryValidationMessage: ko.observable(false),
                validateShippingInformation: function () {
                    var method = quote.shippingMethod();
                    if (typeof method !== 'undefined' && method !== null && typeof method.carrier_code !== 'undefined' && typeof method.method_code !== 'undefined') {
                        if (method.carrier_code === 'dhlparcel' && method.method_code === 'servicepoint') {
                            if (window.dhlparcel_shipping_servicepoint_validate !== true) {
                                $('#dhlparcel-shipping-servicepoint-info-error').show();
                                return false;
                            }
                        }
                    }

```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
