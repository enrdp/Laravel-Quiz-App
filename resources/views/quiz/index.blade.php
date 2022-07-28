<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
        </h2>
        <style>
            .quiz-list{
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .quiz-list a{
                color: white;
                font-weight: 900;
                margin-bottom: 1rem;
            }

        </style>
    </x-slot>

    <div class="py-12 quiz-list">
        @foreach($quiz as $quizzes)
            <a class="btn btn-success" href="{{route('quiz.show', $quizzes->id )}}">{{$quizzes->name}}</a>
        @endforeach
    </div>
</x-app-layout>

