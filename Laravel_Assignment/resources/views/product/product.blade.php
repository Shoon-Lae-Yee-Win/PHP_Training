@extends('layout.app')
@section('content')
    <button class="back-btn m-3 "><a href="{{ '/' }}">Back</a></button>
    <div class="container">
        <div class="row">
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
    </div>
@endsection
