---
title: Understanding the Admin UI
---
The Admin UI in the DHL Magento 2 plugin refers to the administrative interface that allows store owners or administrators to manage the DHL shipping options and settings. It includes various components such as authentication, system settings, shipment management, and order management. The Admin UI is structured using Magento's MVC (Model-View-Controller) pattern, with directories like `Controller/Adminhtml/`, `view/adminhtml/`, and `Block/Adminhtml/` representing the Controller, View, and Model respectively. The `etc/adminhtml/` directory contains configuration files for the admin interface, and the `Ui/` directory contains UI components used across the admin interface. The `Observer/AdminLogin.php` file, for example, handles actions related to admin login events.

# Admin UI Directory Structure

The 'view/adminhtml' directory contains the templates, UI components, layout configurations, and web assets used in the admin interface. Each subdirectory serves a specific purpose in the construction of the Admin UI.

# Admin Controllers

The 'Controller/Adminhtml' directory contains controllers for handling requests related to different aspects of the plugin. Each subdirectory corresponds to a specific area of functionality, such as authentication, system settings, logs, shipments, and bulk operations.

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
