@extends('layouts.master')

@section('content')

	<div class="col-md-8">
		@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
		<form method="POST" action="{{ route('auth-login') }}">
			{{ csrf_field() }}

			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" placeholder="email" class="form-control">
				
				@if ($errors->has('email'))
				    <span class="help-block">
				        <strong>{{ $errors->first('email') }}</strong>
				    </span>
				@endif
			</div>

			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				<label for="password">Password</label>
				<input type="password"  name="password" id="password" placeholder="password" class="form-control">
				
				@if ($errors->has('password'))
				    <span class="help-block">
				        <strong>{{ $errors->first('password') }}</strong>
				    </span>
				@endif
			</div>

			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>

@endsection