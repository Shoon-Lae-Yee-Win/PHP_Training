@extends('layout.app')
@section('content')
    <button class="back-btn m-3 "><a href="{{ '/' }}">Back</a></button>
    <div class="container">
        <div class="row">
            @if (session('createSuccess'))
                <div class="col-4 offset-8 mb-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fa-solid fa-check"></i> {{ session('createSuccess') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('updateSuccess'))
                <div class="col-4 offset-8 mb-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fa-solid fa-check"></i> {{ session('updateSuccess') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="card col-md-6 shadow offset-3 my-5 rounded-3 px-5 py-3">
                <h3 class="text-center my-4">Product Form</h3>
                <form action="{{ route('product#create') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="prod_name">Product Name:</label>
                        <input type="text" name="prod_name" id="prod_name"
                            class="form-control
                    @error('prod_name') is-invalid @enderror"
                            value="{{ old('prod_name') }}" placeholder="Enter product name ...">
                        @error('prod_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">Category:</label>
                        <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="">Choose your category</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}" {{ old('category') == $c->id ? 'selected' : '' }}>
                                    {{ $c->cat_name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror" placeholder="Enter price ..."
                            value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description:</label>
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Enter description ...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn"><a href="">Cancel</a></button>
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <a href="{{ route('product#export') }}" class="btn mb-3 export-btn ">Export</a>
            </div>
            <form action="{{route('product#import')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="file" name="product_file" accept=".xlsx,.xls,.csv" required>
                <input type="submit" value="Upload">
            </form>
            @if ($errors->any())
            <ol>
                @foreach ($errors->all() as $error)
                <li class="text-danger">{{$error}}</li>
                @endforeach
            </ol>
            @endif
            <div class="mt-3">
                @if (session('deleteSuccess'))
                    <div class="col-4 offset-8 mb-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fa-regular fa-circle-xmark"></i> {{ session('deleteSuccess') }} </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($products as $product)
                        <tbody>
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category->cat_name }}</td>
                                <td>{{ $product->prod_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->created_at->format('j-F-Y') }}</td>
                                <td>{{ $product->updated_at->format('j-F-Y') }}</td>
                                <td>
                                    <div>
                                        <button class="btn btn-edit">
                                            <a href="{{ route('product#edit', $product->id) }}">Edit</a>
                                        </button>
                                        <button class="btn">
                                            <a href="{{ route('product#delete', $product->id) }}">Delete</a>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                <div class="mt-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
