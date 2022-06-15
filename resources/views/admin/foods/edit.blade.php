@extends('layouts.app')

@section('title', 'Modifica il piatto')

@section('content')

<section class="container-fluid p-5" id="add-form">
	<div class="row">
		<div class="col-12 mb-3">
			<a href="{{ route('admin.foods.index') }}" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Back</a>
		</div>
	</div>

	<form class="row row-cols-4 g-3 flex-column align-items-center" action="{{ route("admin.foods.update", $foodItem )}}" method="POST">
		@csrf
		@method('PUT')
				<div class="col">
						<h2>
								Modifica
						</h2>
						
				</div>
					@if ( $errors->any() )
					<ul class="alert alert-danger">
							@foreach ( $errors->all() as $error)
									<li>{{ $error }}</li>
							@endforeach
					</ul>
					@endif

			<div class="col">
					<label for="name">Nome</label>
					<input type="text" name="name" id="name" class="form-control" value="{{$foodItem->name}}">
			</div>

			<div class="col py-2">
				<label for="description">Descrizione</label>
				<input type="text" name="description" id="description" class="form-control text-secondary" value="{{$foodItem->description}}">
			</div>

			<div class="col py-2">
				<label for="ingredients">Ingredienti</label>
				<input type="text" name="ingredients" id="ingredients" class="form-control text-secondary" value="{{$foodItem->ingredients}}">
			</div>

			<div class="col">
					<label for="image">Carica l'immagine</label>
					<input type="file" name="image" id="image" class="form-control" value="{{$foodItem->img_url}}">
			</div>

			<div class="col">
				<label for="price">Inserisci il prezzo</label>
				<input type="number" step="0.01" name="price" id="price" class="form-control" value="{{$foodItem->price}}">
			</div>



			<div class="col py-2">
				<div class="form-check">
						<select 
						class="form-select" 
						name="course[]" 
						>
						<option selected>Seleziona la portata</option>
						@foreach ($courses as $course)
							<option value="{{$course->id}}" {{ $foodItem->course_id === $course->id ? 'selected' : '' }}>{{$course->name}}</option>
						@endforeach
				</div>
		</div> 

		<div class="col py-2">

			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="{{false}}" name="is_visible" id="flexCheckDefault" checked>
				<label class="form-check-label" for="flexCheckDefault" {{ !$foodItem->is_visible ? 'checked' : '' }}>
					Non visibile
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="{{true}}" name="is_visible" id="flexCheckChecked">
				<label class="form-check-label" for="flexCheckChecked" {{ $foodItem->is_visible ? 'checked' : '' }}>
					Visibile
				</label>
			</div>

		</div>

			<div class="col py-2">
					@foreach ($categories as $category)
					<div class="form-check">
							<input 
							class="form-check-input"
							type="checkbox"
							value="{{ $category->id }}" 
							name="category[]"
							{{ $foodItem->categories->contains($category) ? 'checked' : '' }}
							>
							<label class="form-check-label" for="flexCheckDefault">
									<span class="badge rounded-pill mb-3">{{$category->name}}</span>
							</label>
					</div>
					@endforeach
			</div> 

			<div class="col text-center pt-4">
					<button type="submit" class="btn btn-primary">Modifica il piatto</button>
			</div>  
	</form>
</section>

@endsection