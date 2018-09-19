<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,3) as $index) {
            DB::table('comments')->insert([
                'film_id' => $index,
                'user_id' => 1,
                'comment' => $faker->paragraph(2),
            ]);
        }
    }
}
