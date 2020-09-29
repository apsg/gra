<template>

</template>

<script>
export default {
    name: "GamepadInput",

    props: {
        scale: {
            type: Number,
            default: 2
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
            // console.log('down');
            // console.log(e);

            this.$emit('button', 1);
        },

        axis(e) {
            if ((e.axis == 'LEFT_STICK_X') && Math.abs(e.value) > 0.1) {
                // console.log('x', e.value, e.axis);
                this.$emit('move-x', this.scale * e.value);
            }
            if ((e.axis == 'LEFT_STICK_Y') && Math.abs(e.value) > 0.1) {
                // console.log('y', e.value, e.axis);
                this.$emit('move-y', this.scale * e.value)
            }
        }
    }
}
</script>

<style scoped>

</style>
