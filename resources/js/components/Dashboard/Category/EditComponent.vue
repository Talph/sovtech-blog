<template>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Edit Category </h1>
            <div class="createProduct my-4">
                <a class="btn btn-primary" href=/dashboard/categories/create>Create New Category</a>
            </div>
            <form method="POST" id="categoryEdit">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                Edit : {{ category.name }}
                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col">
                                        <label>Category Name</label>
                                        <input class="form-control" type="text"
                                               placeholder="Name"
                                               name="category_name" :value="category.name" required
                                               autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label>Subtitle</label>
                                        <input class="form-control" id="J_slug" type="text"
                                               placeholder="category-slug" name="slug"
                                               :value="category.slug" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label>Description</label>
                                        <textarea class="form-control" id="textarea-input" name="category_description"
                                                  rows="9" placeholder="Description..."
                                                  required> {{ category.description }}</textarea>
                                    </div>
                                </div>

                                <button class="btn btn-block btn-success" type="submit">Update Category
                                </button>

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
    props: ['category'],
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
