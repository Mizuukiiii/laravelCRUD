@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Recepty</h1>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Uživatel</th>
                <th scope="col">Název</th>
                <th scope="col">Kategorie</th>
                <th scope="col">Doba přípravy</th>
                <th scope="col">Akce</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->user->name }}</td>
                    <td>
                        <a href="{{ route('recipes.show', ['recipe' => $recipe->id]) }}">{{ $recipe->title }}</a>
                    </td>
                    <td>{{ $recipe->category->name }}</td>
                    <td>{{ $recipe->cooking_time }}</td>
                    <td>
                        @if ($recipe->isMine)
                            <a href="{{ route('recipes.edit', ['recipe' => $recipe->id]) }}" class="btn btn-primary">Upravit</a>
                            <form action="{{ route('recipes.destroy', ['recipe' => $recipe->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Odstranit</button>
                            </form>
                        @else
                            <span class="btn btn-primary disabled">Upravit</span>
                            <span class="btn btn-danger disabled">Odstranit</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
