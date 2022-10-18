@extends('layout.app')
@section('content')
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
        </thead>
        @foreach ($products as $product)
            <tbody>
                <tr>
                    <td>{{ $product->category->cat_name }}</td>
                    <td>{{ $product->prod_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->created_at->format('j-F-Y') }}</td>
                    <td>{{ $product->updated_at->format('j-F-Y') }}</td>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
