@php
    if($type === 'gazou'){
        $path = 'storage/gazou/';
    }
@endphp

<div>
    @if(empty($filename))
        <img src="{{ asset('images/noimage.png') }}" alt="">
    @else
        <img src="{{ asset($path . $filename) }}" alt="">
    @endif
</div>
