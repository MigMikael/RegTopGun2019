<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
    {!! Form::label('first_name', 'FirstName', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('first_name', null,['class' => 'form-control']) !!}
        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    {!! Form::label('last_name', 'LastName', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('last_name', null,['class' => 'form-control']) !!}
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('affiliation') ? ' has-error' : '' }}">
    {!! Form::label('affiliation', 'Affiliation', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('affiliation', null,['class' => 'form-control']) !!}
        @if ($errors->has('affiliation'))
            <span class="help-block">
                <strong>{{ $errors->first('affiliation') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('team') ? ' has-error' : '' }}">
    {!! Form::label('team', 'Team', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('team', null,['class' => 'form-control']) !!}
        @if ($errors->has('team'))
            <span class="help-block">
                <strong>{{ $errors->first('team') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
    {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('role', $role, null,['class' => 'form-control']) !!}
        @if ($errors->has('role'))
            <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('shirt_size') ? ' has-error' : '' }}">
    {!! Form::label('shirt_size', 'Shirt Size', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('shirt_size', $shirt_size, null,['class' => 'form-control']) !!}
        @if ($errors->has('shirt_size'))
            <span class="help-block">
                <strong>{{ $errors->first('shirt_size') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitText, ['class' => 'btn btn-primary btn-lg']) !!}
    </div>
</div>