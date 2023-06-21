@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Upravit kategorii {{$category->name}}</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Název kategorie</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Aktualizovat kategorii</button>
        </form>
    </div>
@endsection
