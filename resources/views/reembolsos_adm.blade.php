@extends('layouts.template_reembolsos_adm')
@section('content')

    <div class="text-left mb-4 ml-4">
        <a href="{{url('reembolsos/create')}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
    @csrf
    <table class="table text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">ID Usuário</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Data de Criação</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reembolso as $reembolsos)
                @php
                    $user=$reembolsos->find($reembolsos->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$reembolsos->id}}</th>
                    <td class="text-left">{{$user->name}}</td>
                    <td class="text-left">{{$user->id}}</td> 
                    <td class="text-left">{{$reembolsos->type}}</td>                     
                    <td>{{$reembolsos->date}}</td>
                    <td class="text-left">{{$reembolsos->description}}</td>
                    <td>R$ {{$reembolsos->value}}</td>
                    <td>{{$reembolsos->created_at}}</td>
                    <td>
                        <a href="{{url("reembolsos/$reembolsos->id")}}">
                            <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                              </svg></button>
                        </a>
                        <a href="{{url("reembolsos/$reembolsos->id/edit")}}">
                            <button class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                              </svg></button>
                        </a>
                        <form style="display: inline-block;" method="POST" action="{{url("reembolsos/$reembolsos->id")}}">
                            @csrf
                            @method('DELETE')
                            @php
                                $user=$reembolsos->find($reembolsos->id)->relUsers;
                            @endphp
                            <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                              </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$reembolso->links()}}
@endsection