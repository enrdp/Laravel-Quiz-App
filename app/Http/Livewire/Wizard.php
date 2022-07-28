<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;
use App\Models\DataUsers;

class Wizard extends Component
{
    public $currentStep = 1;
    public $answers_user, $question_id, $count = 0;
    public $successMessage = '';
    public $QuizId;
    public $question;

    public function mount($QuizId)
    {
        $this->question = $QuizId;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $this->questions = Question::with('answer')
            ->where('quiz_id', $this->question)->get();
        $this->countQuestion = count($this->questions);


        return view('livewire.wizard');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit($id, $var)
    {
        $this->validate([
            'answers_user.*' => 'required',
        ]);

        $this->questions = Question::
            where('quiz_id', $id )
            ->pluck('id');

if($var == 0) {

    DataUsers::updateOrCreate(
        [
            'user_id' => auth()->user()->id,
            'quiz_id' => $id
        ],
        [
            'answers_user' => $this->answers_user,
            'question' => $this->questions,
            'score' => 0
        ]);

    $this->successMessage = 'Answers User Created Successfully.';

    $this->clearForm();

    $this->currentStep = 0;

   return redirect()->route('score',['id' => $id, 'user' => auth()->user()->id]);
}
        $this->currentStep++;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back()
    {
        $this->currentStep--;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->answers_user = '';
    }

    public function button($i)
    {
        $this->currentStep = $i;
    }
}
