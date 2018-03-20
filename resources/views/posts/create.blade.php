@extends('layouts.master')

@section('content')
	<div class="col-sm-8 blog-main">
		<h1> Create a Post </h1>
		<form method="POST" action="{{ route('store') }}">
			{{ csrf_field() }}
			<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
				<label for="title">Title</label>
				<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">

				@if ($errors->has('title'))
				    <span class="help-block">
				        <strong>{{ $errors->first('title') }}</strong>
				    </span>
				@endif
			</div>

			<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
				<label for="body">Body</label>
				<textarea class="form-control" rows="6" name="body" id="body" ></textarea>

				@if ($errors->has('body'))
				    <span class="help-block">
				        <strong>{{ $errors->first('body') }}</strong>
				    </span>
				@endif
			</div>
			<input type="hidden" name="user_id" value="3">
			<button class="btn btn-primary">Create</button>
		</form>
	</div>
@endsection