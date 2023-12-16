@extends('layouts.master');

@section('main-content')

    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">New Product</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                <li class="breadcrumb-item active">Products</li>
                <li class="breadcrumb-item active">New Product</li>
            </ol>
        </div>

    </div>

    <p>{{$msg}}</p>

    <form action="/new-product" method="post">
        @csrf
        <div class="mb-3">
            <label for="employeeName" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="productName"
                   placeholder="Enter Product name">
        </div>
        <div class="mb-3">
            <label for="employeeUrl" class="form-label">Price</label>
            <input type="number" step="any" class="form-control" name="price" id="price" placeholder="Enter Price">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
    </form>

@endsection
