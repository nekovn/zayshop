@if($showCreated)
    @include('admin.layouts.content.header.create-new')
@endif
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    @include('admin.layouts.content.header.title')
                    @include('alert.alert-messages')
                    @switch($type)
                        @case('table')
                            @include('admin.layouts.content.table.index')
                            @break;
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</div>
