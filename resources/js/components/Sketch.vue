<template>
    <div id="main" class="main" :style="'background-image: url(\'' + image + '\' );'">
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
                <a v-for="answer in answers" href="#" class="flex-fill text-center p-3 color-white">{{ answer.text }}</a>
            </div>
        </div>

        <div class="avatar" :style="avatarStyle">
            <img src="images/mushroom.png" :width="this.avatarSize" :height="this.avatarSize"/>
        </div>

        <gamepad-input
            :scale='4'
            v-on:move-x="moveX"
            v-on:move-y="moveY"
            v-on:button="button"></gamepad-input>

        <keyboard-input
            :scale='4'
            v-on:move-x="moveX"
            v-on:move-y="moveY"
            v-on:button="button"
        ></keyboard-input>

        <mouse-input
            :disabled="!inputs.mouse"
            v-on:move="moveMouse"
        ></mouse-input>
    </div>
</template>

<script>
import GamepadInput from "./GamepadInput";
import KeyboardInput from "./KeyboardInput";
import MouseInput from "./MouseInput";

export default {
    name: 'Sketch',

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
        }
    },

    components: {
        MouseInput,
        KeyboardInput,
        GamepadInput
    },

    data() {
        return {
            bgColor: [200, 200, 200],
            width: 800,
            height: 800,
            position: {
                x: 10,
                y: 10,
            },
            fire: 0,
            inputs: {
                mouse: false,
                gamepad: true,
                keyboard: true,
            }
        }
    },

    mounted() {
        this.width = document.getElementById('main').offsetWidth;
    },

    computed: {
        avatarStyle() {
            return 'top: ' + this.position.y + 'px; '
                + 'left: ' + this.position.x + 'px; '
                + 'width: ' + this.avatarSize + 'px;'
                + 'height: ' + this.avatarSize + 'px;';
        }
    },

    methods: {

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
            console.log('button');
            this.fire = 100;
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
        }
    }
}
</script>

<style scoped lang="scss">
.main {
    position: relative;
    height: 800px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;ca

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

    .answers{
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
