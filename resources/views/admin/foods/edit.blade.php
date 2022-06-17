@extends('layouts.app')

@section('title', 'Modifica il piatto')

@section('content')

<section class="container-fluid p-5" id="add-form">
	<div class="row">
		<div class="col-12 mb-3">
			<a href="{{ route('admin.foods.index') }}" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Back</a>
		</div>
	</div>

	<form class="row row-cols-4 g-3 flex-column align-items-center" action="{{ route("admin.foods.update", $foodItem )}}" method="POST" enctype="multipart/form-data">
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

			<div id="errors"></div>

			<div class="col">
					<label for="name">Nome*</label>
					<input type="text" name="name" id="name" class="form-control my-form1" form-title="name" value="{{$foodItem->name}}" required>
			</div>

			<div class="col py-2">
				<label for="description">Descrizione*</label>
				<input type="text" name="description" id="description" class="form-control my-form1 text-secondary" form-title="description" value="{{$foodItem->description}}" required>
			</div>

			<div class="col py-2">
				<label for="ingredients">Ingredienti*</label>
				<input type="text" name="ingredients" id="ingredients" class="form-control my-form1 text-secondary" form-title="ingredients" value="{{$foodItem->ingredients}}"required>
			</div>

			<div class="col">			
				<img 
					class="w-100"
					src="{{ str_starts_with($foodItem->img, 'img') ? asset($foodItem->img) : asset('storage') . '/' . $foodItem->img }}"
					alt="image of {{$foodItem->name}}"
				>
			</div>

			<div class="col">
					<label for="img">Carica l'immagine</label>
					<input type="file" name="img" id="img" class="form-control" value="{{$foodItem->img}}">
			</div>

			<div class="col">
				<label for="price">Inserisci il prezzo*</label>
				<input type="number" step="0.01" name="price" id="price" class="form-control my-form1" form-title="price" value="{{$foodItem->price}}" required>
			</div>

			<div class="col py-2">
				<h5>Portata*</h5>
				<select 
				class="form-select" 
				name="course_id" 
				>
				@foreach ($courses as $course)
					<option value="{{$course->id}}" {{ $foodItem->course_id === $course->id ? "selected='selected'" : '' }}>{{$course->name}}</option>
				@endforeach
				</select>
		</div> 

		
		<div class="col py-2">
			@foreach ($categories as $category)
			<div class="form-check">
				<input 
				class="form-check-input my-categories"
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
		<div class="col py-2">

			<div class="form-check">
				<input 
					class="form-check-input my-visible"
					type="radio"
					value="0"
					name="is_visible"
					{{ !$foodItem->is_visible ? "checked='checked'" : '' }}
					>
				<label class="form-check-label">
					Non visibile
				</label>
			</div>
			<div class="form-check">
				<input
					class="form-check-input my-visible"
					type="radio"
					value="1"
					name="is_visible"
					{{ $foodItem->is_visible ? 'checked' : '' }}
					>
				<label class="form-check-label">
					Visibile
				</label>
			</div>

		</div>

			<div class="col text-center pt-4">
					<button type="submit" id="edit-button" class="btn btn-primary">Modifica il piatto</button>
			</div>  
	</form>
</section>

@endsection

@section('script')
	<script>
	// edit form validation
		const foodForm = {
				name: "",
				description: "",
				ingredients: "",
				price: "",
		};
		const keys = Object.keys(foodForm);
		const formErrors = {};
		const form_error_messages = document.getElementById("errors");
		const categories = document.querySelectorAll(".my-categories");
		let checkedCategories = false;
		let formInputs = document.querySelectorAll('.my-form1');
		function checkFormErrors() {
				form_error_messages.innerHTML = "";
				if (foodForm.name.trim() == "") formErrors.name = "Il nome non è valido.";
				if (foodForm.description.trim() == "") formErrors.description = "La descrizione non è valida.";
				if (foodForm.ingredients.trim() == "") formErrors.ingredients = "Ingredienti non validi.";
				if(!checkedCategories) formErrors.categories = "Devi selezionare almeno una categoria.";
				if (isNaN(foodForm.price) || foodForm.price <= 0) formErrors.price = "Il prezzo non è valido.";
				if (Object.keys(formErrors).length !== 0){
					for (const error in formErrors) {
						form_error_messages.classList.add("alert", "alert-danger");
						form_error_messages.innerHTML += formErrors[error] + "<br>";
						console.log(formErrors[error])
					}
            } 
		};
		let editBtn = document.getElementById('edit-button');
		editBtn.addEventListener('click', function(){
			for (let i = 0; i < formInputs.length; i++) {
					if(categories[i].checked){
						checkedCategories = true;
						console.log(checkedCategories);
					}
					let key = keys[i];
					if (formInputs[i].getAttribute("form-title") == key){
							foodForm[key] = formInputs[i].value;
					}
				}
				
				checkFormErrors();
		})
		
</script>
@endsection
