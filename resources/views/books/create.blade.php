@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <h3>Novo Livro</h3>

            {!! Form::open(['route' => 'books.store', 'class' => 'form']) !!}

                {!! Html::openFormGroup('title', $errors) !!}
                     {!! Form::label('title', 'Titulo', ['class' => 'control-label']) !!}
                     {!! Form::text('title', null, ['class' => 'form-control']) !!}
                     {!! Form::error('title', $errors) !!}
                {!! Html::closeFormGroup() !!}

                {!! Html::openFormGroup('subtitle', $errors) !!}
                    {!! Form::label('subtitle', 'SubTitulo', ['class' => 'control-label']) !!}
                    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
                    {!! Form::error('subtitle', $errors) !!}
                {!! Html::closeFormGroup() !!}

                {!! Html::openFormGroup('price', $errors) !!}
                    {!! Form::label('price', 'Preço', ['class' => 'control-label']) !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                    {!! Form::error('price', $errors) !!}
                {!! Html::closeFormGroup() !!}

                {!! Html::openFormGroup('authors', $errors) !!}
                   {!! Form::label('author', 'Autor', ['class' => 'control-label']) !!}
                   <br>
                   {!! Form::select('author_id', $authors, 1) !!}
                {!! Html::closeFormGroup() !!}


                {!! Html::openFormGroup() !!}
                     {!! Form::submit('Criar Livro', ['class' => 'btn btn-primary']) !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
