<template>
    <div class="suggester">

        <div ref="modal"
             class="modal fade"
             id="staticBackdrop"
             data-backdrop="static"
             tabindex="-1"
             role="dialog"
             aria-labelledby="staticBackdropLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Wyślij nam swoje sugestie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea rows="10" class="form-control" v-model="text"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                        <button type="button" class="btn btn-primary" @click="sendSuggestion">Wyślij</button>
                    </div>
                </div>
            </div>
        </div>

        <button
            type="button"
            data-toggle="modal"
            data-target="#staticBackdrop"
            class="rounded-circle bg-blue text-center">
            <i class="fa fa-lightbulb-o fa-2x color-red"></i>
        </button>
    </div>
</template>

<script>
export default {
    name: "Suggester",

    data() {
        return {
            showBox: true,
            text: '',
        }
    },

    methods: {
        sendSuggestion() {
            axios.post('/suggestions', {
                text: this.text
            }).then(() => {
                this.text = '';
                this.$refs.modal.modal('hide');
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.suggester {
    position: absolute;
    right: 10px;
    bottom: 10px;

    & > button {
        position: absolute;
        right: 10px;
        bottom: 10px;
        width: 50px;
        height: 50px;
        line-height: 50px;
        display: block;

        i {
            line-height: 50px;
        }
    }
}
</style>
