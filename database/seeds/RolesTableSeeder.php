<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		'administrator' => 'Administrator',
    		'user-manager' => 'User Manager',
    		'shop-manager' => 'Shop Manager'
    	];

    	foreach($roles as $key=>$value)
    	{
    		$admin = Bouncer::role()->firstOrCreate([
				    'name' => $key,
				    'title' => $value
				]);  //
    	}
    }
}
