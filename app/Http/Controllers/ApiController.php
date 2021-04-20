<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCategories()
    {
    	return response()->json(
    		\App\Models\Category::all()
    	);
    }

    public function getQuestions(Request $request, $id = NULL)
    {
        $category_id = $request->get('category_id');
        $title = $request->get('title');
        $question = \App\Models\Question::select('id', 'category_id', 'title')
                ->with([
                    'category:id,category',
                    'answers:id,question_id,answer,is_true',
                ]);
        if ($category_id)
            $question->where('category_id', $category_id);
        if ($title)
            $question->where('title', 'like', "%$title%");

        if ($id)
            $question = $question->where('id', $id)->first();
        else
            $question = $question->paginate(15);
        return response()->json($question);
    }

    public function saveQuestion(Request $request)
    {
        $options = $request->get('options');
        $true_index = $request->get('true_index');
        $index = 0;
        $options = array_map(function($i) use ($true_index, &$index) {
            $i['is_true'] = ($index === $true_index) ? 1 : 0;
            $index++;
            return $i;
        }, $options);

        $question = \App\Models\Question::create([
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
        ]);
        $question->answers()->createMany($options);

        return response()->json(
            'TRUE'
        );
    }

    public function updateQuestion(Request $request, $id)
    {
        $question = \App\Models\Question::find($id);
        $question->category_id = $request->get('category_id');
        $question->title = $request->get('title');
        $question->save();

        $options = $request->get('options');
        $true_index = $request->get('true_index');
        $index = 0;
        $options = array_map(function($i) use ($true_index, &$index) {
            $i['is_true'] = ($index === $true_index) ? 1 : 0;
            $index++;
            return $i;
        }, $options);
        $question->answers()->delete();
        $question->answers()->createMany($options);

        return response()->json(
            'TRUE'
        );
    }

    public function deleteQuestion(Request $request, $id)
    {
        $question = \App\Models\Question::find($id);
        $question->answers()->delete();
        $question->delete();

        return response()->json(
            'TRUE'
        );
    }

    public function getQuizQuestion()
    {
        $all_category = \App\Models\Category::all();

        $raw_questions = [];
        foreach ($all_category as $category) {
            $raw_questions = array_merge($raw_questions, \App\Models\Question::select('id', 'category_id', 'title')
                ->where('category_id', $category->id)
                ->with([
                    'category:id,category',
                    'answers:id,question_id,answer,is_true',
                ])->inRandomOrder()->take(2)->get()->toArray());
        }
        return response()->json(
            $raw_questions
        );        
    }

    public function getCustomers(Request $request)
    {
        
    }

    public function saveCustomer(Request $request)
    {
echo "<pre>";
print_r($request->all());
die;
    }

    public function updateCustomer(Request $request)
    {
        
    }

    public function deleteCustomer(Request $request)
    {
        
    }

}
