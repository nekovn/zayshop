@php
    $form = new \App\Helpers\Form\Helper;
    $attributes = config('app-settings-client.form');
    $genderDefault = config('app-settings-client.select-gender-default');
    $formOpen   = Form::open(['route'=>'admin.verify.store', 'method'=>'POST', 'name'=>'twofactor', 'id'=>'form-'.$functionId, 'class'=>'', 'role'=> 'form', 'autocomplete' => 'off']);
    $formClose  = Form::close();
    $btnSubmit  = Form::submit(Lang::get('global.B.send'), ['class' => 'btn btn-primary w-100']);
    $btnLogin   = Lang::get('global.C.two.factor.send.again');
    foreach($attributes as $key => &$value) {
        $input = $value['input'];
        $value['label'] = Form::label("$functionId-$key", $value['label'], ['class' => $value['label_class']]);
        switch ($key) {
            case 'two_factor_code':
                $value['input'] = Form::$input($key, $value['value'],['class' => $value['input_class'], 'id' => "$functionId-$key", 'placeholder' => $value['placeholder']]);
                break;
            default:
                break;
        }

    }
    $xhtml = $form::renderFormFields($fields, $attributes, 'mb-3');
@endphp

<div class="page-body">
    <div class="container-tight">
        @include('alert.alert-messages')
        {{ $formOpen }}
        <div class="card-body">
            @include('client.layouts.content.login.title')
            <p class="text-muted mb-4">{{ $description }}</p>
            {!! $xhtml !!}
            @include('client.layouts.content.login.footer')
        </div>
        {{ $formClose }}
        <div class="text-center text-muted mt-3">{!! link_to('/admin/verify/resend', $btnLogin) !!}</div>
    </div>
</div>
