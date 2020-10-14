<template>
    <div id="main" class="main" :style="'background-image: url(\'' + image + '\' ); height: 100%;' ">
        <div class="navigation d-flex justify-content-between">
            <div class="inputs-selector btn-group">
                <button class="btn"
                        :class="inputs.keyboard ? 'btn-primary' : 'btn-secondary'"
                        @click="inputs.keyboard = !inputs.keyboard"
                >
                    <i class="fa fa-keyboard-o"></i>
                </button>
                <button class="btn"
                        :class="inputs.mouse ? 'btn-primary' : 'btn-secondary'"
                        @click="inputs.mouse = !inputs.mouse"
                >
                    <i class="fa fa-mouse-pointer"></i>
                </button>
                <button class="btn"
                        :class="inputs.gamepad ? 'btn-primary' : 'btn-secondary'"
                        @click="inputs.gamepad = !inputs.gamepad"
                >
                    <i class="fa fa-gamepad"></i>
                </button>
            </div>
            <div class="speed-selector">
                <button class="btn btn-outline-secondary"><i class="fa fa-minus"></i></button>
                <speed-indicator :speed="speed"></speed-indicator>
                <button class="btn btn-outline-secondary"><i class="fa fa-plus"></i></button>
            </div>
            <div class="avatar-selector">
                <button class="btn btn-secondary">
                    <i class="fa fa-smile-o"></i>
                </button>
            </div>
        </div>
        <div class="elements">
            {{ this.position.x }} - {{ this.width }} |
            {{ this.position.y }} - {{ this.height }} |
            Avatar Size: {{ this.avatarSize }}
            <div class="answers d-flex">

            </div>
        </div>

        <answer v-for="(answer, id) in answers"
                ref="answers"
                v-bind:key="id"
                :maxWidth="width"
                :maxHeight="height"
                :text="answer.text"
                :correct="!!answer.is_correct"
                :stop="stop"
                :speed="speed"
                v-on:move="checkAnswersCollisions(id)"
        ></answer>

        <avatar
            ref="avatar"
            id="avatar"
            :size="avatarSize"
            :x="this.position.x"
            :y="this.position.y"
            :image="avatar"
        ></avatar>

        <gamepad-input
            :scale='scale'
            :disabled="!inputs.gamepad"
            v-on:move-x="moveX"
            v-on:move-y="moveY"
            v-on:button="button"></gamepad-input>

        <keyboard-input
            :disabled="!inputs.keyboard"
            :scale='scale'
            v-on:move-x="moveX"
            v-on:move-y="moveY"
            v-on:button="button"
        ></keyboard-input>

        <mouse-input
            :disabled="!inputs.mouse"
            v-on:move="moveMouse"
            v-on:button="button"
        ></mouse-input>
    </div>
</template>

<script>
import GamepadInput from "./GamepadInput";
import KeyboardInput from "./KeyboardInput";
import MouseInput from "./MouseInput";
import Avatar from "./Avatar";
import Answer from "./Answer";
import SpeedIndicator from "./SpeedIndicator";
import {BUTTON_FIRE} from "../constants";
import {collision} from "../helpers";

export default {
    name: 'Mission',

    props: {
        avatarSize: {
            type: Number,
            default: 100
        },
        image: {
            type: String,
            required: true
        },
        answers: {
            type: Array,
            default: []
        },
        avatar: {
            type: String,
            required: true
        }
    },

    components: {
        Answer,
        Avatar,
        MouseInput,
        KeyboardInput,
        GamepadInput,
        SpeedIndicator
    },

    data() {
        return {
            scale: 4,
            width: 800,
            height: 800,
            position: {
                x: 10,
                y: 10,
            },
            inputs: {
                mouse: false,
                gamepad: true,
                keyboard: true,
            },
            stop: false,
            speed: 3,
        }
    },

    mounted() {
        setTimeout(() => {
            this.width = document.getElementById('main').offsetWidth;
            this.height = document.getElementById('main').offsetHeight;
        }, 500);
        this.scale = Math.ceil(this.width / 100);

        this.restart();
    },

    methods: {

        restart() {
            for (let answer of this.$refs.answers)
                answer.restart();

            this.stop = false;
        },

        moveX(e) {
            this.position.x += e;
            this.normalizePosition();
        },

        moveY(e) {
            this.position.y += e;
            this.normalizePosition();
        },

        moveMouse(e) {
            this.position.x = e.x - this.avatarSize / 2;
            this.position.y = e.y - this.avatarSize / 2;
            this.normalizePosition();
        },

        button(e) {
            console.log('button', e);

            if (e == BUTTON_FIRE)
                this.checkSuccess();
        },

        normalizePosition() {
            if (this.position.x < 0)
                this.position.x = 0;

            if (this.position.y < 0)
                this.position.y = 0;

            if ((this.position.x + this.avatarSize) > this.width)
                this.position.x = this.width - this.avatarSize;

            if ((this.position.y + this.avatarSize) > this.height)
                this.position.y = this.height - this.avatarSize;
        },

        checkSuccess() {
            const avatarRect = this.$refs.avatar.$el.getBoundingClientRect();

            for (let answer of this.$refs.answers) {
                // We do not care for incorrect objects
                if (!answer.correct)
                    continue;

                if (answer.checkCollide(avatarRect)) {
                    console.log('trafiony');
                    this.success();
                }
            }
        },

        success() {
            this.stop = true;
            this.$emit('success', 1);
        },

        checkAnswersCollisions(id) {
            const answerCount = this.$refs.answers.length;
            let i;

            for (i = id + 1; i < answerCount; i++) {
                let collisionResult = collision(
                    this.$refs.answers[id].$el.getBoundingClientRect(),
                    this.$refs.answers[i].$el.getBoundingClientRect()
                );

                if (collisionResult !== false) {
                    this.$refs.answers[id].avoidCollision(collisionResult);
                    this.$refs.answers[i].avoidCollision(collisionResult);
                }
            }
        }
    }
}
</script>

<style scoped lang="scss">
.main {
    position: relative;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    overflow: hidden;

    .elements {
        position: absolute;
        left: 0;
        bottom: 0;
        right: 0;

        .answers {
            width: 100%;

            & * {
                background-color: rgba(255, 0, 0, 0.3);
            }
        }
    }

    .answers {
        min-height: 50px;
    }

    .navigation {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100;
    }

    .canvas {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
    }

    .avatar {
        position: absolute;
    }
}
</style>
