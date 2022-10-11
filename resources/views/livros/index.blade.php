@extends("layouts.app")
@section('content')
    <div class="windowFlex">
        <div class="centerList border">
            <h1>Listagem de livros</h1>
            <button id="add" type="button" class="btn btn-primary">Adicionar um livro</button>

            <script>
                $("#add").click(function(){ location.href="/livros/create"})
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