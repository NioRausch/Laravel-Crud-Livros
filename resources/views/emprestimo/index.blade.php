@extends('layouts.app')
@section('title','Empréstimos')
@section('content')
    <div class="windowFlex">
        <div class="centerList border">
            <h1>Empréstimos</h1>
            @if(Session::has('mensagem'))
                <div class="alert alert-info">
                    {{Session::get('mensagem')}}
                </div>
            @endif
            {{Form::open(['url'=>'emprestimos/buscar','method'=>'GET'])}}
                <div class="row">
                    <div class="col-sm-3">
                        <a class="btn btn-success" href="{{url('emprestimos/create')}}">Novo Empréstimo</a>
                    </div>
                    <div class="col-sm-9">
                        <div class="input-group ml-5">
                            @if($busca !== null)
                                &nbsp;<a class="btn btn-info" href="{{url('emprestimos/')}}">Todos</a>&nbsp;
                            @endif
                            {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                            &nbsp;
                            <span class="input-group-btn">
                                {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                            </span>
                        </div>
                    </div>
                </div>
            {{Form::close()}}
            <br />
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Contato</th>
                        <th>Livro</th>
                        <th>Data</th>
                        <th>Devolução</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emprestimos as $emprestimo)
                            <tr  id="{{$emprestimo->id}}">
                                <td>
                                    {{$emprestimo->id}}
                                </td>
                                <td>
                                    {{$emprestimo->contato_id}} - {{$emprestimo->contato->nome}}
                                </td>
                                <td>
                                    {{$emprestimo->livro_id}} - {{$emprestimo->livro->titulo}}
                                </td>
                                <td>
                                    {{\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')}}
                                </td>
                            </tr>

                            <script>
                                var id = {{$emprestimo->id}};
    
                                $("#" + id).click(function(){
                                    location.href= "emprestimos/" + id
                                })
                            </script>
                        @endforeach
                </tbody>
            </table>
            {{ $emprestimos->links() }}
        </div>
    </div>
@endsection
