<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    function index()
    {
        $msg = '';
        return view('pages.new_product', compact('msg'));
    }

    function insertProduct(Request $request)
    {
        $product_name = $request->post('product_name');
        $price = $request->post('price');

        $data = [
            "product_name" => $product_name,
            "product_price" => $price
        ];

        $msg = '';

        $insert = DB::table('products')->insert($data);

        if ($insert) {
            $msg = "Product Name: {$product_name}, Price: {$price} is stored successfully!";
            return view('pages.new_product', compact('msg'));
        } else {
            $msg = "Could Not save Product";
        }

        return view('pages.new_product', compact('msg'));

    }

    function editProductForm($id)
    {
        $product = DB::table('products')->find($id);
        return view('pages.edit_product', compact('product'));

    }

    function editProduct(Request $request)
    {
        $product = DB::table('products')
            ->where('id', '=', $request->post('id'))
            ->update([
                'product_name' => $request->post('product_name'),
                'product_price' => $request->post('price')
            ]);
        return redirect('/product-list');

    }

    function productList()
    {
        $products = DB::table('products')
            ->join('inventory_records', 'products.id', '=', 'inventory_records.product_id')
            ->select(
                'products.id',
                'products.product_name',
                'products.product_price',
                DB::raw('SUM(inventory_records.in_qty - inventory_records.out_qty) as stock')
            )
            ->groupBy('products.id', 'products.product_name', 'products.product_price')
            ->get();

        return view('pages.product_list', compact('products'));
    }

    function productDetails($id)
    {
        $product = DB::table('products')->find($id);
        $stock_transaction_list = DB::table('inventory_records')
            ->where('product_id', '=', $id)
            ->orderBy('id', 'ASC')
            ->get();

        return view('pages.product_details', compact('product', 'stock_transaction_list'));
    }
}
