<div class="page-body">
    <div class="container">
        <div class="col-md-12 col-lg-12">
            <!-- Cards with tabs component -->
            <div class="card-tabs ">
                <div class="tab-content">
                    <!-- Content of card #1 -->
                    @include('client.layouts.content.about.content.about')
                    <!-- Content of card #2 -->
                    @include('client.layouts.content.about.content.services')
                    <!-- Content of card #3 -->
                    @include('client.layouts.content.about.content.policy')
                </div>
                <!-- Cards navigation -->
                @include('client.layouts.content.about.navigation')
            </div>
        </div>
    </div>
</div>

