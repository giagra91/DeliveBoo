@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<section>
		<h2>{{$foodItem->name}}</h2>
		<p>{{$foodItem->description}}</p>
		<p>{{$foodItem->price}}</p>
		<p>{{$foodItem->ingredients}}</p>
	</section>
@endsection