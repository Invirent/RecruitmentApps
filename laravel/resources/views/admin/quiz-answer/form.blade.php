<div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="control-label">{{ 'Answer' }}</label>
    <textarea class="form-control" rows="5" name="answer" type="textarea" id="answer" >{{ isset($quizanswer->answer) ? $quizanswer->answer : ''}}</textarea>
    {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_correct') ? 'has-error' : ''}}">
    <label for="is_correct" class="control-label">{{ 'Is Correct' }}</label>
    <div class="radio">
    <label><input name="is_correct" type="radio" value="1" {{ (isset($quizanswer) && 1 == $quizanswer->is_correct) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="is_correct" type="radio" value="0" @if (isset($quizanswer)) {{ (0 == $quizanswer->is_correct) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('is_correct', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('randomize_sequence') ? 'has-error' : ''}}">
    <label for="randomize_sequence" class="control-label">{{ 'Randomize Sequence' }}</label>
    <div class="radio">
    <label><input name="randomize_sequence" type="radio" value="1" {{ (isset($quizanswer) && 1 == $quizanswer->randomize_sequence) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="randomize_sequence" type="radio" value="0" @if (isset($quizanswer)) {{ (0 == $quizanswer->randomize_sequence) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('randomize_sequence', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quiz_id') ? 'has-error' : ''}}">
    <label for="quiz_id" class="control-label">{{ 'Quiz Id' }}</label>
    <input class="form-control" name="quiz_id" type="number" id="quiz_id" value="{{ isset($quizanswer->quiz_id) ? $quizanswer->quiz_id : ''}}" >
    {!! $errors->first('quiz_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
