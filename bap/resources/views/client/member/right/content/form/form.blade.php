@php
    $config = new \App\Helpers\Blade\Helper;
    $form = new \App\Helpers\Form\Helper;
    $attributesForm = config('app-settings-client.form');
    $genderDefault = config('app-settings-client.select-gender-default');

    foreach($attributesForm as $key => &$value) {
        $input = $value['input'];
        $value['label'] = Form::label("$functionId-$key", $value['label'], ['class' => $value['label_class'].' col-3 col-form-label']);

        switch ($key) {
            case 'tell':
                $value['input'] = Form::$input($key, $value['value'],['class' => $value['input_class'], 'id' => "$functionId-$key",
                                  'autocomplete' => 'off', 'data-mask' => $value['placeholder'], 'data-mask-visible' => 'true']);
                break;
            case 'current_password':
            case 'new_password':
                $value['input'] = "<div class='input-group input-group-flat'>".
                                    Form::$input($key, ['class' => $value['input_class'], 'id' => "$functionId-$key", 'placeholder' => $value['placeholder']]).
                                  "</div>";
                break;
            case 'gender':
            case 'partner':
                $value['input'] = Form::$input($key, $value['value'], $genderDefault, ['class' => $value['input_class'], 'id' => "$functionId-$key"]);
                break;
            case 'avatar':
                $value['input'] = "<img class='${value['input_class']}' src='${value['value']}'>";
                break;
            case 'file':
                $value['input'] = Form::$input('image', ['class'=>'form-control','id'=>'fileImage']);
                break;
            case 'agree':
                $value['input'] = Form::$input($key, $value['value'], false, ['class' => $value['input_class'], 'id' => "$functionId-$key"]);
                break;
            default:
                $value['input'] = Form::$input($key, $value['value'],['class' => $value['input_class'], 'id' => "$functionId-$key", 'placeholder' => $value['placeholder']]);
                break;
        }

    }

    $formOpen   = Form::open(['route'=>'client.submit', 'method'=>'POST', 'name'=>'contact', 'id'=>'form-'.$functionId, 'class'=>'', 'role'=> 'form', 'autocomplete' => 'off']);
    $formClose  = Form::close();
    $btnSubmit  = Form::submit(Lang::get('global.M.b.send'), ['class' => 'btn btn-primary']);
    $xhtml      = $form::renderFormFields($fields, $attributesForm, 'form-group row mb-3', 'col');


@endphp
@if ($xhtml)
    {!! $formOpen.$xhtml.$formClose !!}
    @include('client.member.right.content.form.form-footer')
@endif

