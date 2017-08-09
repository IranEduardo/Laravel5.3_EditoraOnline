@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de categorias</h3>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Novo Livro</a>
        </div>

        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>SubTitulo</th>
                    <th>Preço</th>
                    <th>Autor</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->subtitle }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->author != null ? $book->author->name : '' }}</td>
                        <td>
                            <ul class="list-inline">
                                <li><a href="{{route('books.edit', ['book' => $book->id]) }}">Editar</a></li>
                                <li>|</li>
                                <li>
                                    <a href="{{route('books.destroy', ['book' => $book->id]) }}"
                                        onclick="document.getElementById('delete-form-{{$book->id}}').submit(); return false">Excluir</a>
                                    {!! Form::open(['route' => ['books.destroy','book' => $book->id],
                                                    'method' => 'DELETE', 'id' => "delete-form-$book->id", 'class' => 'form', 'style' => 'display:none']) !!}
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $books->links() }}
        </div>
    </div>
@endsection