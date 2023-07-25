<template>
        <!-- いいねアイコンはcssで設定。クラス名によって表示を変更 -->
    <div class="jsLikeButton" :class="className" @click="setLike($event)">
        <i class="fa fa-heart"></i>
    </div>
</template>

<script>
    module.exports = {
        delimiters: ['(%', '%)'], // Vue.js のデータバインディングは二重中括弧で blade と重複するため変更
        data: function() {
            return {
                likes: [],
                className: 'unLike'
            }
        },
        created: function () {
            // 画面表示の度にお気に入りの状態を更新
            window.addEventListener('pageshow', this.init);
        },
        beforeDestroy() {
            window.removeEventListener('pageshow', this.init);
        },
        props: ['id'],
        methods: {
            init() {
                // お気に入りを取得して変数に保持
                this.likes = this.getLikes();
                this.setClassName();
            },
            getLikes() {
                let values = [];
                let localStorageValues = JSON.parse(localStorage.getItem('likes'));
                if (localStorageValues) {
                    values = localStorageValues;
                }
                return values;
            },
            isLiked() {
                let indexPosition = this.likedIndexPosition();
                // 含まれている
                if (this.likes && -1 < indexPosition) {
                    return true;
                }
                // 含まれていない
                return false;
            },
            likedIndexPosition() {
                return this.likes.indexOf(this.id);
            },
            setClassName() {
                // 既にお気に入りか
                if (this.isLiked()) {
                    this.className = 'liked';
                } else {
                    this.className = 'unLike';
                }
            },
            setLike(event) {
                if (event) {
                    event.preventDefault();
                }
                if (this.likes) {
                    if (this.isLiked()) {
                        let indexPosition = this.likedIndexPosition();
                        // お気に入りから該当idを除去
                        this.likes.splice(indexPosition, 1) ;
                    } else {
                        // お気に入り追加
                        this.likes.push(this.id);
                    }

                } else {
                    // localStorageが存在していない場合
                    // お気に入り追加
                    this.likes.push(this.id);
                }

                // 新しい値をlocalStorageに設定
                localStorage.setItem('likes', JSON.stringify(this.likes));
                // 表示の更新
                this.setClassName();
            },
        }
    }
</script>
<style scoped>
    .jsLikeButton.liked {
        color: red;
    }
</style>