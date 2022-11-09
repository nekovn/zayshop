@php
    $lists= config('app-settings-client.about-list');
@endphp
<div id="tab-bottom-1" class="card tab-pane active" role="tabpanel">
    <div class="card-body">
        <blockquote class="blockquote">
            <p><b>{!! $appName !!}</b> {!! $description !!}</p>
        </blockquote>
        <p>{!! $aboutListTitle !!}</p>
        <ul>
            @foreach($lists as $list)
                <li>{{ $list }}</li>
            @endforeach
        </ul>
    </div>
</div>
