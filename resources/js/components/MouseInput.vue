<template>
    <div class="mouse-input" v-on:mousemove="mouseMove" v-on:click="mouseClick">

    </div>
</template>

<script>
export default {
    name: "MouseInput",

    props: {
        disabled: {
            type: Boolean,
            default: false
        }
    },

    methods: {
        mouseMove(e) {
            if (!this.disabled)
                this.$emit('move', {
                    x: e.offsetX,
                    y: e.offsetY,
                });
        },

        mouseClick(e) {
            if (!this.disabled)
                this.$emit('button', 1);
        }
    }
}
</script>

<style scoped>
.mouse-input {
    position: absolute;
    width: 100%;
    height: 100%;
}
</style>
