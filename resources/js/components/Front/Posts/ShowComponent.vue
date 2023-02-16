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
                                   <span v-for="(category, index) in post.relatedCategories" :key="index">
                                        <a :href="category.slug"> {{ category.name }} </a>
                                        <span v-if="index - 1 && post.relatedCategories.length !== 1"> || </span>
                                        </span>
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
</template>

<script>
export default {
    props: ['post'],
    data() {
        return {
            categories: {},
            err_message: "",
            loading: true
        }
    },
    mounted() {
        this.loadCategories()
    },
    methods: {
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
