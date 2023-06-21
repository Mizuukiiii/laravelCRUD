@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kategorie</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Název</th>
                <th scope="col">Akce</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if(session('user_name'))
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Upravit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Opravdu chcete odstranit?')">Odstranit</button>
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
