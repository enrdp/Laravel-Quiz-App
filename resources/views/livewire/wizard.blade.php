<div>
    @if(!empty($successMessage))
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">

            @for($i=1; $i<=$countQuestion; $i++)
            <div class="stepwizard-step">
                <button wire:click="button({{$i}})" type="button" class="btn btn-circle {{ $currentStep != $i ? 'btn-default' : 'btn-primary' }}"><span>{{$i}}</span></button>
                <p>Step {{$i}}</p>
            </div>
            @endfor

        </div>
    </div>
@foreach($questions as $key => $question)

        <div class="row setup-content {{ $currentStep != $key+1 ? 'displayNone' : '' }}" id="step-{{$key+1}}">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="form-group">
                    <h2>Question: </h2>
                    <p>{{$question->body}}</p>

                </div>
                @foreach($question->answer as $index => $answer)
                    <div class="form-group">
                        <input
                            type="radio"
                            value="{{$answer->body}}"
                            name="answers_user.{{$key}}.{{$index}}"
                            wire:model="answers_user.{{$key}}"
                            id="answers_user"/>
                        <label for="answers_user">{{$answer->body}}</label>
                        @error('answers_user'.$key) <span class="error">{{ $message }}</span> @enderror
                    </div>
                @endforeach
                <?php $var = $countQuestion - $currentStep; ?>
            @if($countQuestion - $currentStep == 0)
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back">Back</button>
                    <button class="btn btn-success btn-lg pull-right" wire:click="firstStepSubmit({{$question->quiz_id}}, {{$var}})" type="button">Finish!</button>
                @else
                @if($currentStep != 1)
                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back">Back</button>
                    @endif
                    <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit({{$question->quiz_id}}, {{$var}})" type="button">Next</button>
                @endif
            </div>
        </div>
    </div>
        @endforeach

</div>
