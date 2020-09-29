<template>

</template>

<script>
export default {
    name: "KeyboardInput",

    props: {
        scale: {
            type: Number,
            default: 2
        }
    },

    mounted() {
        document.addEventListener('keydown', this.keyboardListener)
    },

    methods: {
        keyboardListener(e) {
            if (e.key == 'ArrowDown') {
                this.$emit('move-y', 1 * this.scale)
            } else if (e.key == 'ArrowUp') {
                this.$emit('move-y', -1 * this.scale)
            }
            if (e.key == 'ArrowLeft') {
                this.$emit('move-x', -1 * this.scale)
            }
            if (e.key == 'ArrowRight') {
                this.$emit('move-x', 1 * this.scale)
            } else {
                console.log('inpput-button', e.key)
                this.$emit('button', 1);
            }
        }
    }
}
</script>

<style scoped>

</style>
