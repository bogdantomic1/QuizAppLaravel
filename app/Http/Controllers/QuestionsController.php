<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userType = Auth::user()->userType;

        if ($userType->title === 'Admin') {
            $data = Category::all(); 
            $allQuestions = Question::all(); 
            return view('admin', compact('allQuestions', 'data'));


        } elseif ($userType->title === 'Igrac') {
            $data = Category::all();
            $allQuestions = Question::all();
            return view('igrac', compact('allQuestions', 'data'));
        } 
       
        
        
    }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'text'=>'required',
            'answer1'=>'required',
            'answer2'=>'required',
            'correct_answer'=>'required',
            'category_id'=>'required',
        ]);
        $question = new Question();
        $question->text = $request->text;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->correct_answer = $request->correct_answer;
        $question->category_id = $request->category_id;
        $question->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);
        $data = Category::all();
        return view('editQuestion', compact('question', 'id', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'text'=>'required',
            'answer1'=>'required',
            'answer2'=>'required',
            'correct_answer'=>'required',
            'category_id'=>'required',
        ]);
        $question = Question::find($id);
        $question->text = $request->text;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->correct_answer = $request->correct_answer;
        $question->category_id = $request->category_id;
        $question->save();
        return redirect()->route('dashboard')->with('success', 'Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $q = Question::find($id);
        $q->delete();
        return redirect()->back();
    }
}
