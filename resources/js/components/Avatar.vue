<template>
    <div class="avatar" :style="style">
        <img :src="image" :width="size" :height="size"/>
        <img v-if="showCoin" class="coin" src="/images/coin.gif" :style="coinStyle"/>
    </div>
</template>

<script>
export default {
    name: "Avatar",

    props: {
        size: {
            type: Number,
            default: 150
        },
        x: {
            type: Number,
            default: 0
        },
        y: {
            type: Number,
            default: 0
        },
        image: {
            type: String,
            required: true
        }
    },

    data() {
        return {
            coinOffset: 0,
            showCoin: false,
        }
    },

    computed: {
        style() {
            return 'top: ' + this.y + 'px; '
                + 'left: ' + this.x + 'px; '
                + 'width: ' + this.size + 'px;'
                + 'height: ' + this.size + 'px;';
        },

        coinStyle() {
            return 'left: ' + (this.size / 4) + 'px; '
                + 'top: -' + (this.coinOffset + this.size / 4) + 'px; '
                + 'width: ' + (this.size / 2) + 'px; '
                + 'height: ' + (this.size / 2) + 'px; ';
        }
    },

    methods: {
        showScoreAnimation() {
            return new Promise((resolve, reject) => {
                this.showCoin = true;
                setTimeout(() => {
                    this.coinOffset = 100;
                }, 5);
                setTimeout(() => {
                    this.coinOffset = 0;
                }, 500);
                setTimeout(() => {
                    this.showCoin = false;
                    resolve()
                }, 1000);
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.avatar {
    pointer-events: none;

    .coin {
        width: 50px;
        height: 50px;
        position: absolute;
        bottom: 0;
        top: -25px;

        transition: top 0.5s;
    }
}
</style>
