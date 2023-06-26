@php // image1~4を変数で設定する
    if($name === 'image1'){ $shop = 'shop-1'; }
    if($name === 'image2'){ $shop = 'shop-2'; }
    // if($name === 'image3'){ $shop = 'shop-3'; }

    if ($type === 'shop') {
        $path = 'storage/shops/';
    }
@endphp

<div>
    @if(empty($filename))
    <input type="file" name="{{$name}}" class="form" accept="image/*" onchange="previewImage(this);">
        <img src="{{ asset('images/no_image.jpg') }}" alt="" id="{{$shop}}">
    @else
    <input type="file" name="{{$name}}" class="form" accept="image/*" onchange="previewImage(this);">
        <img src="{{ asset($path . $filename) }}" alt="" id="{{$shop}}">
    @endif
</div>



<script>
    function previewImage(obj)
    {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById({{$shop}}).src = fileReader.result;
	});
	    fileReader.readAsDataURL(obj.files[0]);
    }
</script>