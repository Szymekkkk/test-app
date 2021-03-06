<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use App\Models\test_questions;
use Illuminate\Http\Request;

class questionController extends Controller
{
    public function indexPage(){
        return redirect('login');
    }

    public function questionList(){
        $questions = Question::all();
        return view('teacher.Questions.questionList', ['questions' => $questions]);
    }
    public function addQuestion(Request $req){
        $question = new Question();
        $question->question = $req->input('question');
        $question->answ_1 = $req->input('answer1');
        $question->answ_2 = $req->input('answer2');
        $question->answ_3 = $req->input('answer3');
        $question->answ_4 = $req->input('answer4');
        $question->correct = $req->input('correct');

        $question->save();
        return redirect('/teacher/questions');
    }
    public function delQuestion(int $id){
            $e = Question::find($id);
            $e->delete();
        return redirect('/teacher/questions');
    }
    public function editQuestion(int $id){
        $temp = Question::find($id);
        $tests = Test::all();
        return view('teacher.Questions.editQuestion',['temp' => $temp, 'tests'=> $tests]);
    }
    public function saveQuestion(Request $req, int $id){
        $save = Question::find($id);
        $save->question = $req->input('question');
        $save->answ_1 = $req->input('answer1');
        $save->answ_2 = $req->input('answer2');
        $save->answ_3 = $req->input('answer3');
        $save->answ_4 = $req->input('answer4');
        $save->correct = $req->input('correct');
        foreach ($req->input('tests') as $test) {
            $qTest = new test_questions();
            $qTest->question_id = $save->id;
            $qTest->test_id = $test;
            $qTest->save();
        }
        $save->save();
        return redirect('teacher/questions');
    }
}
