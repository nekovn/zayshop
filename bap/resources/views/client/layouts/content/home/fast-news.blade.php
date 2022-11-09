<section class="container py-3">
    <div class="row h-50">
        <div class="col-md-8">
            @include('client.layouts.content.home.news.head')
            @include('client.layouts.content.home.news.card')
        </div>
        <div class="col-md-4">
            @include('client.layouts.content.home.news.gold.head')
            @include('client.layouts.content.home.news.gold.card')
            @include('client.layouts.content.home.news.exchange-rate.head')
            @include('client.layouts.content.home.news.exchange-rate.card')
        </div>

    </div>

</section>
