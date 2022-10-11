@extends("layouts.app")
@section('content')

    <div class="windowFlex">
        <div class="centerForm border">
            <h1><b>{{$livro->titulo}}</b></h1>
            <br/>
            <h3>Informações sobre o livro</h3>
            <p>Autor: <b>{{$livro->autor}}</b></p>
            <p>Editora: <b>{{$livro->editora}}</b></p>
            <p>Ano de publicação: <b>{{$livro->ano}}</b></p>
            <h3>Sobre</h3>
            <p>{{$livro->descricao}}</p>

            <br>
            {{Form::open(['route' => ['livros.destroy',$livro->id],'method' => 'DELETE'])}}
                <a href="{{url('livros/'.$livro->id.'/edit')}}" class="btn btn-success">Alterar</a>
                {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
                <a href="{{url('livros/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
            <br>
            @if(Session::has('mensagem'))
                <div class="alert alert-success">
                    {{Session::get('mensagem')}}
                </div>
            @endif
        </div>
    </div>
   
@endsection