
@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<section class="p-4">
		<a href="{{route('admin.foods.create' )}}">Aggiungi un nuovo piatto</a>
		@if (count($foods) > 0)
		<h2>Piatti:</h2>
		<div class="col-6 text-center m-auto">
			@if (session('create-message'))
							<div class="alert alert-success">
									{{ session('create-message')}}
							</div>
			@endif
		</div>

			<div class="col-6 text-center m-auto">
						@if (session('edit-message'))
										<div class="alert alert-warning">
												{{ session('edit-message')}}
										</div>
						@endif
				</div>


			@foreach ($foods as $food)
				<h2>{{$food->name}}</h2>
				<a href="{{route('admin.foods.show', $food)}}">Show</a>
				<a href="{{route('admin.foods.edit', $food)}}">Edit</a>

				<form 
				action="{{route('admin.foods.destroy', $food )}}"
				method="post"
				class="delete-form"
				dish-title="{{$food->name}}"
				>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-outline-danger mx-1">
						Cancella il piatto
				</button>
				</form>
			@endforeach
			@else
				<div class="col">
					<h5>Non ci sono piatti</h5>
				</div>
			@endif
	</section>
@endsection

@section('script')

<script src="{{asset('js/admin.js')}}"></script>
	
@endsection