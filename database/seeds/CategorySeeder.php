<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => '1',
                'name' => 'Deportes',
                'created_at' => '2021-07-29 11:54:10',
                'updated_at' => '2021-07-29 11:54:10'
            ],
            [
                'id' => '2',
                'name' => 'Política',
                'created_at' => '2021-07-29 11:54:10',
                'updated_at' => '2021-07-29 11:54:10'
            ], 
            [
                'id' => '3',
                'name' => 'Social',
                'created_at' => '2021-07-29 11:54:10',
                'updated_at' => '2021-07-29 11:54:10'
            ], 
            [
                'id' => '4',
                'name' => 'Internacional',
                'created_at' => '2021-07-29 11:54:10',
                'updated_at' => '2021-07-29 11:54:10'
            ], 
            [
                'id' => '5',
                'name' => 'Cultura',
                'created_at' => '2021-07-29 11:54:10',
                'updated_at' => '2021-07-29 11:54:10'
            ], 
            [
                'id' => '6',
                'name' => 'Salud',
                'created_at' => '2021-07-29 11:54:10',
                'updated_at' => '2021-07-29 11:54:10'
            ]
        ]);
    }
}
