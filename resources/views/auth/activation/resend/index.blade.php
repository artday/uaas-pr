@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                    Resend
                </div>
                <div class="card-body">
                    <form action="{{ route('activation.resend.store') }}" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' form-error': '' }}">
                            <label for="email" >E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            @if ($errors->has('email'))
                                <small class="form-text text-muted">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Resend
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection