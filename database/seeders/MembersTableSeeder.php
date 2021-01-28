<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'name' => 'Alexander Deden',
            'code' => 'AXD',
            'position' => 'Ngademin',
            'generation' => '1st Generation',
            'batch_year' => '2018',
            'status' => 'active',
            'socmed' => [
                'linkedin' => 'lifeatedelab',
                'github' => 'lifeatedelab',
                'instagram' => 'lifeatedelab',
            ],
        ]);

        Member::create([
            'name' => 'Ole Out',
            'code' => 'OLE',
            'position' => 'Ngademin',
            'generation' => '2nd Generation',
            'batch_year' => '2020',
            'status' => 'active',
            'socmed' => [
                'linkedin' => 'dasprolab',
                'github' => 'dasprolab',
                'instagram' => 'dasprolab',
            ],
        ]);

        Member::create([
            'name' => 'Mang Ujang',
            'code' => 'MUN',
            'generation' => '1st Generation',
            'batch_year' => '2018',
            'status' => 'inactive',
            'socmed' => [
                'linkedin' => 'mangujang.fc',
                'github' => 'mangujang.fc',
                'instagram' => 'mangujang.fc',
            ],
        ]);
    }
}
