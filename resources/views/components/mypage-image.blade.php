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
            <input type="file" id="image" name="image" accept=“image/png,image/jpeg,image/jpg” class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <div class="imgfile">
                @if(empty($image))
                    <img src="{{ asset('images/noimage.png') }}" alt="">
                @else
                    <img src="" alt="">
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