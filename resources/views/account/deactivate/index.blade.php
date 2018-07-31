@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('account.deactivate.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('password_current') ? ' form-error': ''}}">
                    <label for="password_current"> Current password</label>
                    <input type="password" name="password_current" id="password_current" class="form-control">
                    @if ($errors->has('password_current'))
                        <small class="form-text text-muted">{{ $errors->first('password_current') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Deactivate Account</button>
            </form>
        </div>
    </div>
@endsection