<template>
    <div
        class="answer text-center font-mono bg-blue color-lblue p-3"
        :style="answerStyle">
        {{ text }}
    </div>
</template>

<script>
import {ANSWER_MOVE_TICK, ESCAPE_SPEED, EVENT_MOVE} from "../constants";

export default {
    name: "Answer",

    props: {
        text: {
            type: String,
            required: true,
        },
        correct: {
            type: Boolean,
            default: false
        },
        maxWidth: {
            type: Number,
            default: 800
        },
        maxHeight: {
            type: Number,
            default: 800
        },
        speed: {
            type: Number,
            default: 5
        },
    },

    data() {
        return {
            x: 0,
            y: 0,
            dx: 1,
            dy: 1,
            clicked: false
        }
    },

    mounted() {
        this.restart();
        setTimeout(this.move, ANSWER_MOVE_TICK);
    },

    computed: {
        answerStyle() {
            return 'width: ' + (this.maxWidth / 4) + 'px;'
                + 'top: ' + this.y + 'px; '
                + 'left: ' + this.x + 'px; ';
        }
    },

    methods: {

        restart() {
            this.x = Math.random() * this.maxWidth;
            this.y = Math.random() * this.maxHeight;
            this.dx = Math.random() > 0.5 ? -1 : 1;
            this.dy = Math.random() > 0.5 ? -1 : 1;
            this.clicked = false;
        },

        checkCollide(object) {
            if (object.right < this.$el.getBoundingClientRect().left)
                return false;

            if (object.left > this.$el.getBoundingClientRect().right)
                return false;

            if (object.bottom < this.$el.getBoundingClientRect().top)
                return false;

            if (object.top > this.$el.getBoundingClientRect().bottom)
                return false;

            return true;
        },

        move() {
            if (!this.$store.state.stop) {
                this.x = (this.x + this.dx * this.speed * Math.random());
                this.y = (this.y + this.dy * this.speed * Math.random());

                this.normalize();

                this.$emit(EVENT_MOVE, {
                    x: this.x,
                    y: this.y,
                });
            }

            setTimeout(this.move, ANSWER_MOVE_TICK);
        },

        normalize() {
            if (this.x > this.maxWidth - this.$el.getBoundingClientRect().width) {
                this.x = this.maxWidth - this.$el.getBoundingClientRect().width;
                this.dx = -this.dx;
            }

            if (this.x < 0) {
                this.x = 0;
                this.dx = -this.dx;
            }

            if (this.y > this.maxHeight - this.$el.getBoundingClientRect().width) {
                this.y = this.maxHeight - this.$el.getBoundingClientRect().width;
                this.dy = -this.dy;
            }

            if (this.y < 0) {
                this.y = 0;
                this.dy = -this.dy;
            }
        },

        avoidCollision(collisionResult) {
            // Boxes overlap. Generate new position.
            if (collisionResult.x === -1 && collisionResult.y === -1)
                this.restart();

            if (collisionResult.x !== 0) {
                this.dx = collisionResult.x * this.dx;
                this.x = this.x + this.dx * this.speed * ESCAPE_SPEED;
            }

            if (collisionResult.y !== 0) {
                this.dy = collisionResult.y * this.dy;
                this.y = this.y + this.dy * this.speed * ESCAPE_SPEED;
            }
        }
    }
}
</script>

<style scoped>
.answer {
    position: absolute;
    font-size: 20px;
    transition: 0.2s;
}
</style>
