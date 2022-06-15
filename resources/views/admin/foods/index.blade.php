@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<section>
		<a href="{{route('admin.foods.create' )}}">Aggiungi un nuovo piatto</a>
		<h2>Piatti:</h2>
		@foreach ($foods as $food)
				<h2>{{$food->name}}</h2>
				<a href="{{route('admin.foods.show', $food)}}">Show</a>
				<a href="{{route('admin.foods.edit', $food)}}">Edit</a>
				<form 
				action="{{route('admin.foods.destroy', $food )}}"
				method="post"
				class="delete-form"
		>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-outline-danger mx-1">
						Cancella il piatto
				</button>
		</form>
		@endforeach
	</section>
@endsection