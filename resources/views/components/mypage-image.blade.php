
@php
    if($type === 'mypage'){
        $path = 'storage/gazou/';
    }
@endphp

<div class="imgfile">
    @if(empty($filename))
    <input type="file" name="image" class="form" accept="image/*" onchange="previewImage(this);">
        <img src="{{ asset('images/no_image.jpg') }}" alt="" id="preview">
    @else
    <input type="file" name="image" class="form" accept="image/*" onchange="previewImage(this);">
        <img src="{{ asset($path . $filename) }}" alt="" id="preview">
    @endif
</div>


<script>
    function previewImage(obj)
    {

        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview').src = fileReader.result;
	});
	    fileReader.readAsDataURL(obj.files[0]);
    }
</script>