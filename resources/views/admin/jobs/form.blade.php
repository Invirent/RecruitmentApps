<?php
    use Illuminate\Support\Facades\DB;
    $Quiz_Template = DB::table('quiz_templates')->get();
    $Quiz_Template = $Quiz_Template->pluck('name', 'id');
    $Quiz_Template = $Quiz_Template->toArray();
    $Quiz_Template = array('' => 'Select Template') + $Quiz_Template;
?>

<div class="form-group {{ $errors->has('job_name') ? 'has-error' : ''}}">
    <label for="job_name" class="control-label">{{ 'Job Name' }}</label>
    <input class="form-control" name="job_name" type="text" id="job_name" value="{{ isset($job->job_name) ? $job->job_name : ''}}" >
    {!! $errors->first('job_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('default_template_id') ? 'has-error' : ''}}">
    <label for="default_template_id" class="control-label">{{ 'Default Template' }}</label>
    {!! Form::select('default_template_id', $Quiz_Template, null, ['class' => 'form-control']) !!}
    {!! $errors->first('default_template_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
