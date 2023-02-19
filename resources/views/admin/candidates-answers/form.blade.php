<div class="form-group {{ $errors->has('candidate_id') ? 'has-error' : ''}}">
    <label for="candidate_id" class="control-label">{{ 'Candidate Id' }}</label>
    <input class="form-control" name="candidate_id" type="number" id="candidate_id" value="{{ isset($candidatesanswer->candidate_id) ? $candidatesanswer->candidate_id : ''}}" >
    {!! $errors->first('candidate_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quiz_id') ? 'has-error' : ''}}">
    <label for="quiz_id" class="control-label">{{ 'Quiz Id' }}</label>
    <input class="form-control" name="quiz_id" type="number" id="quiz_id" value="{{ isset($candidatesanswer->quiz_id) ? $candidatesanswer->quiz_id : ''}}" >
    {!! $errors->first('quiz_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer_choose_id') ? 'has-error' : ''}}">
    <label for="answer_choose_id" class="control-label">{{ 'Answer Choose Id' }}</label>
    <input class="form-control" name="answer_choose_id" type="number" id="answer_choose_id" value="{{ isset($candidatesanswer->answer_choose_id) ? $candidatesanswer->answer_choose_id : ''}}" >
    {!! $errors->first('answer_choose_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('scored_answer') ? 'has-error' : ''}}">
    <label for="scored_answer" class="control-label">{{ 'Scored Answer' }}</label>
    <div class="radio">
    <label><input name="scored_answer" type="radio" value="1" {{ (isset($candidatesanswer) && 1 == $candidatesanswer->scored_answer) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="scored_answer" type="radio" value="0" @if (isset($candidatesanswer)) {{ (0 == $candidatesanswer->scored_answer) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('scored_answer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_correct_answer') ? 'has-error' : ''}}">
    <label for="is_correct_answer" class="control-label">{{ 'Is Correct Answer' }}</label>
    <div class="radio">
    <label><input name="is_correct_answer" type="radio" value="1" {{ (isset($candidatesanswer) && 1 == $candidatesanswer->is_correct_answer) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="is_correct_answer" type="radio" value="0" @if (isset($candidatesanswer)) {{ (0 == $candidatesanswer->is_correct_answer) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('is_correct_answer', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
