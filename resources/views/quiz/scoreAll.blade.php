<x-app-layout>
    <x-slot name="header">

        <style>
            .py-6 {
                padding: 0 !important;
            }
            #user-score {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 90%;
                margin: 2rem auto 1rem auto;
            }

            #user-score td, #user-score th {
                border: 1px solid #ddd;
                padding: 8px;

            }

            #user-score tr:nth-child(even){background-color: #f2f2f2;}

            #user-score tr:hover {background-color: #ddd;}

            #user-score th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #04AA6D;
                color: white;
            }
            .score{
                font-weight: 900;
            }
            .gold{
                color: #FFD700;
            }
        </style>
    </x-slot>

    <table id="user-score">
        <tr>
            <th>Name</th>
            <th>Quiz</th>
            <th>Score</th>
        </tr>

            @foreach($userData as $ud)

                    @if(count($ud->dataUser) == 0)
                    @else
                    <td><b>{{$ud->name}}</b></td>
                    @endif

                    @foreach($ud->dataUser as $key => $data)
                        <?php $perfect = ""; ?>
                        @if($data->score == 10)
                        <?php $correct = "#04AA6D"; $perfect = "Perfect"; ?>
                            @elseif($data->score >= 6  && $data->score < 9)
                                <?php $correct = "#90EE90"; ?>
                            @elseif($data->score < 6)
                                <?php $correct = "red"; ?>
                            @endif
                        @if($key > 0)

                        <tr>
                            <td></td>
                            <td class="text-center">{{$quiz[($data->quiz_id)-1]->name}}</td>
                            <td class="text-center score" style="color:{{$correct}};">{{$data->score}}
                                 <span class="gold">{{$perfect}} </span></td>
                        </tr>
                            @else
                                <td class="text-center">{{$quiz[($data->quiz_id)-1]->name}}</td>
                                <td class="text-center score" style="color:{{$correct}};">{{$data->score}}
                                     <span class="gold">{{$perfect}}</span></td>
                            @endif
                    @endforeach


            @endforeach

    </table>

</x-app-layout>
