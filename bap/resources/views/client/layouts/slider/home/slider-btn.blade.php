@php
    $xhtml= '';
    for($i=0; $i <= 4; $i++) {
        $classActive = $i === 0 ? 'class="active"' : '';
        $ariaCurrent = $i === 0 ? 'aria-current="true"' : '';
        $xhtml.= "<button aria-label='carousel-indicators' type='button' data-bs-target='#carousel-indicators' data-bs-slide-to='$i' $classActive $ariaCurrent></button>";
    }
@endphp

<div class="carousel-indicators">
    {!! $xhtml !!}
</div>
