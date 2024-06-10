---
title: Overcoming Potential Challenges in Configuring the Plugin for New Stores
---
This document will cover the process of configuring the DHL Magento 2 plugin for a new store, which includes:\\n1. Understanding the plugin structure\\n2. Configuring the plugin settings\\n3. Handling potential challenges and their solutions.

<SwmSnippet path="/Plugin/OrderRepositoryPlugin.php" line="14">

---

# Understanding the plugin structure

The `OrderRepositoryPlugin` class is a key part of the plugin structure. It contains several services like `PresetService` and `DeliveryServicesService` which are essential for the plugin's operation. Understanding these services is crucial when configuring the plugin for a new store.

```hack
class OrderRepositoryPlugin
{
    protected $presetService;
    protected $deliveryServicesService;
    protected $extensionFactory;
    protected $deliveryTimesService;

    /**
     * @param PresetService           $presetService
     * @param DeliveryServicesService $deliveryServicesService
     * @param OrderExtensionFactory   $extensionFactory
     * @param DeliveryTimesService    $deliveryTimesService
     */
    public function __construct(
        PresetService $presetService,
        DeliveryServicesService $deliveryServicesService,
        OrderExtensionFactory $extensionFactory,
        DeliveryTimesService $deliveryTimesService
    ) {
        $this->presetService = $presetService;
        $this->deliveryServicesService = $deliveryServicesService;
```

---

</SwmSnippet>

<SwmSnippet path="/Model/Config/Source/AutoPrintStatus.php" line="15">

---

# Configuring the plugin settings

The `AutoPrintStatus` class is responsible for the configuration of the plugin. It uses the `coreStatus` object to get the configuration values. These values can be modified to suit the needs of the new store.

```hack
    public function __construct(\Magento\Sales\Model\Config\Source\Order\Status $coreStatus)
    {
        $this->coreStatus = $coreStatus;
    }

    public function toOptionArray()
    {
        $coreStatuses = $this->coreStatus->toOptionArray();

        $statuses = array();
        foreach ($coreStatuses as $i => $status) {
            if ($status['value'] != 'pending' &&
                $status['value'] != 'complete' &&
                $status['value'] != 'canceled' &&
                $status['value'] != 'closed') {
                $statuses[] = $status;
            }
        }

        return $statuses;
    }
```

---

</SwmSnippet>

<SwmSnippet path="/Setup/UpgradeData.php" line="41">

---

# Handling potential challenges and their solutions

The `UpgradeData` class handles the upgrade process of the plugin. It checks the current version of the plugin and performs necessary updates. This process can present challenges when configuring the plugin for a new store, especially if the store is running a different version of Magento. Understanding this process can help in overcoming these challenges.

```hack
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $this->eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        if (version_compare($context->getVersion(), "1.0.1", "<")) {
            $configs = [
                'carriers/dhlparcel/label/default_extra_insurance' => 'carriers/dhlparcel/label/default_extra_assured'
            ];
            $this->updateConfigPaths($configs);
        }

        if (version_compare($context->getVersion(), "1.0.2", "<")) {
            $configs = [
                'carriers/dhlparcel/usability/bulk/print' => 'carriers/dhlparcel/usability/bulk/download'
            ];
            $this->updateConfigPaths($configs);
            $this->addProductBlacklistAttributes();
        }

        if (version_compare($context->getVersion(), "1.0.5", "<")) {
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
