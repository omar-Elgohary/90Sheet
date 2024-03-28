<?php
namespace Database\Seeders;

use App\Models\SMS;
use Illuminate\Database\Seeder;
use DB;

class SmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_m_s')->insert([
            [
                'name'        => 'باقة يمامة',
                'key'         => 'Yamamah',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 1 ,
            ],[
                'name'        => 'باقة فور جوالي',
                'key'         => 'Jawaly',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة gateway',
                'key'         => 'Gateway',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة hisms',
                'key'         => 'Hisms',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة مسجات',
                'key'         => 'Msegat',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة oursms',
                'key'         => 'Oursms',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة unifonic',
                'key'         => 'Unifonic',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة زين',
                'key'         => 'Zain',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ]
        ]);
    }
}
