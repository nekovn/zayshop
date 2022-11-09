@php
    $form = new \App\Helpers\Form\Helper;
    $formOpen   = Form::open(['method'=>'POST',
                              'name'=> $functionId.'-form',
                              'role'=> 'form',
                              'autocomplete' => 'off',
                              'enctype' => 'multipart/form-data']);
    $formClose  = Form::close();
@endphp

<div class="modal modal-blur fade" id="modal-report" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content custom-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="btn-close" aria-label="Close" id="modal-close"></button>
            </div>
            <div class="modal-body row">
                {!! $formOpen  !!}
                <div class="row" id="modal-body-text"></div>
                <div class="row" id="modal-body-form"></div>
                {!! $formClose !!}
            </div>
            <div class="modal-footer">
                <button class="btn btn-link link-secondary" id="modal-cancel">
                    {{ __('global.M.close.btn') }}
                </button>
                <button class="btn btn-primary ms-auto fade" id="modal-submit"></button>
            </div>
        </div>
    </div>
</div>
@push('app-style')
    <style>
        .custom-content {
            border-color: #626976;
        }

        .show {
            display: block;
        }
    </style>
@endpush
