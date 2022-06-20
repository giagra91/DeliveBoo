
@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<section class="p-4">
		<div class="container-fluid px-5">
			<div class="row justify-content-center">

					<div class="col-12 text-center m-auto pt-3">
						@if (session('create-message'))
											<div class="alert alert-success">
															{{ session('create-message')}}
											</div>
						@endif
					</div>

					<div class="col-12 text-center m-auto">
						@if (session('edit-message'))
										<div class="alert alert-warning">
												{{ session('edit-message')}}
										</div>
						@endif
					</div>

					<div class="col-12 text-center m-auto">
								@if (session('delete-message'))
												<div class="alert alert-danger">
														{{ session('delete-message')}}
												</div>
								@endif
					</div>

					@foreach ($restaurant as $attribute)
					<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
							<img  src="../{{$attribute->logo}}" alt="logo ristorante">
							<h4 class="card-title mt-0 "><a herf="#">{{$attribute->name}}</a></h4>
							<small><i class="far fa-clock"></i> {{$attribute->email}}</small>
							<h6 class="my-0 d-block">{{$attribute->address}}</h6>
							<small class="card-meta mb-2">p. iva: {{$attribute->vat_number}}</small>
					</div>
					@endforeach
					
					<div class="col-12 pb-4">

						<a href="{{route('admin.foods.create' )}}">
							Aggiungi<i class="fa-solid fa-plus pb-4 ms-2"></i>
						</a>

						@if (count($foods) > 0)
						<h2>Piatti:</h2>

					</div>

					@foreach ($foods as $food)
					<div class="col-12 d-flex align-items-center pb-4">
						<h3 class="fst-italic">{{$food->name}}</h3>
						<div class="d-flex align-items-center ms-3">
							<a href="{{route('admin.foods.show', $food)}}">
								<i class="fa-solid fa-eye"></i>
							</a>
							<a href="{{route('admin.foods.edit', $food)}}">
								<i class="fa-solid fa-pencil mx-3"></i>
							</a>

							<form
							action="{{route('admin.foods.destroy', $food )}}"
							method="post"
							class="delete-form"
							dish-title="{{$food->name}}"
							>
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-outline-danger">
								<i class="fa-solid fa-trash-can"></i>
							</button>
							</form>
						</div>
					</div>
					@endforeach

						@else
							<h5>Non ci sono piatti</h5>
						@endif

			</div>
		</div>
	</section>
@endsection

@section('script')

<script src="{{asset('js/admin.js')}}"></script>

@endsection
