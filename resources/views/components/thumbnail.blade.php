@php
    if($type === 'shops'){
        $path = 'storage/shops/';
    }
    if($type === 'products'){
        $path = 'storage/products/';
    }
@endphp

<div>
    @if(empty($filename))
        <img src="{{ asset('images/Noimage2.png') }}" alt="">
    @else
        <img src="{{ asset($path . $filename) }}" alt="">
    @endif
</div>
