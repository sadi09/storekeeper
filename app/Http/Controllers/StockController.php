<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    function index()
    {
        $product_list = DB::table('products')->get();
        $transaction_list = DB::table('inventory_records')
            ->join('products', 'inventory_records.product_id', '=', 'products.id')
            ->select('products.product_name', 'inventory_records.*')
            ->limit(5)->orderBy('id', 'DESC')->get();

        return view('pages.stock_register', compact('product_list', 'transaction_list'));
    }

    function stockEntry(Request $request)
    {
        $data = [
            "product_id" => $request->post('product_id'),
            "type" => $request->post('type'),
            "in_qty" => $request->post('type') == "IN" ? $request->post('qty') : 0,
            "out_qty" => $request->post('type') == "OUT" ? $request->post('qty') : 0,
            "note" => $request->post('note'),
        ];

        $insert = DB::table('inventory_records')->insert($data);

        return redirect()->back();

    }

    function stockRegisterList()
    {
        $transaction_list = DB::table('inventory_records')
            ->join('products', 'inventory_records.product_id', '=', 'products.id')
            ->select('products.product_name', 'inventory_records.*')
            ->get();

        return view('pages.stock_register_list', compact('transaction_list'));
    }
}
