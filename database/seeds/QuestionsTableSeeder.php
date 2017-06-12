<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::orderByRaw("RAND()")->take(1)->get();

        DB::table('questions')->insert([
            'question' => str_random(200),
            'title' => str_random(20),
            'user_id' => $users[0]->id,
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s'),
        ]);
    }
}
