<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;
class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::orderByRaw("RAND()")->take(11)->get();
        $questions = Question::orderByRaw("RAND()")->take(11)->get();
        foreach(range(0, 10) as $index)
        {
            $user = $users[$index];
            $question = $questions[$index];
            DB::table('answers')->insert([
                'question_id' => $question->id,
                'user_id' => $user->id,
                'answer' => str_random(200),
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')
            ]);
        }

    }
}
