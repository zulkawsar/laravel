@extends('layouts.master')

@section('content')

	<div class="col-md-8">
		@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
		<form method="POST" action="{{ route('auth-store') }}">
			{{ csrf_field() }}
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" placeholder="name" class="form-control">
				
				@if ($errors->has('name'))
				    <span class="help-block">
				        <strong>{{ $errors->first('name') }}</strong>
				    </span>
				@endif
			</div>

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

			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				<label for="password_confirmation">Password Conformation</label>
				<input type="password" name="password_confirmation" id="password_confirmation" placeholder="retype password" class="form-control">
			</div>

			<button type="submit" class="btn btn-primary">Register</button>
		</form>
	</div>

@endsection