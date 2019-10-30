<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
