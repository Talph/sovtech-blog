<template>
    <banner-component></banner-component>
    <div>
        <section class="my-1">
            <div class="container">
                <div class="row">

                    <div v-if="!this.posts" class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
<!--                        {{ posts.err_message }}-->
                        <h2 class="text-dark">There are no blog posts at the moment please check again later.</h2>
                    </div>
                        <div v-else v-for="post in posts" class="mt-4 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="card">
                            <div class="card-header">
                                <img :src="post.images" class="w-100" alt="">
                            </div>
                            <div class="card-body">
                                <p class="text-dark" v-for="author in post.author">Author:  {{ author.name }}</p>
                                <a class="post-header h4" :href="post.slug">{{ post.title }}</a>
                                <p class="post-summary">{{ post.metaDesc }}</p>
                            </div>
                            <div v-for="category in post.relatedCategories" class="card-footer">
                                <a :href="category.slug"> {{ category.name }}</a>
                            </div>
                                <a class="btn btn-primary" :href="post.slug">Read more →</a>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import BannerComponent from "./Partials/bannerComponent.vue";

export default {
    components: {BannerComponent},
    data() {
        return {
            posts: {},
            err_message: "",
            loading: true
        }
    },
    mounted() {
        this.loadPosts();
    },
    methods: {
        loadPosts() {
            axios.get('/api/posts')
                .then(response => {
                    this.posts = response.data.data;
                })
                .catch(error => console.log(error)
                );
            this.loading = false;
        }
    }
}
</script>
