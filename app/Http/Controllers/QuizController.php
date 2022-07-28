<?php

namespace App\Http\Controllers;

use App\Models\DataUsers;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\AnswerCorrect;
use App\Models\User;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quiz = Quiz::all();
        return view('quiz.index', compact('quiz'));
    }

    public function show($QuizId)
    {
        if(Question::where('quiz_id', $QuizId)->count() == 0){
            return abort('404');
        }
        $quizId = Quiz::where('id', $QuizId)->get();

        $questions = Question::with('answer')->where('quiz_id', $QuizId)->get();

        return view('quiz.show',['user' => auth()->user()->id], compact('quizId','questions','QuizId'));
    }

    public function score($id, User $user)
    {
        if(DataUsers::select('answers_user')
            ->where('quiz_id', $id)
            ->where('user_id', $user->id)->count() == 0)
        {
            return abort(404);
        }

    $answer_correct = AnswerCorrect::select('answer')->where('quiz_id', $id)
        ->get();

    $question = Question::select('body')->where('quiz_id', $id)->get();

        $dataUser = DataUsers::select('answers_user')
            ->where('quiz_id', $id)
            ->where('user_id', $user->id)->get();

        if(!DataUsers::select('answers_user')->exists()){
            return abort('404');
        }
            foreach ($answer_correct as $i => $ac) {
                foreach ($ac->answer as $key => $a) {
                    $answerCorrect[$key] = $a;
                }
            }
            foreach ($dataUser as $i => $t) {
                foreach ($t->answers_user as $key => $te) {
                    $dataArray[$key] = $te;
                }
            }

            $score = 0;
            for ($i = 0; $i < count($answerCorrect); $i++) {
                for ($y = 0; $y < count($dataArray); $y++) {
                    if (!isset($dataArray[$i])) {
                        $result[$i] = 0;
                    } elseif ($answerCorrect[$i] == $dataArray[$i]) {
                        $result[$i] = 1;
                    } elseif ($answerCorrect[$i] != $dataArray[$i]) {
                        $result[$i] = 0;
                    }
                }
            }

        $counts = array_count_values($result);
            if(!isset($counts['1'])){
                $score = 0;
            }else{
                $score = $counts['1'];
            }

        DataUsers::where('user_id', auth()->user()->id)
            ->where('quiz_id', $id)->update(['score' => $score]);

            $totalScore = DataUsers::select('score')
                ->where('user_id', auth()->user()->id)
                ->where('quiz_id', $id)
                ->first();



    return view('quiz.score',
        compact('id',
            'answer_correct',
            'question',
            'dataUser',
            'result',
            'user',
            'totalScore'));
    }

    public function scoreAll(User $user)
    {
        $userData = User::with('dataUser')->get();
        $dataUser = DataUsers::with('userScore')->get();
        $quiz = Quiz::all();

        $array = array();
        foreach($quiz as $i => $q){
            $array['name'] = $q->name;
        }


        return view('quiz.scoreAll', ['array' => $array],compact('user','quiz','userData','array'));
    }



}
