<template>
    <div class="container">
        <h1>{{ category.name }}</h1>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div v-if="!category.relatedPosts" class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <h2 class="text-dark">There are no blog posts at the moment please check again later.</h2>
                </div>
                <div v-else class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div  v-for="(post, index) in category.relatedPosts" :key="index" class="card mt-4">
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
    </div>
</template>

<script>
export default {
    props: ['category'],
    data() {
        return {
            err_message: "",
            loading: true
        }
    },
    mounted() {
    },
    methods: {}
}
</script>
