@php
    $labelTel   = Lang::get('global.L.login.tel');
    $labelName  = Lang::get('global.L.contact.name');

    $placeTel   = Lang::get('global.P.login.tel');
    $placeName  = Lang::get('global.P.login.name');

    $btnReserve = Lang::get('global.B.reserve');
@endphp

<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        {{ Form::open(['route'=>'client.submit', 'method'=>'POST', 'name'=>'contact', 'id'=>'form-'.$functionId, 'class'=>'col-md-9 m-auto', 'role'=> 'form']) }}
        <div class="row justify-content-center w-75 m-auto">
            <!-- Name input -->
            <div class="form-outline mb-4">
                {!! Form::label($functionId.'-inputtel', $labelTel, ['class' => 'form-label']) !!}
                {!! Form::text('subject', '',['class' => 'form-control', 'id' => $functionId.'-inputtel', 'placeholder' => $placeTel]) !!}
            </div>
            <!-- Phone input -->
            <div class="form-outline mb-4">
                {!! Form::label($functionId.'-inputtel', $labelName, ['class' => 'form-label']) !!}
                {!! Form::text('subject', '',['class' => 'form-control', 'id' => $functionId.'-inputtel', 'placeholder' => $placeName]) !!}
            </div>

            {!! Form::hidden('code', '23612') !!}
            <!-- Submit button -->
            {!! Form::submit($btnReserve, ['class' => 'btn btn-primary btn-block mb-4']) !!}
        </div>
        {{Form::close()}}
    </div>
</div>
<!-- End Contact -->
