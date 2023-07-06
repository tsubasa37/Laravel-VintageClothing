@php
    if($type === 'questions'){
        $path = 'storage/questions/';
    }
@endphp

<div>
    @if(empty($filename))
        <img src="" alt="" onerror="this.style.display='none'">
    @else
        <img src="{{ asset($path . $filename) }}" alt="">
    @endif
</div>
