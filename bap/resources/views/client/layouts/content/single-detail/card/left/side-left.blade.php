<div class="col-lg-5">
    <div class="card card-lg">
        <div class="card-body">
            <div class="row row-cols-3 g-3">
                @include('client.layouts.content.single-detail.card.left.image')
            </div>
        </div>
    </div>
</div>
@push('app-script')
    <script src="{{ asset('assets/dist/libs/fslightbox/fslightbox.js') }}" defer></script>
@endpush
