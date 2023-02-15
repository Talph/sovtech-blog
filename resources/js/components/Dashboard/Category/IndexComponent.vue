<template>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Categories </h1>
            <div class="row">

                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <form method="POST" action="#">
                        <div class="card">
                            <div class="card-header">
                                Create category</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label>Category Name</label>
                                    <input class="form-control" type="text" id="J_name" placeholder="Category Name"
                                           name="category_name" required autofocus>
                                    <small>The name is how it appears on your site.</small>
                                </div>
                                <div class="form-group row">
                                    <label>Slug</label>
                                    <input class="form-control" id="J_slug" type="text" placeholder="category-name" disabled
                                           name="slug" required autofocus>
                                    <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only
                                        letters, numbers, and hyphens.</small>
                                </div>
                                <div class="form-group row">
                                    <label>Description</label>
                                    <textarea class="form-control" id="summernote" name="category_description" rows="9"
                                              required> </textarea>
                                    <small>The description is not prominent by default; however, some themes may show it.</small>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">Save Category</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            Categories</div>
                        <div class="card-body">
                            <br>
                            <table class="table table-responsive-sm table-bordered table-hover" id="dataTable" width="100%"
                                   cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Post count</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(category, index) in categories" :key="index">
                                    <td>{{ category.name }}</td>
                                    <td>{{ category.description }}</td>
                                    <td>{{ category.slug }}</td>
                                    <td>
                                        {{category.numberOfPosts}}
                                    </td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkRevenue"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                               aria-label="Revenue action button">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                 aria-labelledby="dropdownMenuLinkRevenue">
                                                <div class="dropdown-header">Actions:</div>
                                                <a :href="'/dashboard/categories/edit/' + category.id" class="btn dropdown-item">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <form action="#" method="POST">
                                                    <button class="btn dropdown-item text-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['auth'],
    data() {
        return {
            categories: {},
            err_message: "",
            loading: true
        }
    },
    mounted() {
        this.loadCategories();
    },
    methods: {
        loadCategories() {
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
