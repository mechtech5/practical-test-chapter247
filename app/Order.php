<?php

namespace App;

use App\Customer;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  	public function products()
  	{
  		return $this->belongsToMany(Product::class);
  	}

  	public function customer()
  	{
  		return $this->belongsTo(Customer::class);
  	}
}
