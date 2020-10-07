<template>
    <div class="">
        <input type="hidden" :name="name" :value="fieldValue">
        <ul>
            <li v-for="(answer, index) in answers">
                {{ answer.text }} <span v-if="answer.isCorrect">(poprawna)</span>
                <a href="#"
                   @click.prevent="answers.splice(index,1)"
                   class="btn btn-danger btn-sm pull-right">
                    <i class="fa fa-trash"></i>
                </a>
            </li>

        </ul>
        <div v-if="answers.length == 0">Brak odpowiedzi, dodaj jakieś.</div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    Poprawna odpowiedź? 
                    <input type="checkbox" v-model="isCorrect">
                </div>
            </div>
            <input type="text" ref="text" v-model="text" class="form-control">
            <div class="input-group-append">
                <a href="#" class="btn btn-primary" @click.prevent="addItem">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AnswersInputer",

    props: {
        name: {
            type: String,
            required: true
        },
        required: {
            type: Boolean,
            default: true
        }
    },

    data() {
        return {
            answers: [],
            text: '',
            isCorrect: false
        };
    },

    computed: {
        fieldValue() {
            return JSON.stringify(this.answers);
        }
    },

    methods: {
        addItem() {
            this.answers.push({
                text: this.text,
                isCorrect: this.isCorrect
            });

            this.clear();

        },

        clear() {
            this.text = '';
            this.isCorrect = false;
        }
    }
}
</script>

<style scoped>

</style>
