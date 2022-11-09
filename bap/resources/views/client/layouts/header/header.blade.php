<!-- Header -->
<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        @include('client.layouts.header.header-menu-hamburger')
        @include('client.layouts.header.header-logo')
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
                <div class="btn-list">
                    @include('client.layouts.header.header-button-social')
                </div>
            </div>
            <div class="nav-item d-md-flex me-3">
                @include('client.layouts.header.header-change-theme')
{{--                @include('client.layouts.header.header-notification')--}}
            </div>
{{--            @include('client.layouts.header.header-dropdown-user-menu')--}}
            <div class="nav-item d-md-flex me-3">
                @include('client.layouts.header.header-menu-user')
            </div>
        </div>
    </div>
</header>
