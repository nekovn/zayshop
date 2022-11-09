@php
    $help = new \App\Helpers\Blade\Table\client\Helper;
    $field = config('app-settings-client.invoice-thead');
@endphp
<thead>
<tr>
    {!! $help::showTheadInvoice($field) !!}
</tr>
</thead>
