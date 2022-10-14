@extends("layouts.app")
@section('content')
    <div class="windowFlex">
        <div class="centerList border">
            <h1>Listagem de livros</h1>

            @if(Session::has('mensagem'))
                <div class="alert alert-info">
                    {{Session::get('mensagem')}}
                </div>
            @endif


            {{Form::open(['url'=>['livros'], 'method' => 'get'])}}
                <div class="row">
                    <div class="col">
                        <button id="add" type="button" class="btn btn-success">Adicionar um livro</button>
                    </div>
                    <div class="input-group col" style="height: 15px">
                            {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                        <span class="input-group-btn" style="margin-left: 15px">
                            {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}

                            <button id="reset" type="button" class="btn btn-warning">Limpar</button>
                        </span>
                    </div>
                </div>
            {{Form::close()}}
           
            <script>
                $("#add").click(function(){ location.href="/livros/create"})
                $("#reset").click(function(){ location.href="/livros"})
            </script>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Ano</th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($livros as $livro)
                        <tr id="{{$livro->id}}">
                            <th scope="row">{{$livro->id}}</th>
                            <td>{{$livro->titulo}}</td>
                            <td>{{$livro->autor}}</td>
                            <td>{{$livro->ano}}</td>
    
                        </tr>

                        <script>
                            var id = {{$livro->id}};

                            $("#" + id).click(function(){
                                location.href= "livros/" + id
                            })
                        </script>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection