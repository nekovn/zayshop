@php
    $helper = new \App\Helpers\Blade\Table\auth\Helper;
@endphp
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
                {!! $helper::showButtonCreate($functionId) !!}
            </div>
        </div>
    </div>
</div>
