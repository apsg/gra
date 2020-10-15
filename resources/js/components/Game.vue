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
            :avatar="selectedAvatar"
            v-on:success="nextMission"
            v-on:incorrect="incorrect++"
        ></mission>
        <avatar-selector
            :avatars="avatars"
            v-on:avatar-change="changeAvatar"
        >
        </avatar-selector>
    </div>
</template>

<script>
import TextBox from './TextBox';
import AvatarSelector from "./AvatarSelector";

export default {
    name: "Game",

    components: {
        TextBox,
        AvatarSelector
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
            selectedAvatar: '/images/avatars/mushroom.png'
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

            this.$refs.mission.$refs.avatar.showScoreAnimation();

            if (this.currentMission === this.missions.length - 1) {
                this.winning = true;
                this.showText(this.winText(this.points), true);
                return;
            }

            this.startNextMission();

            // setTimeout(() => {
            //     this.startNextMission()
            // }, 1000);
        },

        startNextMission() {
            this.showText(this.missionText(this.currentMission + 1));
            this.currentMission += 1;
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

<style scoped>
.game {
    position: relative;
    width: 100%;
    height: 100%;
}

</style>
