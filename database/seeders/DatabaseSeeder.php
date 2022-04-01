<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<20;$i++){
            $question = Question::create(
                array(
                    "title"=>Str::random(5)." ".Str::random(5)." ".Str::random(5)." ".Str::random(5)." ".Str::random(5)
                )
            );
            $is_correct = rand(0,3);
            for ($j=0;$j<3;$j++) {
                $option = Option::create(
                    array(
                        "name" => Str::random(15),
                        "question_id" => $question->id,
                        "is_correct"=>($is_correct == $i) ? true : false
                    )
                );
            }
        }

    }
}
