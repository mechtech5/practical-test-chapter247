<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
    	$order = new Order;
      $order->customer_id = rand(1, 200);
  		$order->invoice_number = '#'.str_pad(1, 8, "0", STR_PAD_LEFT);
  		$order->total_amount = 0;
  		$order->status = 'new';
  		$order->save();

      foreach(range(1, 49) as $index)
	    {
        $order = new Order;
        $order->customer_id = rand(1, 200);
  			$latestOrder = Order::orderBy('created_at', 'DESC')->first();
  			$order->invoice_number = '#'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
  			$order->total_amount = 0;
  			$order->status = 'new';
  			$order->save();
	    }

      foreach(App\Order::all() as $order) {
        foreach(App\Product::all() as $product) {
          if (rand(1, 100) > 90) {
              $order->products()->attach([$product->id => ['quantity' => rand(1, 100)] ]);
          }
        }
        $order->save();
      }

      $orders = Order::with('products')->get();
      foreach($orders as $order)
      {
        $amt = 0;
        foreach($order->products as $product)
        {
          $amt += $product->price;
        }
        $order->total_amount = $amt;
        $order->update();
      }
    }
}
