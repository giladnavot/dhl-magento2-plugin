---
title: Exploring the Shipment Process
---
<SwmSnippet path="/Controller/Adminhtml/Shipment/Labelrequest.php" line="33">

---

In the DHL Magento 2 plugin, 'Shipment' refers to the process of handling the shipping of orders. It is represented in the codebase by the `Shipment` class, which is used in various controllers such as `Labelrequest`, `Download`, and `PrintAction`. These controllers handle different aspects of the shipment process. For instance, `Labelrequest` is responsible for handling requests for shipping labels. It uses the `ShipmentRepository` to retrieve the shipment details and the `LabelService` to generate the labels. Similarly, `Download` handles the downloading of shipping labels, and `PrintAction` manages the printing of these labels. Each of these controllers uses the `Shipment` class to interact with the shipment details.

```hack
class Labelrequest extends \Magento\Backend\App\Action
{
    /**
     * @var LabelService
     */
    protected $labelService;

    /**
     * @var ShipmentRepository
     */
    protected $shipmentRepository;

    /**
     * @var PieceFactory
     */
    protected $pieceFactory;

    /**
     * @var PieceResource
     */
    protected $pieceResource;
```

---

</SwmSnippet>

# Shipment Functionality Overview

This section will provide an overview of the key functions related to the Shipment functionality in the DHL Magento 2 plugin. We will delve into the execute functions in the Download and PrintAction classes, and the redirectToNewShipment function in the UndoShipped class.

<SwmSnippet path="/Controller/Adminhtml/Shipment/Download.php" line="31">

---

# Download Class

The Download class is responsible for handling the download of shipment labels. The execute function retrieves the shipment ID from the request, fetches the corresponding shipment, and then attempts to get the label IDs for that shipment. If successful, it loops through each label ID to get the corresponding PDF. If any labels are not found, it increments a counter for failed labels. If no PDFs are found at all, it sends an error notification.

```hack
class Download extends \Magento\Backend\App\Action
{
    protected $labelService;
    protected $notificationService;
    protected $shipmentRepository;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        LabelService $labelService,
        NotificationService $notificationService,
        ShipmentRepository $shipmentRepository
    ) {
        $this->labelService = $labelService;
        $this->notificationService = $notificationService;
        $this->shipmentRepository = $shipmentRepository;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     * @throws \Zend_Pdf_Exception
```

---

</SwmSnippet>

<SwmSnippet path="/Controller/Adminhtml/Shipment/PrintAction.php" line="30">

---

# PrintAction Class

The PrintAction class is responsible for handling the printing of shipment labels. The execute function, similar to the Download class, retrieves the shipment ID from the request and fetches the corresponding shipment. It then gets the label IDs for that shipment and sends them to the printing service. If successful, it sends a success notification with the number of labels printed.

```hack
class PrintAction extends \Magento\Backend\App\Action
{
    protected $labelService;
    protected $notificationService;
    protected $shipmentRepository;
    protected $printingService;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        LabelService $labelService,
        NotificationService $notificationService,
        PrintingService $printingService,
        ShipmentRepository $shipmentRepository
    ) {
        $this->labelService = $labelService;
        $this->notificationService = $notificationService;
        $this->printingService = $printingService;
        $this->shipmentRepository = $shipmentRepository;
        parent::__construct($context);
    }

```

---

</SwmSnippet>

<SwmSnippet path="/Controller/Adminhtml/Shipment/UndoShipped.php" line="90">

---

# UndoShipped Class

The UndoShipped class provides the functionality to undo a shipment. The redirectToNewShipment function is used to redirect the user to the new shipment page for a given order. It retrieves the order ID from the request and generates a URL for the new shipment page for that order, then redirects the user to that URL.

```hack
    protected function redirectToNewShipment()
    {
        $orderId = $this->getRequest()
            ->getParam('order_id');
        $url = $this->getUrl('adminhtml/order_shipment/new', ['order_id' => $orderId]);

        return $this->resultRedirectFactory->create()
            ->setPath($url);
    }
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
