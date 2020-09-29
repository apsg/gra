<template>
    <div class="mouse-input" v-on:mousemove="mouseMove" v-on:click="mouseClick">

    </div>
</template>

<script>
import {BUTTON_FIRE, EVENT_BUTTON, EVENT_MOVE} from "../constants";

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
            if (this.disabled)
                return;

            this.$emit(EVENT_MOVE, {
                x: e.offsetX,
                y: e.offsetY,
            });
        },

        mouseClick(e) {
            if (this.disabled)
                return;

            this.$emit(EVENT_BUTTON, BUTTON_FIRE);
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
