
@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<section class="p-4">
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
		<button id="fire">test</button>
	</section>
@endsection

@section('script')
    <script defer>
        // const deleteForms = document.querySelectorAll(".delete-form");
        // console.log(deleteForms);
        // deleteForms.forEach(singleForm => {
        //     singleForm.addEventListener("submit", function(event){
        //         event.preventDefault(); // Blocco l'invio del form
        //         userConfirmation = window.confirm(`Vuoi davvero cancellare il post ${this.getAttribute(`post-title`)}?`);
        //         if(userConfirmation){
        //             this.submit();
        //         }
        //     });
        // });
		document.getElementById("fire").addEventListener("submit", function(event){
			event.preventDefault();
			Swal.fire({
				title: "error",
				text:"test",
				icon:"error",
				confirmButtonText: "Cool"
			})
		})
    </script>
	
@endsection