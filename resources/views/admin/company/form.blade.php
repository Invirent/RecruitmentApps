<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($company->name) ? $company->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <textarea class="form-control" rows="5" name="address" type="textarea" id="address" >{{ isset($company->address) ? $company->address : ''}}</textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value={{ isset($company->phone) ? $company->phone : ''}}></input>
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <label for="mobile" class="control-label">{{ 'Mobile' }}</label>
    <input class="form-control" name="mobile" type="text" id="mobile" value={{ isset($company->mobile) ? $company->mobile : ''}}></input>
    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($company->email) ? $company->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('company_logo') ? 'has-error' : ''}}">
    <label for="company_logo" class="control-label">{{ 'Company Logo' }}</label>
    <input class="form-control" name="company_logo" type="file" id="company_logo" value="{{ isset($company->company_logo) ? $company->company_logo : ''}}" >
    {!! $errors->first('company_logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('favicon') ? 'has-error' : ''}}">
    <label for="favicon" class="control-label">{{ 'Favicon' }}</label>
    <input class="form-control" name="favicon" type="file" id="favicon" value="{{ isset($company->favicon) ? $company->favicon : ''}}" >
    {!! $errors->first('favicon', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
