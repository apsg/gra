<template>
    <div>
        <button
            class="btn"
            :class="$store.state.sound ? 'btn-primary' : 'btn-secondary'"
            @click="toggle"
        >
            <i class="fa" :class="$store.state.sound ? 'fa-volume-up' : 'fa-volume-mute'"></i>
        </button>
    </div>
</template>

<script>
export default {
    name: "SoundControl",

    methods: {
        toggle() {
            this.$store.commit('toggleSound');
        }
    }
}
</script>

<style scoped>

</style>
