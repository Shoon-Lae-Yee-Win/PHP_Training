@extends('layout.app')
@section('content')
    <h1 class="head-title">Cheese & Bite</h1>
    <h2 class="sub-title"><i class="fa-solid fa-cake-candles"></i> Cakes And Drinks Shop <i class="fa-solid fa-mug-hot"></i>
    </h2>
    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ol>
    @endif
    <div class="info-blk mt-3">
        <div class="import-form">
            <form action="{{ route('product#import') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="file" name="product_file" accept=".xlsx,.xls,.csv" required><br><br>
                <div class="btn-blk">
                    <input type="submit" value="Upload" class="upload-btn">
                    <a href="{{ route('product#export') }}" class="btn export-btn">Export</a>
                </div>
            </form>
        </div>
        <div class="btn-sec">
            <button class="add-btn">
                <a href="{{ '/list' }}"><i class="fa-solid fa-circle-plus"></i> Add Category</a>
            </button>
            <button class="add-btn">
                <a href="{{ '/prod/list' }}"><i class="fa-solid fa-circle-plus"></i> Add Product</a>
            </button>
        </div>
        <div class="search-blk">
            <form action="{{ route('product#search') }}" class="mt-3" method="GET">
                @csrf
                <div class="search mb-3">
                    <div class="text">
                        <label for="" class="label">Product Name:</label>
                        <input type="text" name="name" placeholder="Enter product name..."
                            value="{{ request('name') }}">
                        <label for="" class="label">Category:</label>
                        <input type="text" name="category" placeholder="Enter category ..."
                            value="{{ request('category') }}">
                    </div>
                    <div class="date">
                        <label for="" class="label">Start Date:</label>
                        <input type="date" name="startDate" value="{{ request('startDate') }}">
                        <label for="" class="label">End Date:</label>
                        <input type="date" name="endDate" value="{{ request('endDate') }}">
                    </div>
                </div>
                <input type="submit" value="Search">
                <button class="btn"><a href="{{ route('product#show') }}">Cancel</a></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="mt-3">
                @if (session('deleteSuccess'))
                    <div class="col-4 offset-8 mb-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fa-regular fa-circle-xmark"></i> {{ session('deleteSuccess') }} </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @if (session('createSuccess'))
                    <div class="col-4 offset-8 mt-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fa-solid fa-check"></i> {{ session('createSuccess') }} </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @if (session('updateSuccess'))
                    <div class="col-4 offset-8 mt-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fa-solid fa-check"></i> {{ session('updateSuccess') }} </strong>
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
            </div>
        </div>
    </div>
@endsection
