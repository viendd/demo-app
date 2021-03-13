<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        Schema::disableForeignKeyConstraints();
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0915926149',
            'about_us' => 'I\'m the admin',
            'type' => User::TYPE_ADMIN,
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
