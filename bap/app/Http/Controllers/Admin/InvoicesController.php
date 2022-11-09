<?php

namespace App\Http\Controllers\Admin;

class InvoicesController
{
    public function invoices() {
        return view ('admin.invoices');
    }
}
