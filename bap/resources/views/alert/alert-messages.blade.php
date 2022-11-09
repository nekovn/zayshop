@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger mt-3">
        <p>{{ session()->get('error') }}</p>
    </div>
@endif
@if (session()->has('success'))
<div class="alert alert-success mt-3">
    <p>{{ session()->get('success') }}</p>
</div>
@endif

