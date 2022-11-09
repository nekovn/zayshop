@php
    $form = new \App\Helpers\Form\Helper;
    $attributes = config('app-settings-client.form');

    $btnSubmit      = Form::submit(Lang::get('global.B.login.submit'), ['class' => 'btn btn-primary w-100']);
    $spanForgotPass = $form::spanForgotPassword();
    $formOpen       = Form::open(['route'=>'client.login.submit', 'method'=>'POST', 'name'=>'contact', 'id'=>'form-'.$functionId, 'class'=>'', 'role'=> 'form', 'autocomplete' => 'off']);
    $formClose      = Form::close();
    $idPassword     = "eyes-password";
    foreach($attributes as $key => &$value) {
        $input = $value['input'];
        switch ($key) {
            case 'user_name':
                $value['label'] = Form::label("$functionId-$key", $value['label'], ['class' => $value['label_class']]);
                $value['input'] = Form::$input($key, $value['value'],['class' => $value['input_class'], 'id' => "$functionId-$key", 'placeholder' => $value['placeholder'], 'autocomplete' => $key]);
                break;
            case 'current_password':
                $value['label'] = Form::labelSpan("$functionId-password", $value['label'], ['class' => $value['label_class'], 'span' => $spanForgotPass]);
                $value['input'] = "<div class='input-group input-group-flat'>".
                                   Form::$input('password', ['class' => $value['input_class'], 'id' => $idPassword, 'placeholder' => $value['placeholder']]).
                                  "</div>";
                break;
            case 'remember':
                $value['input'] = Form::$input($key, $value['value'], false, ['class' => $value['input_class'], 'id' => "$functionId-$key"]);
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
            {!! $xhtml !!}
            @include('client.layouts.content.login.footer')
        </div>
        {{ $formClose }}
        <div class="text-center text-muted mt-3">{{ $description }}</div>
    </div>
</div>
@push('app-script')
<script src="{{mix('/assets/js/utilities/composition/openEyePassword.js')}}" defer></script>
@endpush
