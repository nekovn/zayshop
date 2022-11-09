@php
    $infoManger = config('app-settings-client.invoice-info-manger');
    $attributes = [
        'manger' => $infoManger,
        'client' => [
                        __('global.I.client.room.number', ['number' => '507']),
                        __('global.I.client.room.code', ['code' => 'SM507']),
                    ],
    ];
    $title = [
        'manger'  => __('global.T.invoice.manger'),
        'client'  => __('global.T.invoice.client'),
        'invoice' => __('global.T.invoice'),
    ];

@endphp
<div class="row">
    <div class="col-6">
        <p class="h3">{{ $title['manger'] }}</p>
        @foreach($attributes['manger'] as $item)
            @if ($item)
                <address>
                    {{ $item }}<br>
                </address>
            @endif
        @endforeach
    </div>
    <div class="col-6 text-end">
        <p class="h3">{{ $title['client'] }}</p>
        @foreach($attributes['client'] as $item)
            <address>
                {{ $item }}<br>
            </address>
        @endforeach
    </div>
    <div class="col-12 my-5">
        <h1>{{ $title['invoice'] }}</h1>
    </div>
</div>
