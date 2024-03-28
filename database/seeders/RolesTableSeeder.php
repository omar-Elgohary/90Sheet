<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role ::create([ 
            'name' => ['ar' => 'ادمن' , 'en' => 'admin'] 
        ]);
    }
}
