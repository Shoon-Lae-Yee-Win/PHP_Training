@extends('layout.app')
@section('content')
    <button class="back-btn m-3 "><a href="{{ '/' }}">Back</a></button>
    <div class="container">
        <div class="row">
            <div class="card col-md-4 shadow offset-4 my-5 rounded-3">
                <h3 class="text-center my-4">Category Form</h3>
                <form action="{{ route('category#create') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="cat_name">Category Name:</label>
                        <input type="text" name="cat_name" id="cat_name"
                            class="form-control mt-2
                    @error('cat_name') is-invalid @enderror"
                            value="{{ old('cat_name') }}" placeholder="Enter category name ...">
                        @error('cat_name')
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
        <div class="row">
            @if (session('createSuccess'))
                <div class="col-4 offset-8 mb-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fa-solid fa-check"></i> {{ session('createSuccess') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('deleteSuccess'))
                <div class="col-4 offset-8 mb-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fa-regular fa-circle-xmark"></i> {{ session('deleteSuccess') }} </strong>
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
            @if (count($categories) != 0)
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->cat_name }}</td>
                                <td>{{ $category->created_at->format('j-F-Y') }}</td>
                                <td>{{ $category->updated_at->format('j-F-Y') }}</td>
                                <td>
                                    <div>
                                        <button class="btn btn-edit">
                                            <a href="{{ route('category#edit', $category->id) }}">Edit</a>
                                        </button>
                                        <button class="btn">
                                            <a href="{{ route('category#delete', $category->id) }}">Delete</a>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3 pagniation">
                    {{ $categories->links() }}
                </div>
            @else
                <h2 class="text-center text-danger">There is no data.</h2>
            @endif
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- Jquery CDN --}}
    <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
@endsection
