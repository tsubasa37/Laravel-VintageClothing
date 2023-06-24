{{-- <div>
    <input type="file" id="image" name="image">
    @if(empty($filename))
        <img src="{{ asset('images/noimage.png') }}" alt="">
    @else
        <img src="{{ asset() }}" alt="">
    @endif
</div> --}}
<div class="imgarea ">
    <label>
        <span class="mypage-imgfile">
        <input type="file" name="image" class="form" style="display:none" accept="image/*">
            <div class="imgfile">
                @if(empty($filename))
                    <img src="{{ asset('images/noimage.png') }}" alt="">
                @else
                    <img src="{{ asset() }}" alt="">
                @endif
            </div>
        </span>
    </label>
</div>
<script>
    $(function () {
        $('input[type=file]').change(function () {
            var file = $(this).prop('files')[0];

            // 画像以外は処理を停止
            if (!file.type.match('image.*')) {
            // クリア
            $(this).val('');
            $('.imgfile').html('');
            return;
            }

            // 画像表示
            var reader = new FileReader();
            reader.onload = function () {
            var img_src = $('<img>').attr('src', reader.result);
            $('.imgfile').html(img_src);
            $('.imgarea').removeClass('noimage');
            }
            reader.readAsDataURL(file);
        });
    });
</script>