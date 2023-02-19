<?php
    use Illuminate\Support\Facades\DB;
    $Jobs = DB::table('jobs')->get();
    $Jobs = $Jobs->pluck('job_name', 'id');
    $Jobs = $Jobs->toArray();
    $Jobs = array('' => 'Select Template') + $Jobs;
?>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($candidate->name) ? $candidate->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <input class="form-control" name="age" type="number" id="age" value="{{ isset($candidate->age) ? $candidate->age : ''}}" >
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    <label for="gender" class="control-label">{{ 'Gender' }}</label>
    <div class="radio">
    <label><input name="gender" type="radio" value="Male" {{ (isset($candidate) && 1 == $candidate->gender) ? 'checked' : '' }}> Male</label>
</div>
<div class="radio">
    <label><input name="gender" type="radio" value="Female" @if (isset($candidate)) {{ (0 == $candidate->gender) ? 'checked' : '' }} @else {{ 'checked' }} @endif> Female</label>
</div>
    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('birthdate') ? 'has-error' : ''}}">
    <label for="birthdate" class="control-label">{{ 'Birthdate' }}</label>
    <input class="form-control" name="birthdate" type="date" id="birthdate" value="{{ isset($candidate->birthdate) ? $candidate->birthdate : ''}}" >
    {!! $errors->first('birthdate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
    <label for="phone_number" class="control-label">{{ 'Phone Number' }}</label>
    <input class="form-control" name="phone_number" type="number" id="phone_number" value="{{ isset($candidate->phone_number) ? $candidate->phone_number : ''}}" >
    {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($candidate->email) ? $candidate->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('job_id') ? 'has-error' : ''}}">
    <label for="job_id" class="control-label">{{ 'Jobs' }}</label>
    {!! Form::select('job_id', $Jobs, null, ['class' => 'form-control']) !!}
    {!! $errors->first('job_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
