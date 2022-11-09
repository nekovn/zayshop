<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
    <a href="/" class="custom-logo">
        <img src="{{ asset('assets/dist/img/logo.svg') }}" width="89" height="79" alt="{{config('app.name')}}" class="navbar-brand-image">{{config('app.name')}}
    </a>
</h1>
@push('app-style')
<style>
.custom-logo {
    display: flex;
    align-items: center;
    font-size: 13px;
    padding-left: 40px;
}
.custom-logo:hover {
    text-decoration: none;
}
</style>
@endpush
