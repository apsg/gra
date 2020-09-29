<template>

</template>

<script>

import {BUTTON_FIRE, BUTTON_SECOND, EVENT_BUTTON, EVENT_MOVE_X, EVENT_MOVE_Y, KEYBOARD} from "../constants";

export default {
    name: "KeyboardInput",

    props: {
        scale: {
            type: Number,
            default: 2
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },

    mounted() {
        document.addEventListener('keydown', this.keyboardListener)
    },

    methods: {
        keyboardListener(e) {

            if (this.disabled)
                return;

            if (e.key == 'ArrowDown') {
                this.$emit(EVENT_MOVE_Y, 1 * this.scale);
                return;
            }

            if (e.key == 'ArrowUp') {
                this.$emit(EVENT_MOVE_Y, -1 * this.scale);
                return;
            }
            if (e.key == 'ArrowLeft') {
                this.$emit(EVENT_MOVE_X, -1 * this.scale);
                return;
            }
            if (e.key == 'ArrowRight') {
                this.$emit(EVENT_MOVE_X, 1 * this.scale)
                return;
            }

            if (KEYBOARD.fireButtons.includes(e.code)) {
                this.$emit(EVENT_BUTTON, BUTTON_FIRE);
                return;
            }

            this.$emit(EVENT_BUTTON, BUTTON_SECOND);
        }
    }
}
</script>

<style scoped>

</style>
