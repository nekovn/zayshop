@php
    $lists= config('app-settings-client.about-policy');
    $policyTitle  = Lang::get('global.C.about.policy.title');
@endphp
<div id="tab-bottom-3" class="card tab-pane" role="tabpanel">
    <div class="card-body">
        <blockquote class="blockquote"><p>{!! $policyTitle !!}</p></blockquote>
        @foreach($lists as $list)
            {!! $list !!}
        @endforeach
    </div>
</div>
