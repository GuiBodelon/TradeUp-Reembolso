@extends('layouts.template_visualizar')
@section('content')
    

    <div class="col-8 m-1 text-left">
        @php
            $user=$reembolso->find($reembolso->id)->relUsers;
        @endphp
        ID Reembolso: {{$reembolso->id}} <br>        
        ID Usuário: {{$user->id}} <br>
        Nome: {{$user->name}} <br>
        Tipo de Reembolso: {{$reembolso->type}} <br>
        Data: {{$reembolso->date}} <br>
        Descrição: {{$reembolso->description}} <br>
        Valor: R$ {{$reembolso->value}} <br>
        Criado Em:{{$reembolso->created_at}} <br>   
        Comprovante: {{$reembolso->refund_image}}
        <img src="{{url("public/images/reembolsos/$reembolso->refund_image")}}" alt="Comprovante" width="80" height="120">
    </div>
    
@endsection