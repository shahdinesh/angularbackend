<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->_category_seeder();
    	// $this->_question_set();
        // $this->call(UsersTableSeeder::class);
    }

    private function _category_seeder()
    {
        \App\Models\Category::truncate();

        $categories = [
			['category' => 'Physics'],
			['category' => 'Chemestry'],
			['category' => 'Math'],
			['category' => 'Biology'],
			['category' => 'Computer'],
			['category' => 'English'],
			['category' => 'Nepali'],
        ];

        \App\Models\Category::insert($categories);
    }

    private function _question_set()
    {
        $categories = \App\Models\Category::all();
        $faker = Faker::create();

        \App\Models\QuestionAnswer::truncate();
        \App\Models\Question::truncate();

        foreach ($categories as $category) {
            echo "Seeding category {$category->category}" . PHP_EOL;
            for ($i=0; $i < 100; $i++) {                 
                $question = \App\Models\Question::create([
                    'category_id' => $category->id,
                    'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                ]);
                $answers = $faker->words($nb = 4);

                $correct_index = $faker->numberBetween($min = 0, $max = 3);
                $index = 0;
                $answers = array_map(function($i) use ($correct_index, &$index) {
                    $is_true = ($correct_index == $index) ? 1 : 0;

                    $index++;
                    return [
                        'answer' => $i,
                        'is_true' => $is_true
                    ];
                }, $answers);
                $question->answers()->createMany($answers);
            }
        }
    }
}
