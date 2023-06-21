@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Upravit recept</h1>

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="category_id">Kategorie</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Název</label>
                <input type="text" name="title" id="title" value="{{ $recipe->title }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Popis</label>
                <textarea name="description" id="description" rows="1" class="form-control" required>{{ $recipe->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="cooking_time">Čas připravy</label>
                <input type="text" name="cooking_time" id="cooking_time" value="{{ $recipe->cooking_time }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="instruction">Instrukce</label>
                <textarea name="instruction" id="instruction" rows="4" class="form-control" required>{{ $recipe->instruction }}</textarea>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredience</label>
                <textarea name="ingredients" id="ingredients" rows="2" class="form-control" required>{{ $recipe->ingredients }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Upravit</button>
        </form>
    </div>
@endsection
