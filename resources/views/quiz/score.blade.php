<x-app-layout>
    <x-slot name="header">
        <h2 class="no-margin font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User')}}: {{$user->name}}
        </h2>

        <style>
            .no-margin{
                margin-bottom: 0!important;
            }
            table {
                width: 80%;
                margin: 1rem auto 2rem auto;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            tbody {
                display: flex;
                position: relative;
                align-items: stretch;
                border: 1px solid black;
            }
            tr {
                flex-basis: 33.33333333%;
                display: flex;
                flex-wrap: wrap;
                align-content: flex-start;
                padding: 5px 10px;
            }
            tr + tr {
                border-left: 1px solid black;
            }
            th, td {
                flex-basis: 100%;
                text-align: left;
                display: flex;
                padding: 2px;
                justify-content: center;
            }
            td{
                height: 150px;
                align-items: center;
            }
            th {
                font-weight: bold;
                border-bottom: 1px solid black;
            }
            .bi-check-circle-fill{
                color: green;
            }
            .bi-x-circle-fill{
                color: red;
            }
            .bi-dash-circle-fill{
                color: gray;
            }
            tr td:not(:last-child){
                border-bottom: 1px solid black;
            }
        </style>
    </x-slot>

    <table id="tabla">
        <tbody>
        <tr class="question">
            <th>Question</th>

            @foreach($question as $questions)
               <td>{{ Str::limit($questions->body, 80) }}</td>
                           @endforeach
        </tr>
        <tr class="data-user">
            <th>Data User</th>
            @foreach($dataUser as $key => $dataUsers)
                @for($y = 0; $y < count($question); $y++)
                    @if(!isset($dataUsers->answers_user[$y]))
                        <td><i class="bi bi-dash-circle-fill"></i></td>
                        @else
                    <td>{{$dataUsers->answers_user[$y]}}</td>
                    @endif
                @endfor
            @endforeach

        </tr>
        <tr class="answer-correct">
            <th>Answer Correct</th>
            @foreach($answer_correct as $answer_corrects)
                @foreach($answer_corrects->answer as $correct_answer )
                    <td>{{$correct_answer}}</td>
                @endforeach
            @endforeach
        </tr>

        <tr class="result">
            <th>Result</th>
            @foreach($result as $results)
                @if($results == 1)
                    <td><i class="bi bi-check-circle-fill"></i></td>
                @else
                    <td><i class="bi bi-x-circle-fill"></i></td>
                @endif
            @endforeach
        </tr>
        </tbody>
    </table>
    <div class="flex justify-center">Total Score: {{ $totalScore->score }}</div>
</x-app-layout>
