<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getCustomers()
    {
        $customers = Customer::all();
        return Datatables::of($customers)
            ->editColumn('created_at', function ($customer) {
                return $customer->created_at ? with(new Carbon($customer->created_at))->format('m-d-Y') : '';
            })
            ->make(true);
    }

    public function getProducts()
    {
        $products = Product::all();
        return Datatables::of($products)

            ->make(true);
    }

    public function getOrders()
    {
        $orders = Order::with('customer')->get();
        return Datatables::of($orders)
            ->editColumn('created_at', function ($customer) {
                return $customer->created_at ? with(new Carbon($customer->created_at))->format('m-d-Y') : '';
            })
            ->addColumn('action', function ($order) {
                return '<a href="/orders/'.$order->id.'/process" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Process</a>';
            })
            ->make(true);
    }

    public function processOrder($order_id)
    {
        $order = Order::with('customer')->where('id', $order_id)->first();
        return view('view-order', ['order' => $order]);
    }
}
