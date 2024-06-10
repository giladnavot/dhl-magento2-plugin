---
title: Overview of Variable Rate
---
Variable Rate in the DHL Magento 2 plugin refers to the dynamic shipping rates provided by DHL. It is a part of the DHLParcel\\Shipping\\Model\\ResourceModel\\Carrier\\Rate\\CollectionFactory class, which is responsible for creating collections of shipping rates. These rates are determined based on various factors such as package weight, dimensions, and destination. The Variable Rate is used to calculate the shipping cost for each order in the Magento store.

<SwmSnippet path="/Block/Adminhtml/VariableRate/ImportField.php" line="1">

---

# Importing Variable Rates

The `ImportField` class is responsible for handling the import of variable rates. It defines an HTML form field of type 'file' which allows the store owner to upload a CSV file with the variable rates. The `getElementHtml` method generates the HTML for this form field.

```hack
<?php

namespace DHLParcel\Shipping\Block\Adminhtml\VariableRate;

class ImportField extends \Magento\Framework\Data\Form\Element\AbstractElement
{

    protected function _construct()
    {
        parent::_construct();
        $this->setType('file');
    }

    public function getElementHtml()
    {
        $timeConditionId = $this->getId() . '_time_condition';

        $html = '<input id="' . $timeConditionId . '" type="hidden" name="' . $this->getName() . '" value="' . time() . '" />';

        if (!$conditionTarget = $this->getConditionTarget($this->getId())) {
            return '<P class="message">'.__('Invalid system.xml configuration used, field required name is import').'</P>';
```

---

</SwmSnippet>

<SwmSnippet path="/Block/Adminhtml/VariableRate/ExportField.php" line="1">

---

# Exporting Variable Rates

The `ExportField` class is responsible for handling the export of variable rates. It defines an HTML button which, when clicked, triggers the export of the current variable rates to a CSV file. The `getElementHtml` method generates the HTML for this button.

```hack
<?php

namespace DHLParcel\Shipping\Block\Adminhtml\VariableRate;

class ExportField extends \Magento\Framework\Data\Form\Element\AbstractElement
{
    /**
     * @var \Magento\Backend\Model\UrlInterface
     */
    protected $backendUrl;

    /**
     * Export constructor.
     * @param \Magento\Framework\Data\Form\Element\Factory $factoryElement
     * @param \Magento\Framework\Data\Form\Element\CollectionFactory $factoryCollection
     * @param \Magento\Framework\Escaper $escaper
     * @param \Magento\Backend\Model\UrlInterface $backendUrl
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Data\Form\Element\Factory $factoryElement,
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
