<template>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Written Posts </h1>
            <div class="createProduct my-4">
                <a class="btn btn-primary" href="/dashboard/posts/create">Create New Post</a>
            </div>
            <form @submit.prevent="submit" method="POST" enctype="multipart/form-data" id="editPost">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                        <div class="card card-collapsable">
                            <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                               aria-expanded="true" aria-controls="collapseCardExample">
                                Edit : {{ post.title }}
                            </a>
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col">
                                            <label>Title</label>
                                            <input class="form-control" type="text" placeholder="Title"
                                                   v-model="form.title" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col">
                                            <label>Subtitle</label>
                                            <input class="form-control" type="text" placeholder="Subtitle"
                                                   v-model="form.subtitle" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col">
                                            <label>Content</label>
                                            <textarea class="form-control" id="summernote" v-model="form.content" rows="9"
                                                      placeholder="Content.."
                                                      required> {{ post.content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4 card-collapsable">
                            <a class="card-header" href="#collapseCardMeta" data-toggle="collapse" role="button"
                               aria-expanded="true" aria-controls="collapseCardMeta">
                                Meta description
                            </a>
                            <div class="collapse show" id="collapseCardMeta">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label>Meta description</label>
                                        <textarea class="form-control" id="textarea-meta_desc" v-model="form.meta_desc" rows="4"
                                                  placeholder="description.." required>{{post.metaDesc}}</textarea>
                                        <small>A maximum of 160 characters are recommended</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4 card-collapsable">
                            <a class="card-header" href="#collapseCardKeyword" data-toggle="collapse" role="button"
                               aria-expanded="true" aria-controls="collapseCardKeyword">
                                Keywords
                            </a>
                            <div class="collapse show" id="collapseCardKeyword">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label>Target keywords</label>
                                        <input type="text" class="form-control" v-model="form.seo_keywords"
                                               placeholder="keywords..." required
                                                />
                                        <small>Separate keywords with a comma eg 'Best shop, Shoes'</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                        <div class="card card-collapsable">
                            <a class="card-header" href="#collapseCardPublish" data-toggle="collapse" role="button"
                               aria-expanded="true" aria-controls="collapseCardPublish">
                                Publish
                            </a>
                            <div class="collapse show" id="collapseCardPublish">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Post status</label>
                                        <select class="form-control" v-model="form.is_published">
                                            <option value="0">Draft</option>
                                            <option selected value="1">Publish</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-block btn-success" type="submit">Save</button>
                                    <a href="/dashboard/posts"
                                       class="btn btn-block btn-primary">Return</a>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4 card-collapsable">
                            <a class="card-header" href="#collapseCardDate" data-toggle="collapse" role="button"
                               aria-expanded="true" aria-controls="collapseCardDate">
                                Date
                            </a>
                            <div class="collapse show" id="collapseCardDate">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Publish date</label>
                                        <input type="date" class="form-control" v-model="form.posted_at" />
                                    </div>
                                    Posted on: {{post.createdAt}}
                                    Edited on: {{post.updatedAt}}
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4 card-collapsable">
                            <a class="card-header" href="#collapseCardCategory" data-toggle="collapse" role="button"
                               aria-expanded="true" aria-controls="collapseCardCategory">
                                Category
                            </a>
                            <div class="collapse show" id="collapseCardCategory">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="col">
                                            <label>Category</label>
                                            <br />
                                            <span v-for="(category, index) in post.relatedCategories" :key="index">
                                                <input v-model="form.category_id" :data-role-id="category.id" :data-role-slug="category.slug">
                                                <label>{{ category.name }}</label>
                                                <br />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['post'],
    data() {
        return {
            form: {
                messages: {},
                'title': '',
                'subtitle': '',
                'meta_desc': '',
                'seo_keywords': '',
                'content': '',
                'posted_at': '',
                'is_published': '',
                'category_id': [],
            }
        }
    },
    mounted() {
        this.form.title = this.post.title;
        this.form.subtitle = this.post.subtitle;
        this.form.meta_desc = this.post.meta_desc;
        this.form.seo_keywords = this.post.seo_keywords;
        this.form.content = this.post.content;
        this.form.posted_at = this.post.posted_at;
        this.form.category_id = this.post.category_id;
    },
    methods: {
        async submit(){
            await axios.post('/api/posts/update' + this.post.slug,{
                title: this.form.title,
                subtitle: this.form.subtitle,
                meta_desc: this.form.meta_desc,
                seo_keywords: this.form.seo_keywords,
                posted_at: this.form.posted_at,
                is_published: this.form.is_published,
                category_id: this.form.category_id
            }.then(response => {
                this.messages = response.data.data;
            }).catch(error => {
                console.log(error)
            }));
        }
    }
}
</script>
