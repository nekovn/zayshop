@php
    $form = new \App\Helpers\Form\Helper;
    $attributes = config('app-settings-client.form');

    foreach($attributes as $key => &$value) {
        $input = $value['input'];
        $value['label'] = Form::label("$functionId-$key", $value['label'], ['class' => $value['label_class']]);
        switch ($key) {
            case 'tell':
                $value['input'] = Form::$input($key, $value['value'],['class' => $value['input_class'].' mt-1', 'id' => "$functionId-$key",
                                  'autocomplete' => 'off', 'data-mask' => $value['placeholder'], 'data-mask-visible' => 'true']);
                break;
            case 'client':
            case 'email':
            case 'subject':
            case 'textarea':
                $value['input'] = Form::$input($key, $value['value'],['class' => $value['input_class'].' mt-1', 'id' => "$functionId-$key", 'placeholder' => $value['placeholder']]);

                break;
            default:
                break;
        }

    }
    $btnSubmit     = Form::submit(Lang::get('global.B.contact.submit'), ['class' => 'btn btn-primary']);
    $formOpen      = Form::open(['route'=>'client.sendmail', 'method'=>'POST', 'name'=>'contact', 'id'=>'form-'.$functionId, 'class'=>'', 'role'=> 'form', 'autocomplete' => 'off']);
    $formClose     = Form::close();

    $xhtml = $form::renderFormFields($fields, $attributes, 'form-group col-md-6 mb-3');

@endphp

<!-- Start Contact -->
<div class="page-body">
    <div class="container">
        <!-- Start Map -->
        @include('client.layouts.content.contact.script')
        @include('alert.alert-messages')
        <div class="row py-3">
            {{ $formOpen }}
            <div class="row">
                {!! $xhtml !!}
                @include('client.layouts.content.contact.footer')
            </div>
            {{ $formClose }}
        </div>
    </div>
</div>
<!-- End Contact -->
