@php
    $help = new \App\Helpers\Form\Helper;
@endphp
<div class="form-footer">
    {!! $help::renderButtonPrint() !!}
</div>
@push('app-script')
    <script>
        function printBill(divName) {
            const printContents = document.getElementById(divName).innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
