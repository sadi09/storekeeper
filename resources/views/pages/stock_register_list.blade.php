@extends('layouts.master');

@section('main-content')

    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Inventory Register List</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                <li class="breadcrumb-item active">Inventory</li>
                <li class="breadcrumb-item active">All List</li>
            </ol>
        </div>

    </div>

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
