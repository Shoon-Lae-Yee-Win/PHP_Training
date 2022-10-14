<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index Page</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-3 shadow mt-3 p-5 bg-warning bg-opacity-50">
                <h2 class="text-center">MVC Framwork Basic Task</h2>
                @if (isset($post))
                    <form method="POST" action="{{ $post->id }}">
                        @csrf
                        <input type="" placeholder="Enter Post Title" class="form-control mb-2" name="title"
                            value="{{ old('title', $post->title) }}">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                        <input type="" placeholder="Enter Author" class="form-control mb-2" name="author"
                            value="{{ old('author', $post->author) }}">
                        @if ($errors->has('author'))
                            <span class="text-danger">{{ $errors->first('author') }}</span>
                        @endif
                        <div class="text-group mt-3">
                            <button class="btn btn-warning"><a href="index.blade.php"><< Back </a></button>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                            <button class="btn btn-danger"><a href="/edit/{{ $post->id }}">Cancel</a></button>
                        </div>
                    </form>
                @else
                    <form method="POST" action="store">
                        @csrf
                        <div class="test-group mb-2">
                            <label for="" class="mt-3">Title:</label>
                            <input type="text" name="title" id="title" placeholder="Enter Post Title..."
                                class="form-control" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="test-group mb-4">
                            <label for="" class="mt-3">Author:</label>
                            <input type="text" name="author" id="author" placeholder="Enter Author..."
                                class="form-control" value="{{ old('author') }}">
                            @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author') }}</span>
                            @endif
                        </div>
                        <div class="text-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            <button class="btn btn-danger"><a href="index.blade.php">Cancel</a></button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <div class="row">
            <table class="mt-3">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Created_Date</th>
                    <th>Modified_Date</th>
                    <th>Action</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        <td>{{ $post->updated_at->format('d/m/Y') }}</td>
                        <td>
                            <div>
                                <button class="btn btn-success">
                                    <a href="{{ url('edit/' . $post->id) }}">Edit</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a href="{{ url('delete/' . $post->id) }}">Delete</a>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
