
@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<section class="p-4">
        @foreach ($restaurant as $attribute)
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <img  src="../{{$attribute->logo}}" alt="logo ristorante">
                    <h4 class="card-title mt-0 "><a herf="#">{{$attribute->name}}</a></h4>
                    <small><i class="far fa-clock"></i> {{$attribute->email}}</small>
                    <h6 class="my-0 d-block">{{$attribute->address}}</h6>
                    <small class="card-meta mb-2">p. iva: {{$attribute->vat_number}}</small>
                </div>
            </div>
        </div>
        @endforeach


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
			<div class="col-6 text-center m-auto">
						@if (session('delete-message'))
										<div class="alert alert-danger">
												{{ session('delete-message')}}
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
