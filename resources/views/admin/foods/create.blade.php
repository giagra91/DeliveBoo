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
			<div id="errors"></div>

			<div class="col">
					<label for="name">Titolo*</label>
					<input type="text" form-title="name" name="name" id="name" class="form-control my-form1" required>
			</div>

			<div class="col py-2">
				<label for="description">Descrizione*</label>
				<textarea type="text" form-title="description" name="description" id="description" class="form-control my-form1" required></textarea>
			</div>

			<div class="col py-2">
				<label for="ingredients">Ingredienti*</label>
				<textarea type="text" form-title="ingredients" name="ingredients" id="ingredients" class="form-control my-form1" required></textarea>
			</div>

			<div class="col mb-3">
				<label for="img" class="form-label">Carica l'immagine</label>
				<input class="form-control" name="img" type="file" id="img">
			</div>

			<div class="col mb-3">
				<label for="price">Inserisci il prezzo</label>
				<input type="number" step="0.01" form-title="price" name="price" id="price" class="form-control my-form1">
			</div>

			<div class="col mb-3">
				<div class="form-check">
					<input class="form-check-input" type="radio" value="0" name="is_visible" checked>
					<label class="form-check-label">
						Non visibile
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" value="1" name="is_visible">
					<label class="form-check-label">
						Visibile
					</label>
				</div>
			</div>

			<div class="col py-2 d-flex">
					@foreach ($categories as $category)
						<div class="form-check">
								<input
								class="form-check-input my-categories"
								type="checkbox"
								value="{{ $category->id }}"
								name="category[]"
								>
								<label class="form-check-label" for="flexCheckDefault">
										<span class="badge rounded-pill mb-3 text-danger">{{$category->name}}</span>
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
					<button type="submit" class="btn btn-primary" id="create-button">Inserisci</button>
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
				for (const error in formErrors) {
						form_error_messages.classList.add("alert", "alert-danger");
						form_error_messages.innerHTML += formErrors[error] + "<br>";
						console.log(formErrors[error])
					}
            };
		let editBtn = document.getElementById('create-button');
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
