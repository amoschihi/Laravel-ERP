@extends('layouts.header')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
    <li><i class="fa fa-home"></i><a href=""> Home</a></li>
    <li class="active"><i class="fa fa-key"> Change Password</i></li>
</ol>
@endsection
@section('content')
<div class="panel panel-info">
    <div class="panel-heading">Admin Change Password</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('admin.password.change.request') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">New Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-flat btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
