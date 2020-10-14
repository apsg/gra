<template>
    <div class="d-inline-block speed-indicator color-red">
        <i class="fa" :class="getClass(1)"></i>
        <i class="fa" :class="getClass(2)"></i>
        <i class="fa" :class="getClass(3)"></i>
        <i class="fa" :class="getClass(4)"></i>
        <i class="fa" :class="getClass(5)"></i>
    </div>
</template>

<script>
export default {
    name: "SpeedIndicator",

    props: ['speed'],

    methods: {
        getClass(id) {
            if (id <= this.speed)
                return 'fa-star';

            return 'fa-star-o';
        }
    }
}
</script>

<style lang="scss" scoped>
.speed-indicator {
    font-size: 20px;
    line-height: 1;
    height: 100%;
}
</style>
