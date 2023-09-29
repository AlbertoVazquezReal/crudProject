@extends('leads.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Añadir nuevo lead</h2>
        </div><br/>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ha occurrido un error al introducir el dato.</strong><br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('leads.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Teléfono:</strong>
                <input type="text" name="phone" class="form-control" placeholder="Teléfono" value="{{ old('phone') }}">
            </div>
        </div>
        </div><br/>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center pull-right">
              <button type="submit" class="btn btn-dark">Enviar</button>
              <a class="btn btn-secondary" href="{{ route('leads.index') }}"> Volver</a>
            </div>
</form>
@endsection