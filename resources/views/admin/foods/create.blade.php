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
					<ul class="alert alert-danger text-white font-weight-bold">
							@foreach ( $errors->all() as $error)
									<li>{{ $error }}</li>
							@endforeach
					</ul>
					@endif
			</div>
			<div id="errors"></div>

			<div class="col-md-6 col-sm-10">
                <div class="input-group input-group-static mb-4">
					<label for="name">Titolo*</label>
					<input type="text" form-title="name" name="name" id="name" class="form-control my-form1" required>
                </div>
			</div>

			<div class="col-md-6 col-sm-10 py-2">
                <div class="input-group input-group-static mb-4">
                    <label for="description">Descrizione*</label>
                    <textarea type="text" form-title="description" name="description" id="description" class="form-control my-form1" required></textarea>
                </div>
            </div>

			<div class="col-md-6 col-sm-10 py-2">
                <div class="input-group input-group-static mb-4">
                    <label for="ingredients">Ingredienti*</label>
                    <textarea type="text" form-title="ingredients" name="ingredients" id="ingredients" class="form-control my-form1" required></textarea>
                </div>
			</div>

			<div class="col-md-6 col-sm-10 mb-3">
                <div class="breadcrumb  mb-4">
                    <label for="img" class="form-label">Carica l'immagine</label>
                    <input class=" breadcrumb-item btn bg-gradient-primary  text-white w-auto me-2" name="img" type="file" id="img">
                </div>
			</div>

			<div class="col-md-6 col-sm-10 mb-3">
                <div class="input-group input-group-static mb-4">
                    <label for="price">Inserisci il prezzo</label>
                    <input type="number" step="0.01" form-title="price" name="price" id="price" class="form-control my-form1">
                </div>
			</div>

			<div class="col-md-6 col-sm-10 mb-3">
				<div class="form-check input-group-static mb-4 ">
					<input class="form-check-input" type="radio" value="0" name="is_visible" checked>
					<label class="form-check-label">
						Non visibile
					</label>
				</div>
				<div class="form-check input-group-static mb-4">
					<input class="form-check-input" type="radio" value="1" name="is_visible">
					<label class="form-check-label">
						Visibile
					</label>
				</div>
			</div>

			<div class="col-md-6 col-sm-10 py-2 d-flex flex-wrap">
					@foreach ($categories as $category)
						<div class=" form-check input-group-static mb-4">
								<input
								class="form-check-input my-categories"
								type="checkbox"
								value="{{ $category->id }}"
								name="category[]"
								required
								>
								<label class="form-check-label" for="flexCheckDefault">
										<span class="badge rounded-pill mb-3 text-danger ps-0">{{$category->name}}</span>
								</label>
						</div>
					@endforeach
			</div>

			<div class="col mb-3 ">
				<select
				class="form-select bg-primary text-white fw-bold"
				name="course_id"
				>

					@foreach ($courses as $course)
						<option class="btn bg-gradient-secondary w-auto me-2" value="{{$course->id}}">{{$course->name}} <i class="fa-solid fa-angle-down"></i></option>
					@endforeach
				</select>
			</div>

			<div class="col text-center py-3">
					<button type="submit" class="btn btn-success" id="create-button">Inserisci</button>
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

		let formInputs = document.querySelectorAll('.my-form1');


		function checkFormErrors() {

				form_error_messages.innerHTML = "";

				if (foodForm.name.trim() == "") formErrors.name = "Il nome non è valido.";
				if (foodForm.description.trim() == "") formErrors.description = "La descrizione non è valida.";
				if (foodForm.ingredients.trim() == "") formErrors.ingredients = "Ingredienti non validi.";
				if (isNaN(foodForm.price) || foodForm.price <= 0) formErrors.price = "Il prezzo non è valido.";

				let isChecked = false;

				for (let i = 0; i < categories.length; i++) {
					if(categories[i].checked){
						isChecked = true;
					}
				}

				if (isChecked) {
					console.log('è checked');
					for (let i = 0; i < categories.length; i++) {
						categories[i].required = false;
					}
				} else {
					formErrors.categories = "Devi selezionare almeno una categoria.";
					console.log('non è checked');
					for (let i = 0; i < categories.length; i++) {
						categories[i].required = true;
					}
				}

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
			window.scrollTo({top: 0,behavior: "smooth"});

		})

</script>
@endsection
