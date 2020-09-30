<template>
    <div
        ref="answer"
        class="answer text-center font-mono bg-blue color-red p-3"
        :style="answerStyle">
        {{ text }}
    </div>
</template>

<script>
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
        }
    },

    data() {
        return {
            x: 0,
            y: 0,
            dx: 1,
            dy: 1,
        }
    },

    mounted() {
        this.x = Math.random() * this.maxWidth;
        this.y = Math.random() * this.maxHeight;
        this.dx = Math.random() > 0.5 ? -1 : 1;
        this.dy = Math.random() > 0.5 ? -1 : 1;

        setTimeout(this.move, 300);
    },

    computed: {
        answerStyle() {
            return 'width: ' + (this.maxWidth / 4) + 'px;'
                + 'top: ' + this.y + 'px; '
                + 'left: ' + this.x + 'px; ';
        },

        rect() {
            return this.$refs.answer.getBoundingClientRect();
        }
    },

    methods: {

        checkCollide(object) {
            if (object.right < this.rect.left)
                return false;

            if (object.left > this.rect.right)
                return false;

            if (object.bottom < this.rect.top)
                return false;

            if (object.top > this.rect.bottom)
                return false;

            return true;
        },

        move() {
            this.x = Math.floor(this.x + this.dx * this.speed * Math.random());
            this.y = Math.floor(this.y + this.dy * this.speed * Math.random());

            this.normalize();

            setTimeout(this.move, 300);
        },

        normalize() {
            if (this.x > this.maxWidth - this.rect.width) {
                this.x = this.maxWidth - this.rect.width;
                this.dx = -this.dx;
            }

            if (this.x < 0) {
                this.x = 0;
                this.dx = -this.dx;
            }

            if (this.y > this.maxHeight - this.rect.width) {
                this.y = this.maxHeight - this.rect.width;
                this.dy = -this.dy;
            }

            if (this.y < 0) {
                this.y = 0;
                this.dy = -this.dy;
            }
        }

    }
}
</script>

<style scoped>
.answer {
    position: absolute;
    font-size: 20px;
}
</style>
