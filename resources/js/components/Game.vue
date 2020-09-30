<template>
    <div class="game">
        <mission
            ref="mission"
            :image="missions[currentMission].image"
            :answers="missions[currentMission].answers"
            avatar="images/mushroom.png"
            v-on:success="nextMission"
        ></mission>
    </div>
</template>

<script>
export default {
    name: "Game",

    props: {
        id: {
            type: Number,
            required: true
        },
        missions: {
            type: Array,
            required: true,
        },
        avatars: {
            type: Array,
            required: true
        },
    },

    data() {
        return {
            points: 0,
            currentMission: 0,
            start: false
        }
    },

    mounted() {
        this.startGame();
    },

    methods: {
        startGame() {
            this.start = true;
        },

        nextMission() {
            this.points += 10;

            if (this.currentMission === this.missions.length - 1) {
                alert('Wygrana!');
                return;
            }

            this.currentMission += 1;
            this.$refs.mission.restart();
        }
    }
}
</script>

<style scoped>
.game {
    position: relative;
    width: 100%;
    height: 100%;
}
</style>
