@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-heading">Choose Role Center</div>
                @if (session('message'))
                @component('components.alert')
                    @slot('type')
                        warning
                    @endslot
                    {{ session('message') }}
                @endcomponent
                @endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.role') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="strong">Oh hey, we have noticed you have several roles. Which role center do you want to login to? Choose one below.</label>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        @foreach($roles as $role)
                            <div class="col-md-6 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="role" value="{{ $role->name }}" {{ old('role') ? 'checked' : '' }}> {{ $role->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        @if ($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
