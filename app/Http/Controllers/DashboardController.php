<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index()
    {
        $salesToday = DB::table('inventory_records')
            ->join('products', 'products.id', '=', 'inventory_records.product_id')
            ->whereDate('inventory_records.created_at', now())
            ->sum(DB::raw('inventory_records.out_qty * products.product_price'));

        $salesYesterday = DB::table('inventory_records')
            ->join('products', 'products.id', '=', 'inventory_records.product_id')
            ->whereDate('inventory_records.created_at', now()->subDay())
            ->sum(DB::raw('inventory_records.out_qty * products.product_price'));

        $salesThisMonth = DB::table('inventory_records')
            ->join('products', 'products.id', '=', 'inventory_records.product_id')
            ->whereMonth('inventory_records.created_at', now())
            ->sum(DB::raw('inventory_records.out_qty * products.product_price'));

        $salesLastMonth = DB::table('inventory_records')
            ->join('products', 'products.id', '=', 'inventory_records.product_id')
            ->whereDate('inventory_records.created_at', now()->subMonth())
            ->sum(DB::raw('inventory_records.out_qty * products.product_price'));


        return view('pages.dashboard', compact('salesToday', 'salesYesterday', 'salesThisMonth', 'salesLastMonth'));
    }
}
