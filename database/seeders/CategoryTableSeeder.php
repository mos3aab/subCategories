<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $options = [
            ['name' => 'parent','description' => 'parent','parent_id'=>NULL],
            ['name' => 'child','description' => 'child','parent_id'=>1],
            ['name' => 'child of child','description' => 'child of child','parent_id'=>2],
            ['name' => 'child of child of child ','description' => 'child of child of child ','parent_id'=>3],

        ];

        DB::table('categories')->insert($options);
    }
}
