<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 11; $i++) {
            $this->call(UsersTableSeeder::class);
            $this->call(QuestionsTableSeeder::class);
        }
        $this->call(AnswersTableSeeder::class);
    }
}
