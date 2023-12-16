@extends('layouts.master')

@section('main-content')

    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Product: {{$product->product_name}}</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                <li class="breadcrumb-item active">Products</li>
                <li class="breadcrumb-item active">Product Details</li>
            </ol>
        </div>

    </div>

    <h2>Product Name: {{$product->product_name}}</h2>
    <h2>Price: {{$product->product_price}}</h2>

    <h3>Stock History</h3>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Stock Balance</th>
            <th>Entry Time</th>
        </tr>
        </thead>
        <tbody>
        @php
            $balance = 0;
        @endphp

        @foreach($stock_transaction_list as $transaction)
            <tr>
                <td>{{$transaction->id}}</td>
                <td>{{$transaction->type}}</td>
                <td>{{$transaction->in_qty - $transaction->out_qty}}</td>
                <td>
                    @php
                        $balance += $transaction->in_qty - $transaction->out_qty;
                        echo $balance;
                    @endphp
                </td>
                <td>{{$transaction->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
