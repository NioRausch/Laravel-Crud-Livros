@extends("layouts.app")
@section('content')

    <div class="windowFlex">
        <div class="centerForm border">
            <h1>Editar de livro</h1>
            <br />
            {{Form::open(['route' => ['livros.update',$livro->id], 'method' => 'PUT'])}}
                {{Form::label('titulo', 'Titulo')}}
                {{Form::text('titulo','',['class'=>'form-control','required','placeholder'=>'Titulo do livro', 'maxlength'=>'200'])}}
                
                {{Form::label('autor', 'Autor')}}
                {{Form::text('autor','',['class'=>'form-control','required','placeholder'=>'Autor do livro', 'maxlength'=>'200'])}}
                
                {{Form::label('editora', 'Editora')}}
                {{Form::text('editora','',['class'=>'form-control','required','placeholder'=>'Editora do livro', 'maxlength'=>'100'])}}

                {{Form::label('ano', 'Ano')}}
                {{Form::number('ano','',['class'=>'form-control','required'])}}

                {{Form::label('descricao', 'Descricao')}}
                {{Form::textarea('descricao','',['class'=>'form-control','required', 'placeholder'=>"Descrição sobre o livro"])}}
                <br />
                {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
                {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
            {{Form::close()}}

            @if(Session::has('mensagem'))
                <div class="alert alert-success">
                    {{Session::get('mensagem')}}
                </div>
            @endif
        </div>
    </div>
            
@endsection