<template>
    <div class="avatar" :style="style">
        <img :src="image" :width="size" :height="size"/>
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

    computed: {
        style() {
            return 'top: ' + this.y + 'px; '
                + 'left: ' + this.x + 'px; '
                + 'width: ' + this.size + 'px;'
                + 'height: ' + this.size + 'px;';
        }
    }
}
</script>

<style scoped>
.avatar {
    pointer-events: none;
}
</style>
