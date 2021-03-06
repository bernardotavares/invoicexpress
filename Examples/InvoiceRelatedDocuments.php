<?php

use InvoiceXpress\Api\Invoice;
use InvoiceXpress\Exceptions\Generic;
use InvoiceXpress\Exceptions\InvalidResponse;

require('Variables.php');

try {
    # Create the base invoice Item
    $invoice = Invoice::get($auth, $invoice_id, \InvoiceXpress\Entities\Invoice::DOCUMENT_TYPE_INVOICE);
    $documents = $invoice->relatedDocuments();
    dd($documents);
} catch (Exception $e) {
    if ($e instanceof InvalidResponse) {
        dd($e->getBody(), $e->getBodyAsJson());
    } elseif ($e instanceof Generic) {
        dd($e->getMessage(), $e->getContext());
    } else {
        dd($e->getMessage());
    }
    dd($e);
}
