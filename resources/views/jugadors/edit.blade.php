@extends('layouts.app')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Jugador / Editar #{{$jugador->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                       <label for="nombre-field">Nombre</label>
                    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ is_null(old("nombre")) ? $jugador->nombre : old("nombre") }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('apellido')) has-error @endif">
                       <label for="apellido-field">Apellido</label>
                    <input type="text" id="apellido-field" name="apellido" class="form-control" value="{{ is_null(old("apellido")) ? $jugador->apellido : old("apellido") }}"/>
                       @if($errors->has("apellido"))
                        <span class="help-block">{{ $errors->first("apellido") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('apodo')) has-error @endif">
                       <label for="apodo-field">Apodo</label>
                    <input type="text" id="apodo-field" name="apodo" class="form-control" value="{{ is_null(old("apodo")) ? $jugador->apodo : old("apodo") }}"/>
                       @if($errors->has("apodo"))
                        <span class="help-block">{{ $errors->first("apodo") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fechanacimiento')) has-error @endif">
                       <label for="fechanacimiento-field">Fecha de Nacimiento</label>
                    <input type="date" id="fechanacimiento-field" name="fechanacimiento" class="form-control" value="{{ is_null(old("fechanacimiento")) ? $jugador->fechaNacimiento : old("fechanacimiento") }}"/>
                       @if($errors->has("fechanacimiento"))
                        <span class="help-block">{{ $errors->first("fechanacimiento") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('jugadores.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
