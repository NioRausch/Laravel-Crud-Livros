@extends('layouts.app')
@section('title','Listagem de Contatos')
@section('content')
    <div class="windowFlex">
        <div class="centerList border">
            <h1>Listagem de Contatos</h1>
            @if(Session::has('mensagem'))
                <div class="alert alert-info">
                    {{Session::get('mensagem')}}
                </div>
            @endif

            <br />
            {{Form::open(['url'=>['contatos/buscar']])}}
                <div class="row">
                    <div class="col">
                        <a class="btn btn-success" href="{{url('contatos/create')}}">Criar</a>
                    </div>
                    <div class="input-group col">
                            {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                        <span class="input-group-btn">
                            {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                        </span>
                    </div>
                </div>
            {{Form::close()}}
            <br /><br />
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($contatos as $contato)
                        <tr id="{{$contato->id}}">
                            <td>{{$contato->nome}}</td>
                            <td>{{$contato->email}}</td>
                        </tr>

                        <script>
                            var id = {{$contato->id}};

                            $("#" + id).click(function(){
                                location.href= "contatos/" + id
                            })
                        </script>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
