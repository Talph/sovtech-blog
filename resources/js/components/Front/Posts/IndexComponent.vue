<template>
    <section class="my-1">
        <div class="container">
            <div class="row">

                <div v-if="!this.posts" class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    {{ posts.err_message }}
                    <h2 class="text-dark">There are no blog posts at the moment please check again later.</h2>
                </div>
                <div v-else class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div v-for="post in posts" class="card mt-4">
                        <div class="card-header">
                            <img :src="post.slug" width="258"
                                 height="258" alt="">
                        </div>
                        <div class="card-body">
                            <h3><a :href="post.slug">{{ post.title }}</a></h3>
                            {{ post.meta_desc }}
                        </div>
                        <div v-for="category in posts.relatedCategories" class="card-footer">
                            <a :href="category.slug"> {{ category.category_name }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>

export default {
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
                    this.posts = response.data;
                })
                .catch(error => console.log(error)
                );
            this.loading = false;
        }
    }
}

</script>
