<template>
    <div>
        <section class="my-1">
            <div class="container">
                <div class="row">
                    <div v-if="!this.posts" class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <h2 class="text-dark">There are no blog posts at the moment please check again later.</h2>
                    </div>
                    <div class="col-md-10">
                        <h2>Posts</h2>
                        <div class="row">
                            <div v-if="this.posts" v-for="post in posts"
                                 class="mt-4 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <img :src="post.images" class="w-100" alt="">
                                    </div>
                                    <div class="card-body">
                                        <p class="text-dark" v-for="author in post.author">Author: {{ author.name }}</p>
                                        <a class="post-header h4" :href="post.slug">{{ post.title }}</a>
                                        <p class="post-summary">{{ post.metaDesc }}</p>
                                    </div>
                                    <div class="card-footer">
                                    <span v-for="(category, index) in post.relatedCategories" :key="index">
                                        <a :href="category.slug"> {{ category.name }} </a>
                                        <span v-if="index - 1 && post.relatedCategories.length !== 1"> || </span>
                                        </span>
                                    </div>
                                    <a class="btn btn-primary" :href="post.slug">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h2>Categories</h2>
                        <ul class="list-group mt-5">
                            <a :href="category.slug" v-for="category in this.categories"
                               class="list-group-item">{{ category.name }}</a>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

export default {
    data() {
        return {
            posts: {},
            categories: {},
            err_message: "",
            loading: true
        }
    },
    mounted() {
        this.loadPosts();
        this.loadCategories();
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
        },
        async loadCategories() {
            axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data.data;
                })
                .catch(error => console.log(error)
                );
            this.loading = false;
        }
    }
}
</script>
