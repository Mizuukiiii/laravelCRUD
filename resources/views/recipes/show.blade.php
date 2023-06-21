@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Detail receptu {{$recipe->title}}</h1>


        <p><strong>Kategorie:</strong> {{ $recipe->category->name }}</p>
        <p><strong>Autor:</strong> {{ $recipe->user->name }}</p>
        <p><strong>Doba přípravy:</strong> {{ $recipe->cooking_time }}</p>
        <p><strong>Ingredience:</strong> {{ $recipe->ingredients }}</p>
        <p><strong>Popis:</strong> {{ $recipe->description }}</p>
        <p><strong>Instrukce:</strong> {{ $recipe->instruction }}</p>



        <a href="{{ route('recipes.index') }}" class="btn btn-primary">Zpět na seznam</a>
    </div>
@endsection
