<?php
namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder {

  public function run() {

    $faker = Faker::create('ar_SA');
    $users = [];
    for ($i = 0; $i < 100 ; $i++) {
      $user = [
        'name'         => $faker->name,
        'phone'        => "51111111$i",
        'email'        => $faker->unique()->email,
        'password'     => bcrypt('123456'),
        'is_blocked'      => rand(0, 1),
        'active'       => rand(0, 1),
      ];
      
      User::create($user) ; 
    }

  }
}
