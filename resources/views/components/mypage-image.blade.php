@php
    if ($type === 'mypage') {
        $path = 'storage/gazou/';
    }
@endphp

<div class="imgfile">
    @if (empty($filename))
        <img src="{{ asset('images/no_image.jpg') }}" alt="" class="myPage_img" id="preview">
        <label class="upload-img-btn">
            画像変更
            <input type="file" name="image" class="form file-btn" style="display:none" accept="image/*"
                onchange="previewImage(this);">
        </label>
        {{-- <input type="file" name="image" class="form file-btn" accept="image/*" onchange="previewImage(this);"> --}}
    @else
    <img src="{{ asset($path . $filename) }}" alt="" class="myPage_img" id="preview">
    <label class="upload-img-btn">
        画像変更
        <input type="file" name="image" class="form file-btn" style="display:none" accept="image/*"
            onchange="previewImage(this);">
    </label>
        {{-- <input type="file" name="image" class="form file-btn" accept="image/*" onchange="previewImage(this);"> --}}
    @endif
</div>


<script>
    function previewImage(obj) {

        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
</script>
