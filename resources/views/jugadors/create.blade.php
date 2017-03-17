@extends('layouts.app')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Jugador / Crear </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('jugadores.store') }}" method="POST" class="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif row">
		       <label for="nombre-field" class="col-form-label col-sm-2">Nombre</label>
		<div class="col-sm-10">
		    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ old("nombre") }}"/>
		</div>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group row @if($errors->has('apellido')) has-error @endif">
                       <label for="apellido-field" class="col-sm-2">Apellido</label>
		<div class="col-sm-10">
                    <input type="text" id="apellido-field" name="apellido" class="form-control" value="{{ old("apellido") }}"/>
		</div>
                       @if($errors->has("apellido"))
                        <span class="help-block">{{ $errors->first("apellido") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('apodo')) has-error @endif row">
                       <label for="apodo-field" class="col-sm-2">Apodo</label>
		<div class="col-sm-10">
                    <input type="text" id="apodo-field" name="apodo" class="form-control" value="{{ old("apodo") }}"/>
		</div>
                       @if($errors->has("apodo"))
                        <span class="help-block">{{ $errors->first("apodo") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fechanacimiento')) has-error @endif row">
                       <label for="fechanacimiento-field" class="col-sm-2">Fecha de Nacimiento</label>
		<div class="col-sm-10">
                    <input type="date" id="fechanacimiento-field" name="fechanacimiento" class="form-control" value="{{ old("fechanacimiento") }}"/>
		</div>
                       @if($errors->has("fechanacimiento"))
                        <span class="help-block">{{ $errors->first("fechanacimiento") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('jugadores.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
