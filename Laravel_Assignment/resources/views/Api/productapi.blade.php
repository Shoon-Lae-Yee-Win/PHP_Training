@extends('layout.app')
@section('content')
    {{-- add modal --}}
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="productModalLabel">Product Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="saveform_errList"></ul>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="prod_name">Product Name:</label>
                            <input type="text" name="prod_name" id="prod_name" class="form-control"
                                placeholder="Enter product name ...">
                            <span id="name_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category">Category:</label>
                            <select name="category" id="category" class="form-control">
                            </select>
                            <span id="category_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="price" class="form-control"
                                placeholder="Enter price ...">
                            <span id="price_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" rows="3" id="description" class="form-control" placeholder="Enter description ..."></textarea>
                            <span id="description_err"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_product">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end add model}}
    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Product Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="saveform_messageList"></ul>
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="" id="prod_id">
                        <div class="form-group mb-3">
                            <label for="prod_name">Product Name:</label>
                            <input type="text" name="prod_name" id="edit_product" class="form-control"
                                placeholder="Enter product name ...">
                            <span id="editName_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category">Category:</label>
                            <select name="category" id="edit_category" class="form-control">
                            </select>
                            <span id="editCategory_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="edit_price" class="form-control"
                                placeholder="Enter price ...">
                            <span id="editPrice_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" rows="3" id="edit_description" class="form-control"
                                placeholder="Enter description ..."></textarea>
                            <span id="editDescription_err"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product">Update changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End edit Model --}}
    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete product data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to delete product?</h4>
                    <input type="hidden" id="delete_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_product">Yes,delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}
    {{-- table --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Data
                            <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                class="btn btn-primary float-end btn-sm">Add Product</a>
                        </h4>
                    </div>
                    <div id="success_message" class="col-md-3 m-3"></div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- table --}}
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- Jquery CDN --}}
    <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            showproduct();

            function showproduct() {
                $.ajax({
                    type: "GET",
                    url: "/api/product/show",
                    dataType: "json",
                    success: function(response) {
                        $('tbody').html("");
                        $.each(response.data.products, function(key, item) {
                            $('tbody').append('<tr>\
                                                                    <td>' + item.id + '</td>\
                                                                    <td>' + item.prod_name + '</td>\
                                                                    <td>' + item.category.cat_name + '</td>\
                                                                    <td>' + item.price + '</td>\
                                                                    <td>' + item.description + '</td>\
                                                                    <td><button type="button" value="' + item.id + '" class="btn btn-edit editbtn ">Edit</button>\
                                                                        <button type="button" value="' + item.id + '" class="btn btn-danger deletebtn ">Delete</button></td>\
                                                                    </td>\
                                                                </tr>');
                        });
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "/api/product/show",
                    dataType: "json",
                    success: function(response) {
                        $('select').empty();
                        $('select').append(
                            '<option value="" >Choose Your Category</option>'
                        );
                        $.each(response.data.categories, function(key, item) {
                            $('select').append(
                                '<option value="' + item.id + '">' + item.cat_name +
                                '</option>'
                            );
                        });
                    }
                });
            }
            $(document).on('click', '.add_product', function(e) {
                e.preventDefault();
                var data = {
                    'prod_name': $('#prod_name').val(),
                    'category': $('#category').val(),
                    'price': $('#price').val(),
                    'description': $('#description').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/api/product",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            if (response.errors.prod_name) {
                                $('#name_err').html('<p class="text-danger">' + response.errors
                                    .prod_name + '</p>');
                            } else {
                                $('#name_err').addClass('d-none');
                            }
                            if (response.errors.category) {
                                $('#category_err').html('<p class="text-danger">' + response
                                    .errors.category + '</p>');
                            } else {
                                $('#category_err').addClass('d-none');
                            }
                            if (response.errors.price) {
                                $('#price_err').html('<p class="text-danger">' + response.errors
                                    .price + '</p>');
                            } else {
                                $('#price_err').addClass('d-none');
                            }
                            if (response.errors.description) {
                                $('#description_err').html('<p class="text-danger">' + response
                                    .errors.description + '</p>');
                            } else {
                                $('#description_err').addClass('d-none');
                            }
                        } else {
                            $('#saveform_errList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#productModal').find('input').val('');
                            $('#productModal').find('textarea').val('');
                            $('#productModal').find('select').val('');
                            $('.add_product').text('Save');
                            $('#productModal').modal('hide');
                            showproduct();
                        }
                    }
                });
            });
            $(document).on('click', '.editbtn', function(e) {
                e.preventDefault();
                var prod_id = $(this).val();
                $('#editModal').modal('show');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "/api/product/edit/" + prod_id,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            $('#edit_product').val(response.data.product.prod_name);
                            $('#edit_category').val(response.data.product.cat_id);
                            $('#edit_price').val(response.data.product.price);
                            $('#edit_description').val(response.data.product.description);
                            $('#prod_id').val(prod_id);
                        }
                    }
                });
            });
            $(document).on('click', '.update_product', function(e) {
                e.preventDefault();
                var prod_id = $('#prod_id').val();
                var data = {
                    'prod_name': $('#edit_product').val(),
                    'category': $('#edit_category').val(),
                    'price': $('#edit_price').val(),
                    'description': $('#edit_description').val(),
                    'id': $('#prod_id').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/api/product/update/" + prod_id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            if (response.errors.prod_name) {
                                $('#editName_err').html('<p class="text-danger">' + response
                                    .errors.prod_name + '</p>');
                            } else {
                                $('#editName_err').addClass('d-none');
                            }
                            if (response.errors.category) {
                                $('#editCategory_err').html('<p class="text-danger">' + response
                                    .errors.category + '</p>');
                            } else {
                                $('#editCategory_err').addClass('d-none');
                            }
                            if (response.errors.price) {
                                $('#editPrice_err').html('<p class="text-danger">' + response
                                    .errors.price + '</p>');
                            } else {
                                $('#editPrice_err').addClass('d-none');
                            }
                            if (response.errors.description) {
                                $('#editDescription_err').html('<p class="text-danger">' +
                                    response.errors.description + '</p>');
                            } else {
                                $('#editDescription_err').addClass('d-none');
                            }
                        } else {
                            $('#saveform_errList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('#editModal').find('textarea').val('');
                            $('#editModal').find('select').val('');
                            $('.update_product').text('Save');
                            $('#editModal').modal('hide');
                            showproduct();
                        }
                    }
                });
            });
            $(document).on('click', '.deletebtn', function() {
                var prod_id = $(this).val();
                $('#deleteModal').modal('show');
                $('#delete_id').val(prod_id);
            });
            $(document).on('click', '.delete_product', function(e) {
                e.preventDefault();

                $(this).text('Deleting..');
                var id = $('#delete_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/api/product/delete/" + id,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_product').text('Yes Delete');
                            $('#deleteModal').modal('hide');
                            showproduct();
                        }
                    }
                });
            });
        });
    </script>
@endsection
