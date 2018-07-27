@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('account.password.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('password_current') ? ' form-error': ''}}">
                    <label for="password_current"> Current password</label>
                    <input type="password" name="password_current" id="password_current" class="form-control">
                    @if ($errors->has('password_current'))
                        <small class="form-text text-muted">{{ $errors->first('password_current') }}</small>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' form-error': ''}}">
                    <label for="password"> New password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if ($errors->has('password'))
                        <small class="form-text text-muted">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' form-error': ''}}">
                    <label for="password_confirmation"> New password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    @if ($errors->has('password_confirmation'))
                        <small class="form-text text-muted">{{ $errors->first('password_confirmation') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Change password</button>
            </form>
        </div>
    </div>
@endsection