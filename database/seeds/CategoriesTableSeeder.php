<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            array(
                [
                    "parent_id" => 0,
                    "name" => "Hi-tech",
                    "url" => 'hi_tech',
                    "description" => 'Posts about hight technologies',
                    "meta-title" => "",
                    "meta-description" => "",
                    "meta-keywords" => "",
                ],
                [
                    "parent_id" => 1,
                    "name" => "Cellphones",
                    "url" => 'cellphones',
                    "description" => 'Posts about cellphones',
                    "meta-title" => "",
                    "meta-description" => "",
                    "meta-keywords" => "",
                ],
                [
                    "parent_id" => 0,
                    "name" => "Auto",
                    "url" => 'auto',
                    "description" => 'Posts about cars',
                    "meta-title" => "",
                    "meta-description" => "",
                    "meta-keywords" => "",
                ],
            )
        );
    }
}
