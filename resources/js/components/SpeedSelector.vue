<template>
    <div class="speed-selector">
        <button class="btn btn-sm btn-outline-secondary" @click.prevent="speedMinus"><i class="fa fa-minus"></i>
        </button>
        <speed-indicator :speed="currentSpeed"></speed-indicator>
        <button class="btn btn-sm btn-outline-secondary" @click.prevent="speedPlus"><i class="fa fa-plus"></i>
        </button>
    </div>
</template>

<script>
import SpeedIndicator from "./SpeedIndicator";

export default {
    name: "SpeedSelector",

    components: {
        SpeedIndicator
    },

    props: {
        min: {
            type: Number,
            default: 1
        },
        max: {
            type: Number,
            default: 5
        },
        speed: {
            type: Number,
            required: true
        }
    },

    data() {
        return {
            currentSpeed: 3
        }
    },

    mounted() {
        this.currentSpeed = this.speed;
    },

    methods: {
        speedMinus() {
            if (this.currentSpeed > this.min) {
                this.currentSpeed--;
                this.$emit('change', this.currentSpeed)
            }
        },

        speedPlus() {
            if (this.currentSpeed < this.max) {
                this.currentSpeed++;
                this.$emit('change', this.currentSpeed)
            }
        }
    }
}
</script>

<style scoped>

</style>
