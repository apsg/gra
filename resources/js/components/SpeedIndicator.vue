<template>
    <div class="d-inline-block speed-indicator border rounded">
        <i class="fa fa-bolt fa-2x"></i>
        <i class="fa fa-bolt fa-2x"></i>
        <i class="fa fa-bolt fa-2x"></i>
        <i class="fa fa-bolt fa-2x"></i>
        <i class="fa fa-bolt fa-2x"></i>
    </div>
</template>

<script>
export default {
    name: "SpeedIndicator",

    props: ['speed']
}
</script>

<style lang="scss" scoped>
.speed-indicator{
    color: white;
}
</style>
