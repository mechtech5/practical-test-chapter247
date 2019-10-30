<?php

use App\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
        'administrator' => 'admin@app.com',
        'user-manager' => 'user-manager@app.com',
        'shop-manager' => 'shop-manager@app.com'
      ];

      foreach($users as $key=>$value)
      {
        $entity = User::create([
          'name' => $key,
          'email' => $value,
          'password' => Hash::make('password')
        ]);

        Bouncer::assign($key)->to($entity);
      }
    }
}
