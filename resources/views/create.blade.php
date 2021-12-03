@extends('layouts.template_create')
@section('content')

@if(isset($errors) &&count ($errors)>0)
<div class="text-center mt-4 mb-4 p-2 alert-danger">
  @foreach ($errors->all() as $erro)
      {{$erro}}<br>
  @endforeach
</div>
@endif

@if (session('status'))
<h6 class="alert alert-success">{{session('status')}}</h6>
@endif

<script src="{{url('assets/jquery/jquery.min.js')}}" defer></script>

<form class="row g-3" name="formCad" id="formCad" method="POST" enctype="multipart/form-data" action="{{url('reembolsos')}}">
    @csrf
    <div class="col-md-2">
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
        <label for="type" class="form-label">Tipo</label>
        <select name="type" id="Type" class="form-select" required>
            <option value ="" selected>Selecione o Tipo...</option>
            <option value ="Viajens" >Viajens</option>
            <option value ="Refeições" >Refeições</option>
            <option value ="Uber" >Uber</option>
            <option value ="Abastecimento" >Abastecimento</option>
            <option value ="Hotelaria" >Hotelaria</option>
        </select>
        <span class="text-danger error-text type_error"></span>
    </div>
    <div class="col-md-2">
      <label for="date" class="form-label">Data</label>
      <input type="date" class="form-control" name="date" id="date" required>
      <span class="text-danger error-text date_error"></span>
    </div>
    <div class="form-group">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
        <span class="text-danger error-text description_error"></span>
    </div>
    <div class="form-group mt-5">
        <label for="value" class="form-label">Valor</label>
        <input type="number" placeholder="R$ 0,00" name="value" id="value" min="1" step="any" required/>
        <span class="text-danger error-text value_error"></span>
    </div>
    <input type="time hidden" name="timestamp" step="1">
    <div class="form-group pt-10 pb-3">
        <label for="inputComprovante" class="form-label">Inserir Comprovantes:</label><br>
        <input type="file" class="form-control" name="refund_image" id="refund_image" aria-describedby="inputComprovante" aria-label="Upload">
        <span class="text-danger error-text refund_error"></span>
    </div>
    <input class="btn btn-primary col-md-1 ml-2" type="submit" value="Cadastrar">
</form>
@endsection