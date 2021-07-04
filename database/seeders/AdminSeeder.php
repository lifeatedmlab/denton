<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', 'admin@gmail.com')->get();
        if($admin == '[]'){
            $new_admin = User::create([
                'name' => 'Admin',
                'code'=> 'ADMIN',
                'nim' => '0000000000',
                'generation' => '1st Generation',
                'batch_year'=> '2018',
                'status' => 'active',
                'socmed' => [],
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234567890'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]);
            $new_admin->assignRole('Admin');
        }
    }
}
