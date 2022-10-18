@extends('layout.app')
@section('content')
    <h1 class="head-title">Cheese & Bite</h1>
    <h2 class="sub-title"><i class="fa-solid fa-cake-candles"></i> Cakes And Drinks Shop <i class="fa-solid fa-mug-hot"></i>
    </h2>
    <div class="btn-sec">
        <button class="add-btn"><a href="{{ '/list' }}"><i class="fa-solid fa-circle-plus"></i> Add Category</a></button>
        <button class="add-btn"><a href="{{ '/prod/list' }}"><i class="fa-solid fa-circle-plus"></i> Add Product</a></button>
    </div>
@endsection
