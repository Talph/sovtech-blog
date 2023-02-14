<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ post.title }}</h1>

                        <p v-for="author in post.author">Author: <span class="text-primary"> {{ author.name }} </span>
                            || Posted At: <span class="text-primary">{{ post.postedAt }}</span></p>
                    </div>
                    <div class="card-body">
                        <p class="text-center">
                            <img :src="post.images" :alt="post.title" class="w-100">
                        </p>
                        <h2>{{ post.subtitle }}</h2>
                        <p>
                            {{ post.content }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <div v-for="category in post.relatedCategories">
                            <p>{{category.name}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['post'],
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
