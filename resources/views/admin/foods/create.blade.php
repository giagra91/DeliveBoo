@extends('layouts.app')

@section('title', 'Aggiungi un piatto')

@section('content')

<section class="container-fluid p-5" id="add-form">

	<div class="row">
		<div class="col-12 mb-3">
			<a href="{{ route('admin.foods.index') }}" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Back</a>
		</div>
	</div>


    <form class="row row-cols-4 g-3 flex-column align-items-center" action="{{route("admin.foods.store")}}" method="POST" enctype="multipart/form-data">
    @csrf

			<div class="col">
					<h2>
							Inserisci un nuovo piatto
					</h2>
					@if ( $errors->any() )
					<ul class="alert alert-danger">
							@foreach ( $errors->all() as $error)
									<li>{{ $error }}</li>
							@endforeach
					</ul>
					@endif
			</div>

			<div class="col">
					<label for="name">Titolo</label>
					<input type="text" name="name" id="name" class="form-control">
			</div>

			<div class="col py-2">
				<label for="description">Descrizione</label>
				<textarea type="text" name="description" id="description" class="form-control"></textarea>
			</div>

			<div class="col py-2">
				<label for="ingredients">Ingredienti</label>
				<textarea type="text" name="ingredients" id="ingredients" class="form-control"></textarea>
			</div>

			<div class="col mb-3">
				<label for="img_url" class="form-label">Carica l'immagine</label>
				<input class="form-control" name="img_url" type="file" id="img_url">
			</div>

			<div class="col mb-3">
				<label for="price">Inserisci il prezzo</label>
				<input type="number" step="0.01" name="price" id="price" class="form-control">
			</div>

			<div class="col mb-3">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="{{false}}" name="is_visible" checked>
					<label class="form-check-label" for="flexCheckDefault">
						Non visibile
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="{{true}}" name="is_visible">
					<label class="form-check-label" for="flexCheckChecked">
						Visibile
					</label>
				</div>
			</div>

			<div class="col py-2 d-flex">
					@foreach ($categories as $category)
					<div class="form-check">
							<input 
							class="form-check-input"
							type="checkbox"
							value="{{ $category->id }}" 
							name="category[]" 
							>
							<label class="form-check-label" for="flexCheckDefault">
									<span class="badge rounded-pill mb-3">{{$category->name}}</span>
							</label>
					</div>
					@endforeach
			</div>

			<div class="col mb-3">
				<select 
				class="form-select"
				name="course_id" 
				>
					@foreach ($courses as $course)
						<option value="{{$course->id}}">{{$course->name}}</option>
					@endforeach
				</select>
			</div> 

			<div class="col text-center py-3">
					<button type="submit" class="btn btn-primary">Inserisci</button>
			</div>
			
    </form>

</section>

@endsection