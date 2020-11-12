<template>
    <div class="game bg-blue">
        <transition name="fade">
            <text-box v-if="isShowText">
                {{ text }}
            </text-box>
        </transition>
        <mission
            ref="mission"
            :image="missions[$store.state.currentMission].image_url"
            :answers="missions[$store.state.currentMission].answers"
            :avatar="selectedAvatar"
            v-on:success="nextMission"
            v-on:incorrect="incorrect++"
        ></mission>
        <div class="top-control-bar d-flex justify-content-between">
            <div></div>
            <div></div>
            <div></div>
            <sound-control/>
            <avatar-selector
                :avatars="avatars"
                v-on:avatar-change="changeAvatar"
            >
            </avatar-selector>
        </div>
    </div>
</template>

<script>
import TextBox from './TextBox';
import AvatarSelector from "./AvatarSelector";
import SoundControl from "./SoundControl";

export default {
    name: "Game",

    components: {
        TextBox,
        AvatarSelector,
        SoundControl
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
            start: false,
            isShowText: false,
            text: "",
            correct: 0,
            incorrect: 0,
            selectedAvatar: '/images/avatars/mushroom.png',
            sounds: {}
        }
    },

    mounted() {
        this.$store.commit('reset');
        this.startGame();
        this.sounds.win = new Audio('/sounds/victory.wav');
    },

    methods: {
        startGame() {
            this.start = true;
            this.showText(this.missionText(this.$store.state.currentMission + 1));
        },

        nextMission() {
            if (this.winning === true) {
                return;
            }

            this.correct++;
            this.points += 10;

            this.$refs.mission.$refs.avatar.showScoreAnimation();

            if (this.$store.state.currentMission === this.missions.length - 1) {
                this.winning = true;
                this.showText(this.winText(this.points), true);

                if (this.$store.state.sound) {
                    this.sounds.win.play();
                }

                return;
            }

            setTimeout(() => {
                this.startNextMission()
            }, 1000);
        },

        startNextMission() {
            this.showText(this.missionText(this.$store.state.currentMission + 2));
            this.$store.commit('nextMission');
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
        },

        changeAvatar(avatar) {
            this.selectedAvatar = avatar;
        }
    }
}
</script>

<style lang="scss" scoped>
.game {
    position: relative;
    width: 100%;
    height: 100%;

    .top-control-bar {
        pointer-events: none;
        position: absolute;
        z-index: 1100;
        top: 0;
        left: 0;
        right: 0;

        & > * {
            pointer-events: auto;
        }
    }
}

</style>
