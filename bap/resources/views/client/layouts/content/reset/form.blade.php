@php
    $form = new \App\Helpers\Form\Helper;
    $attributes = config('app-settings-client.form');
    $genderDefault = config('app-settings-client.select-gender-default');
    $formOpen   = Form::open(['route'=>'client.password.reset.submit', 'method'=>'POST', 'name'=>'forgot', 'id'=>'form-'.$functionId, 'class'=>'', 'role'=> 'form', 'autocomplete' => 'off']);
    $formClose  = Form::close();
    $btnSubmit  = Form::submit(Lang::get('global.B.send'), ['class' => 'btn btn-primary w-100']);
    $btnLogin   = Lang::get('global.B.login.login');
    $idPassword     = "eyes-password";
    foreach($attributes as $key => &$value) {
        $input = $value['input'];
        $value['label'] = Form::label("$functionId-$key", $value['label'], ['class' => $value['label_class']]);
        switch ($key) {
            case 'new_password':
                $value['input'] = "<div class='input-group input-group-flat'>".
                                   Form::$input('password', ['class' => $value['input_class'], 'id' => $idPassword, 'placeholder' => $value['placeholder']]).
                                  "</div>";
                break;
            case 'password_confirmation':
                $value['input'] = "<div class='input-group input-group-flat'>".
                                   Form::$input($key, ['class' => $value['input_class'], 'id' => "$functionId-confirm-password", 'placeholder' => $value['placeholder']]).
                                  "</div>";
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
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            {!! $xhtml !!}
            @include('client.layouts.content.login.footer')
        </div>
        {{ $formClose }}
        <div class="text-center text-muted mt-3">{!! link_to('/login', $btnLogin) !!}</div>
    </div>
</div>
@push('app-script')
    <script src="{{mix('/assets/js/utilities/composition/openEyePassword.js')}}" defer></script>
@endpush
