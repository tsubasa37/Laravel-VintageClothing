
const x = "'>";
document.body.addEventListener("keyup", () => {
document.getElementById("box").innerHTML = document.getElementById("area").value;
});


/* 囲みタグ挿入 */
$(document).on('click', '.insertString', function(){
    /** 挿入対象のテキストエリア情報を取得 */
    var obj = $('#information');
    var v = obj.val();
    var selin = obj.prop('selectionStart');
    var selout = obj.prop('selectionEnd');
    /** 押下された挿入タグ情報から開始/終了タグを取得 */
    var befStr = $(this).data('before');
    var aftStr = $(this).data('after');
    var v1 = v.substr(0,selin);
    var v2 = v.substr(selin,selout-selin);
    var v3 = v.substr(selout);
    /** 選択された文字列の前後に挿入する。 */
    obj
        .val(v1 + befStr + v2 + aftStr + v3)
        .prop({
            "selectionStart":selin + befStr.length,
            "selectionEnd":selin + befStr.length + v2.length
            })
    .trigger("focus");
})



    // タブぼ切り替え
const tabsElems = document.querySelectorAll("[data-tabs]");

if(tabsElems.length > 0){
    for (let i = 0; i < tabsElems.length; i++) {
        let tab = tabsElems[i];
        let tabBtnElems = tab.querySelectorAll("[data-tab]");
        let tabContentElems = tab.querySelectorAll("[data-tab-content]");
        for (let i = 0; i < tabBtnElems.length; i++) {
            let tabBtn = tabBtnElems[i];
            let tabContent = tabContentElems[i];
            tabBtn.addEventListener("click", (e) => {
            e.preventDefault();
            for (let i = 0; i < tabBtnElems.length; i++) {
                tabBtnElems[i].classList.remove('active');
                tabContentElems[i].classList.remove('active');
                }
                tabBtn.classList.add('active');
                tabContent.classList.add('active');
            });
        }
    }
}


$(function() {
$('.tab').on('click', function() {
    $('.tab, .panel').removeClass('active');

    $(this).addClass('active');

    var index = $('.tab').index(this);
    $('.panel').eq(index).addClass('active');
});
});
