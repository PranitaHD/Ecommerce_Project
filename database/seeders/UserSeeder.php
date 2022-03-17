<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'mobile' => '9856425613',
            'address' => 'Earth',
            'country_id' => 'India',
            'state_id' => 'Maharashtra',
            'city_id' => 'Bhandara',
            'pincode' => '441904',
            // 'role_id' => '1',
            'image' => 'assets/images/avatars/1.jpg',
        ]);
    }
}
