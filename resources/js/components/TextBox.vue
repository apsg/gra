<template>
    <div class="win d-flex justify-content-center flex-column bg-blue color-red">
        <div class="text-center font-mono">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "TextBox",

    props: ['text']
}
</script>

<style lang="scss" scoped>
.win {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 1000;

    & > div {
        font-size: 40px;
        white-space: pre-line;
    }
}
</style>
