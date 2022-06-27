
@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<section class="p-4" style="background-image: url({{asset('img/logo-deliveboo/gallery/hero-bg.png')}})">
		<div class="container-fluid px-5">
			<div class="row justify-content-center">
                <div class="col-12 text-center m-auto pt-3">
                    @if (session('create-message'))
                        <div class="alert alert-success text-white font-weight-bold">
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

					<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
						@foreach ($restaurant as $attribute)
								<img  src="../{{$attribute->logo}}" alt="logo ristorante" class="img-fluid">
								<h4 class="card-title mt-0 "><a herf="#">{{$attribute->name}}</a></h4>
								<small><i class="far fa-clock"></i> {{$attribute->email}}</small>
								<h6 class="my-0 d-block">{{$attribute->address}}</h6>
								<small class="card-meta mb-2">p. iva: {{$attribute->vat_number}}</small>
							@endforeach
					</div>
					<div class="col-lg-8">

						<div class="col-12 pb-4">

							<a href="{{route('admin.foods.create' )}}" class="btn bg-gradient-primary btn-icon">
                                <div class="d-flex align-items-center justify-content-center">
                                    Aggiungi
                                    <i class="fa-solid fa-plus ms-3"></i>
                                </div>
							</a>

							@if (count($foods) > 0)
							<h2>Piatti:</h2>

						</div>

						@foreach ($foods as $food)
						<div class="col-12 d-flex align-items-center pb-4">
                            <div class="avatar me-3 " style="width: 8rem !important; height: 8rem !important" >
                                <img class="rounded-pill" alt="Image placeholder" src="{{ asset($food->img) }}" style="width: 8rem !important; height: 8rem !important; object-fit: cover;">
                            </div>
                            <h3 class="fst-italic">{{$food->name}}</h3>
							<div class="d-flex align-items-center ms-3">
								<a href="{{route('admin.foods.show', $food)}}">
									<i class="fa-solid fa-eye"></i>
								</a>
								<a href="{{route('admin.foods.edit', $food)}}">
									<i class="fa-solid fa-pencil mx-3 text-danger"></i>
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
		</div>
	</section>
@endsection

@section('script')

<script src="{{asset('js/admin.js')}}"></script>

@endsection
