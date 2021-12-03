@extends('layouts.template_edit')
@section('content')

@if(isset($errors) &&count ($errors)>0)
<div class="text-center mt-4 mb-4 p-2 alert-danger">
  @foreach ($errors->all() as $erro)
      {{$erro}}<br>
  @endforeach
</div>
@endif

<form class="row g-3" name="formEdit" id="formEdit" method="POST" action="{{url("reembolsos/$reembolso->id")}}">    
    @method('PUT')
    @csrf
    <div class="col-md-2">
        <input type="hidden" name="user_id" id="user_id" value="{{$reembolso->user_id}}">
        <label for="type" class="form-label">Tipo</label>
        <select name="type" id="Type" class="form-select"  disabled="true" required>
            <option value ="{{$reembolso->type}}" selected>{{$reembolso->type}}</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="date" class="form-label">Data</label>
        <input type="date" class="form-control" name="date" id="date" value="{{$reembolso->date}}" disabled="true" required>
      </div>
      <div class="form-group">
          <label for="description" class="form-label">Descrição</label>
          <textarea class="form-control" name="description" id="description" rows="3" disabled="true" required>{{$reembolso->description}}</textarea>
      </div>
    <div class="form-group mt-5">
        <label for="value" class="form-label">Valor</label>
        <input type="number" placeholder="R$ 0,00" name="value" id="value" min="1" step="any" value="{{$reembolso->value}}" required/>
    </div>
    <input class="btn btn-primary col-md-1 ml-2" type="submit" value="Atualizar">
</form>
@endsection