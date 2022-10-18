@extends('layout.app')
@section('content')
    <button class="back-btn m-3 "><a href="{{ route('category#list') }}">Back</a></button>
    <div class="container">
        <div class="row">
            <div class="card col-md-4 shadow offset-4 my-5 rounded-3">
                <h3 class="text-center my-4">Category Edit Form</h3>
                <form action="{{ route('category#update', $category->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="cat_name">Category Name:</label>
                        {{-- <input type="hidden" name="cat_id" value="{{$category->id}}"> --}}
                        <input type="text" name="cat_name" id="cat_name"
                            class="form-control
                    @error('cat_name') is-invalid @enderror"
                            value="{{ old('cat_name', $category->cat_name) }}" placeholder="Enter category name ...">
                        @error('cat_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn"><a href="">Cancel</a></button>
                        <input type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
