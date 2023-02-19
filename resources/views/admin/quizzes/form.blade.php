<?php
    $template_id = $_GET['template_id'] | "";
?>

<div class="form-group {{ $errors->has('sequence') ? 'has-error' : ''}}">
    <label for="sequence" class="control-label">{{ 'Sequence' }}</label>
    <input class="form-control" name="sequence" type="number" id="sequence" value="{{ isset($quiz->sequence) ? $quiz->sequence : ''}}" >
    {!! $errors->first('sequence', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
    <label for="question" class="control-label">{{ 'Question' }}</label>
    <textarea class="form-control" rows="5" name="question" type="textarea" id="question" >{{ isset($quiz->question) ? $quiz->question : ''}}</textarea>
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('required') ? 'has-error' : ''}}">
    <label for="required" class="control-label">{{ 'Required' }}</label>
    <div class="radio">
    <label><input name="required" type="radio" value="1" {{ (isset($quiz) && 1 == $quiz->required) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="required" type="radio" value="0" @if (isset($quiz)) {{ (0 == $quiz->required) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('required', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_scored_answer') ? 'has-error' : ''}}">
    <label for="is_scored_answer" class="control-label">{{ 'Is Scored Answer' }}</label>
    <div class="radio">
    <label><input name="is_scored_answer" type="radio" value="1" {{ (isset($quiz) && 1 == $quiz->is_scored_answer) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="is_scored_answer" type="radio" value="0" @if (isset($quiz)) {{ (0 == $quiz->is_scored_answer) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('is_scored_answer', '<p class="help-block">:message</p>') !!}
</div>
<input class="form-control" name="template_id" type="hidden" id="template_id" value="{{ isset($quiz->template_id) ? $quiz->template_id : $template_id}}" >



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
