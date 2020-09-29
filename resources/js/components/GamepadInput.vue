<template>

</template>

<script>
import {BUTTON_FIRE, BUTTON_SECOND, EVENT_BUTTON, EVENT_MOVE_X, EVENT_MOVE_Y, GAMEPAD} from "../constants";

export default {
    name: "GamepadInput",

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
        this.gamepad = new Gamepad();

        this.gamepad.bind(Gamepad.Event.BUTTON_DOWN, this.button);

        this.gamepad.bind(Gamepad.Event.BUTTON_UP, function (e) {
            console.log('up');
            console.log(e);
        });

        this.gamepad.bind(Gamepad.Event.AXIS_CHANGED, this.axis);

        if (!this.gamepad.init()) {
            // Your browser does not support gamepads, get the latest Google Chrome or Firefox
        }
    },

    methods: {

        button(e) {
            if (this.disabled)
                return;
            // console.log('down');
            console.log(e);

            if (GAMEPAD.fireButtons.includes(e.control))
                this.$emit(EVENT_BUTTON, BUTTON_FIRE);
            else
                this.$emit(EVENT_BUTTON, BUTTON_SECOND);
        },

        axis(e) {
            if (this.disabled)
                return;

            if ((e.axis == 'LEFT_STICK_X') && Math.abs(e.value) > 0.1) {
                // console.log('x', e.value, e.axis);
                this.$emit(EVENT_MOVE_X, this.scale * e.value);
            }
            if ((e.axis == 'LEFT_STICK_Y') && Math.abs(e.value) > 0.1) {
                // console.log('y', e.value, e.axis);
                this.$emit(EVENT_MOVE_Y, this.scale * e.value)
            }
        }
    }
}
</script>

<style scoped>

</style>
