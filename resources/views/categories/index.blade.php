@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de categorias</h3>
            {!! Button::primary('Nova Categoria')->asLinkTo(route('categories.create')) !!}
        </div>

        <div class="row">

            {!!
               Table::withContents($categories->items())->striped()
                    ->callback('Ações', function($field, $category) {

                           $form =  Form::open(['route' => ['categories.destroy','category' => $category->id],
                                                'method' => 'DELETE', 'id' => "delete-form-{$category->id}", 'class' => 'form', 'style' => 'display:none']);
                           $LinkEdit    = Button::link('Editar')->asLinkTo(route('categories.edit', ['category' => $category->id]));
                           $LinkDestroy = Button::link('Excluir')->asLinkTo(route('categories.destroy', ['category' => $category->id]))
                                           ->addAttributes([
                                                     'onclick' => "document.getElementById(\"delete-form-$category->id\").submit(); return false"
                                            ]);
                           $formClose =  Form::close();

                           return
                                "<ul class=\"list-inline\">" .
                                      "<li>" . $LinkEdit . "</li>" .
                                      "<li>|</li>" .
                                      "<li>" . $LinkDestroy . $form . $formClose .
                                       "</li>" .
                                "</ul>";

                   })
             !!}

            {{ $categories->links() }}
        </div>
    </div>
@endsection