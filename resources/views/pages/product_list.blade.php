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

    <table class="table table-nowrap">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
                <th scope="row"><a href="#" class="fw-semibold">{{$product->id}}</a></th>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_price}}</td>
                <td>{{$product->stock}}</td>
                <td>
                    <a href="/product-details/{{$product->id}}" class="btn btn-success">Details <i
                            class="ri-arrow-right-line align-middle"></i></a>
                    <a href="/product-edit/{{$product->id}}" class="btn btn-primary">Edit <i
                            class="ri-pen-nib-fill align-middle"></i></a>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>

@endsection
