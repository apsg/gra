<template>
    <div class="avatar-selector">
        <div class="text-right">
            <button class="btn btn-secondary" @click.prevent="showGallery = !showGallery">
                <i class="far fa-smile"></i>
            </button>
        </div>
        <transition name="slide">
            <div class="gallery bg-blue p-2" v-if="showGallery">
                <div v-for="avatar in avatars"
                     @click="select(avatar)"
                     class="avatar-single p-1">
                    <img :src="avatar.image_url">
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: "AvatarSelector",

    props: {
        avatars: {
            type: Array,
            required: true
        }
    },

    data() {
        return {
            showGallery: false
        }
    },

    methods: {
        select(avatar) {
            this.$emit('avatar-change', avatar.image_url);
            this.showGallery = false;
        }
    }
}
</script>

<style lang="scss" scoped>
.avatar-selector {
    .gallery {
        position: absolute;
        top: 50px;
        right: 0;
        max-height: 800px;
        overflow-y: auto;

        .avatar-single {
            cursor: pointer;

            img {
                width: 100px;
                height: 100px;
            }
        }
    }
}
</style>
