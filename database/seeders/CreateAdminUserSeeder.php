<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'name' => 'admin',
            'email' => 'msa.cse.metro@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => '1',
            'image' => '1603042204.jpg',
        ]);
    }
}
