@extends('layouts.master');

@section('main-content')

    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">New Inventory Entry</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                <li class="breadcrumb-item active">Inventory</li>
                <li class="breadcrumb-item active">New Entry</li>
            </ol>
        </div>

    </div>


    <form action="/stock-register" method="post">
        @csrf
        <div class="mb-3">
            <label for="employeeName" class="form-label">Product Name</label>
            <select name="product_id" required class="form-control">
                <option>Select Product</option>
                @foreach($product_list as $product)
                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="employeeName" class="form-label">Product Name</label>
            <select name="type" required class="form-control">
                <option value="IN">Restock</option>
                <option value="OUT">Sale</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="employeeUrl" class="form-label">Quantity</label>
            <input type="number" step="any" class="form-control" name="qty" id="qty" placeholder="Enter Quantity">
        </div>

        <div class="mb-3">
            <label for="employeeUrl" class="form-label">Note</label>
            <input type="text" class="form-control" name="note" id="note" placeholder="Enter Note">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Insert</button>
        </div>
    </form>
    <h3>Last 5 Entries</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Entry Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transaction_list as $transaction)
            <tr>
                <td>{{$transaction->id}}</td>
                <td>{{$transaction->product_name}}</td>
                <td>
                    @if($transaction->type === 'IN')
                        Restock
                    @elseif($transaction->type === 'OUT')
                        Sale
                    @endif
                </td>
                <td>{{$transaction->in_qty - $transaction->out_qty}}</td>
                <td>{{$transaction->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
