@extends('layouts.app')

@section('title', 'Home')

@section('content')

	<section class="p-4 container-fluid">
		<div class="row px-5">
			<div class="col-12 mb-5">
				<a href="{{route('admin.foods.index')}}">Tutti i piatti</a>
			</div>
			<div class="col-12 col-lg-6 text-center swing-entrance">
				<img
					class="img-fluid rounded-3 w-50 my-shadow"
					src="{{ str_starts_with($foodItem->img, 'img') ? asset($foodItem->img) : asset('storage') . '/' . $foodItem->img }}"
					alt="image of {{$foodItem->name}}"
				>
			</div>
			<div class="col-12 col-lg-6">
				<h2>{{$foodItem->name}}</h2>
				<p>{{$foodItem->description}}</p>
				<p>&euro;{{$foodItem->price}}</p>
				<p class="fst-italic">Ingredienti: {{$foodItem->ingredients}}</p>
			</div>
		</div>
	</section>
@endsection