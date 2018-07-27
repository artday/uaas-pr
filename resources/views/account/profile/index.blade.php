@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('account.profile.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' form-error': ''}}">
                    <label for="name"> Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                    @if ($errors->has('name'))
                        <small class="form-text text-muted">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? ' form-error': ''}}">
                    <label for="email"> Name</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">
                    @if ($errors->has('email'))
                        <small class="form-text text-muted">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection