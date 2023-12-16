@extends('layouts.master');

@section('main-content')

    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Edit Product</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                <li class="breadcrumb-item active">Products</li>
                <li class="breadcrumb-item active">New Product</li>
            </ol>
        </div>

    </div>

    <form action="/edit-product" method="post">
        @csrf

        <div class="mb-3">
            <label for="employeeName" class="form-label">Product ID</label>
            <input type="text" class="form-control" name="id" id="productId" readonly
                   value="{{$product->id}}"
                   placeholder="Enter Product name">
        </div>
        <div class="mb-3">
            <label for="employeeName" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="productName"
                   value="{{$product->product_name}}"
                   placeholder="Enter Product name">
        </div>
        <div class="mb-3">
            <label for="employeeUrl" class="form-label">Price</label>
            <input type="number" step="any" class="form-control" name="price" value="{{$product->product_price}}"
                   id="price" placeholder="Enter Price">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

@endsection
