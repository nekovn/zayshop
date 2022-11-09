<div class="col-12 col-md-9">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('client.member.right.content.content-head')
                <div class="card-body">
                    @switch($type)
                        @case('form')
                            @include('client.member.right.content.form.form')
                            @break
                        @case('card')
                            @include('client.member.right.content.card.card')
                            @break
                        @case('invoice')
                            @include('client.member.right.content.invoice.invoice')
                            @break
                        @case('Table')
                            @include('client.member.right.content.table.table')
                            @break
                        @case('text')
                            @include('client.member.right.content.text.text')
                            @break
                        @default
                            @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</div>
