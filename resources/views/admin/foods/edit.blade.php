@extends('layouts.app')

@section('title', 'Modifica il piatto')

@section('content')

<section class="container-fluid p-5" id="add-form">
	<div class="row">
		<div class="col-12 mb-3">
			<a href="{{ route('admin.foods.index') }}" class="btn btn-secondary btn-sm" tabindex="-1" role="button" aria-disabled="true">Back</a>
		</div>
	</div>

	<form id="form-edit-section" class="row row-cols-4 g-3 flex-column align-items-center" action="{{ route("admin.foods.update", $foodItem )}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
				<div class="col">
						<h2>
								Modifica
						</h2>

				</div>
					@if ( $errors->any() )
                    <div class="alert alert-danger text-white font-weight-bold">
                        <ul class="alert alert-danger text-white font-weight-bold">
                                @foreach ( $errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach
                        </ul>
                    </div>
					@endif

			<div id="errors" ></div>
            <div class="col-md-6">
                <div class="input-group input-group-static mb-4 ">
                        <label for="name">Nome*</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control my-form1"
                            form-title="name"
                            value="{{ old('name', $foodItem->name ) }}"
                            required
                        >
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label for="description" class="">Descrizione*</label>
                    <textarea
                        type="text"
                        name="description"
                        id="description"
                        class="form-control  my-form1"
                        form-title="description"
                        value="{{ old('description', $foodItem->description ) }}"
                        required
                    >{{ old('description', $foodItem->description ) }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label for="ingredients">Ingredienti*</label>
                    <input
                        type="text"
                        name="ingredients"
                        id="ingredients"
                        class="form-control my-form1"
                        form-title="ingredients"
                        value="{{ old('ingredients', $foodItem->ingredients ) }}"
                        required
                        >
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <img
                        class="w-100"
                        src="{{ str_starts_with($foodItem->img, 'img') ? asset($foodItem->img) : asset('storage') . '/' . $foodItem->img }}"
                        alt="image of {{$foodItem->name}}"
                    >
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb  mb-4">
                        <label for="img" >Carica l'immagine</label>
                        <input
                            type="file"
                            name="img"
                            id="img"
                            class=" breadcrumb-item form-control btn bg-gradient-primary text-white"
                            value="{{ old('img',$foodItem->img ) }}"
                        >
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label for="price">Inserisci il prezzo*</label>
                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        id="price"
                        class="form-control my-form1"
                        form-title="price"
                        value="{{ old('price', $foodItem->price) }}"
                        required
                    >
                </div>
            </div>
            <div class="col-md-3">
                <div class="breadcrumb mb-4">
                    <h5>Portata*</h5>
                    <select
                    class="form-select p-2 "
                    name="course_id"
                    >
                    @foreach ($courses as $course)
                        <option
                            value="{{old( 'course_id', $course->id)}}"
                            {{ $foodItem->course_id === $course->id ? "selected='selected'" : '' }}
                        >
                            {{$course->name}}
                    </option>
                    @endforeach
                    </select>
            </div>
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
				required
				>
				<label class="form-check-label" for="flexCheckDefault">
					<span class="badge rounded-pill mb-3 text-danger">{{$category->name}}</span>
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
					<button type="submit" id="edit-button" class="btn btn-success ">Modifica il piatto</button>
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


		const form_error_messages = document.getElementById("errors");

		const categories = document.querySelectorAll(".my-categories");


		let formInputs = document.querySelectorAll('.my-form1');

		function checkFormErrors() {

				let formErrors = {};

				form_error_messages.innerHTML = "";

				for (let i = 0; i < formInputs.length; i++) {
					let key = keys[i];
					if (formInputs[i].getAttribute("form-title") == key){
							foodForm[key] = formInputs[i].value;
					}
				}

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

				if ( Object.keys(formErrors).length){
					console.log(Object.keys(formErrors).length);
					for (const error in formErrors) {
						form_error_messages.classList.add("alert", "alert-danger", "text-white", "font-weight-bold");
						form_error_messages.innerHTML += formErrors[error] + "<br>";
						console.log(formErrors[error])
					}
        } else {
					form_error_messages.classList.add("d-none");
				}

		};

		let editBtn = document.getElementById('edit-button');

		editBtn.addEventListener('click', function(){
				checkFormErrors();
        window.scrollTo({top: 0,behavior: "smooth"});
		})

</script>
@endsection
