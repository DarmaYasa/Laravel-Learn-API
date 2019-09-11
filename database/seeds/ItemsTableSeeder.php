<?php

use Illuminate\Database\Seeder;
use Faker\Provider\Uuid;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();

        DB::table('items')->insert([
            [
                'id' => '1',
                'id_category' =>  '1',
                'slug' => 'hobby_book',
                'name' => 'Hobby Book',
                'stock' => 10,
            ],
            [
                'id' => '2',
                'id_category' =>  '1',
                'slug' => 'learning_javascript',
                'name' => 'Learning Javascript',
                'stock' => 10,
            ],
            [
                'id' => '3',
                'id_category' =>  '1',
                'slug' => 'sex_education',
                'name' => 'Sex Education',
                'stock' => 10,
            ],
            [
                'id' => '4',
                'id_category' =>  '1',
                'slug' => 'how_to_hate_yourself',
                'name' => 'How To Hate Yourself',
                'stock' => 10,
            ],
        ]);
    }
}
