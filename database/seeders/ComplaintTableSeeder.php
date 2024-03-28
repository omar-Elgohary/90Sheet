<?php

namespace Database\Seeders;
use App\Models\Complaint;
use Illuminate\Database\Seeder;

class ComplaintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 1000 ; $i++) { 
            # code...
            Complaint::create([
                'user_name'   => 'ahmed abdullah' , 
                'phone'       => '001332422442' , 
                'email'       => 'aa926626@gmail.com' , 
                'user_id'     => rand(1, 100)  , 
                'complaint'   => 'معامله سيئه جدا جدا' , 
            ]);
        }
    }
}
