@extends('layouts.app')

@section('title', 'Home')

@section('content')

	<section class="p-4">
		<a href="{{route('admin.foods.index')}}">Tutti i piatti</a>
		<h2>{{$foodItem->name}}</h2>
		<p>{{$foodItem->description}}</p>
		<p>{{$foodItem->price}}</p>
		<p>{{$foodItem->ingredients}}</p>
	</section>
@endsection