<template>
    <div class="game bg-blue">
        <transition name="fade">
            <text-box v-if="isShowText">
                {{ text }}
            </text-box>
        </transition>
        <mission
            ref="mission"
            :image="missions[currentMission].image_url"
            :answers="missions[currentMission].answers"
            avatar="/images/mushroom.png"
            v-on:success="nextMission"
            v-on:incorrect="incorrect++"
        ></mission>
    </div>
</template>

<script>
import TextBox from './TextBox';

export default {
    name: "Game",

    components: {
        TextBox
    },

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
            start: false,
            isShowText: false,
            text: "",
            correct: 0,
            incorrect: 0,
        }
    },

    mounted() {
        this.startGame();
    },

    methods: {
        startGame() {
            this.start = true;
            this.showText(this.missionText(this.currentMission + 1));
        },

        nextMission() {
            if (this.winning === true) {
                return;
            }

            this.correct++;
            this.points += 10;

            if (this.currentMission === this.missions.length - 1) {
                this.winning = true;
                this.showText(this.winText(this.points), true);
                return;
            }

            this.currentMission += 1;
            this.showText(this.missionText(this.currentMission + 1));
            this.$refs.mission.restart();
        },

        showText(text, dontHide = false) {
            this.text = text;
            this.isShowText = true;

            if (!dontHide)
                setTimeout(this.hideText, 2000);
        },

        hideText() {
            this.isShowText = false;
        },

        missionText(mission) {
            return 'Misja: ' + mission;
        },

        winText(points) {
            return 'Wygrana! \n Zdobyto: ' + points + ' pkt.'
                + '\n Poprawnych odpowiedzi: ' + this.correct
                + '\n Błędnych odpowiedzi: ' + this.incorrect;
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
