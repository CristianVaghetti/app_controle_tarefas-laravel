@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarefas <a href="{{route('tarefa.create')}}" class="float-right">Nova tarefa</a></div>
                <div class="card-body">                
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data Limite</th>
                                <th></th>
                                <th></th>                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tarefas as $key => $value)
                                <tr>
                                    <th scope="row">{{$value['id']}}</th>
                                    <td>{{$value['tarefa']}}</td>
                                    <td>{{date('d/m/Y', strtotime($value['data_limite']))}}</td>
                                    <td>
                                        <a href="{{route('tarefa.edit', $value['id'])}}">Editar</a>
                                    </td>
                                    <td>
                                        <form id="form_{{$value['id']}}" method="post" action="{{route('tarefa.destroy', ['tarefa' => $value['id']])}}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <a href="#" onclick="document.getElementById('form_{{$value['id']}}').submit()">Excluir</a>
                                    </td>
                                </tr>          
                            @endforeach                   
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="{{$tarefas->previousPageUrl()}}">Anterior</a></li>
                            @for($i = 1; $i <= $tarefas->lastPage(); $i++)
                            <li class="page-item {{$tarefas->currentPage() == $i ? 'active' : ''}}"><a class="page-link" href="{{$tarefas->url($i)}}">{{$i}}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{$tarefas->nextPageUrl()}}">Próximo</a></li>
                        </ul>
                    </nav>         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
