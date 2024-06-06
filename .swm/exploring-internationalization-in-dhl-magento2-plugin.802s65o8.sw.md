---
title: Exploring Internationalization in DHL Magento2 Plugin
---
Internationalization, often abbreviated as i18n, is the process of designing a software application so that it can be adapted to various languages and regions without engineering changes. In the context of the dhl-magento2-plugin, internationalization is implemented through the use of language-specific CSV files located in the i18n directory. These files contain key-value pairs where the key is a string in English and the value is the translated string in the target language. This allows the plugin to support multiple languages and can be easily extended to new languages by adding more CSV files.

<SwmSnippet path="/i18n/en_US.csv" line="1">

---

# CSV Files for Internationalization

This CSV file contains key-value pairs of English text and their translations. Each line represents a different piece of text that is used in the plugin. When the plugin needs to display a piece of text, it looks up the translation in this file based on the user's language setting.

```csv
"Test Authentication","Test Authentication"
consumer,consumer
business,business
"DHL ServicePoint","DHL ServicePoint"
"We deliver your shipment to the address of the recipient","We deliver your shipment to the address of the recipient"
"At the door","At the door"
"We deliver your shipment to the recipient's nearest DHL ServicePoint","We deliver your shipment to the recipient's nearest DHL ServicePoint"
"In the mailbox","In the mailbox"
"Delivery in the mailbox of the recipient","Delivery in the mailbox of the recipient"
"(selected by customer)","(selected by customer)"
"(default closest selection)","(default closest selection)"
"Add a short reference for your own administration (max 15 characters).","Add a short reference for your own administration (max 15 characters)."
"Add a reference for your own administration (max 70 characters).","Add a reference for your own administration (max 70 characters)."
"Print an extra label for return shipments","Print an extra label for return shipments"
"This option allows you to claim the value of your shipment in case of damage or loss (up to € 500.00).","This option allows you to claim the value of your shipment in case of damage or loss (up to € 500.00)."
"We ask for a signature on delivery.","We ask for a signature on delivery."
"We deliver your shipment in the evening.","We deliver your shipment in the evening."
"We do not deliver at neighbours in case the recipient is not at home.","We do not deliver at neighbours in case the recipient is not at home."
"Additional transport insurance. If the value of the goods exceeds € 50.000, please contact our Customer Service prior to shipping.","Additional transport insurance. If the value of the goods exceeds € 50.000, please contact our Customer Service prior to shipping."
"We deliver your shipment on Saturday.","We deliver your shipment on Saturday."
"We deliver your shipment before 11 AM.","We deliver your shipment before 11 AM."
```

---

</SwmSnippet>

<SwmSnippet path="/i18n/nl_NL.csv" line="1">

---

# Translation Example

This is an example of a translation file for Dutch language. Each line corresponds to a line in the English CSV file. The plugin would use this file to display text in Dutch when the user's language setting is Dutch.

```csv
"Additional transport insurance. If the value of the goods exceeds € 50.000, please contact our Customer Service prior to shipping.",Aanvullende transportverzekering. Neem eerst contact op met de klantenservice als de waarde van uw zending hoger is dan € 50.000
"Column ""%1"" not found, individually per order","Kolom ""%1"" niet gevonden"
"Display errors, orders stacked per error",Toon foutmeldingen per bestelling
"Display errors, missing hide shipper city","Toon foutmeldingen, voeg de bestellingen per foutmelding samen"
"Failed to create label, missing hide shipper city","Label maken mislukt, de plaats van de verberg verzender mist"
"Failed to create label, missing hide shipper company name","Label maken mislukt, de bedrijfsnaam van verberg verzender mist"
"Failed to create label, missing hide shipper street number","Label maken mislukt, het huisnummer van de verberg verzender mist"
"Failed to create label, missing hide shipper street","Label maken mislukt, de straat van de verberg verzender mist"
"Failed to create label, missing receiver street number","Label maken mislukt, het huisnummer van ontvanger mist"
"Failed to create label, missing receiver street","Label maken mislukt, de straat van de ontvanger mist"
"Failed to create label, missing shipper street number","Label maken mislukt, het huisnummer van de verzender mist"
"Failed to create label, missing shipper street","Label maken mislukt, de straat van de verzender mist"
"Following orders are not eligible to be shipped, or have been shipped already: %1",De volgende bestellingen kunnen niet verstuurd worden of zijn al verstuurd: %1
"Following orders have shipping methods that do not support tracking functionality, either change the shipping method to a DHL method or contact your developers: %1",De volgende orders hebben verzendopties die geen track en trace ondersteunen. Verander de verzendmethode naar een DHL methode of neem contact op met uw websitebeheerder: %1
"Hide all errors, but list order numbers","Verberg alle foutmeldingen, toon alleen de bestelnummers"
"Hide original shipper and use configuration ""Alternative Shipping Address for Hide Shipper Service""","Verberg de verzender en gebruik de gegevens van ""Alternatief verzendadres voor Verberg Verzender"""
"Invalid condition code: ""%1""","Ongeldige conditie code: ""%1"""
"Invalid system.xml configuration used, field required name is import","Onjuiste system.xml configuratie gebruikt, benodigde veldnaam is import"
"No labels found for shipment %1, order number #%2","Geen labels gevonden voor zending %1, bestelnummer #%2"
"No shipments and labels where created, %1 orders failed due to errors","Geen zendingen en labels aangemaakt, %1 bestellingen mislukt door fouten"
"Please correct %1 ""%2"" in the Row #%3.","Corrigeer %1 ""%2"" in rij #%3"
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBZGhsLW1hZ2VudG8yLXBsdWdpbiUzQSUzQWdpbGFkbmF2b3Q=" repo-name="dhl-magento2-plugin"><sup>Powered by [Swimm](/)</sup></SwmMeta>
