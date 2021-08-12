<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('brands')->truncate();

        DB::table('brands')->insert([
           [
               'name' => 'ENKID',
               'slug' => 'enkid',
               'status' => Brand::ACTIVE,
               'description' => 'enkid'
           ],
            [
                'name' => 'ABBOTT',
                'slug' => 'abbott',
                'status' => Brand::ACTIVE,
                'description' => 'abbott'
            ],
            [
                'name' => 'VINAMILK',
                'slug' => 'vinamilk',
                'status' => Brand::ACTIVE,
                'description' => 'vinamilk'
            ],
            [
                'name' => 'PRISO',
                'slug' => 'priso',
                'status' => Brand::ACTIVE,
                'description' => 'priso'
            ],
            [
                'name' => 'MEIJI',
                'slug' => 'meiji',
                'status' => Brand::ACTIVE,
                'description' => 'meiji'
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
