@extends('layouts.app')
@section('header')
<div class="page-header">
        <h1>Jugador / {{$jugador->apodo}}</h1>
        <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
	    <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('jugadores.edit', $jugador->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group row">
                    <label for="nome" class="col-sm-2">ID</label>
                    <p class="form-control-static col-sm-10">{{$jugador->id}}</p>
                </div>
                <div class="form-group row">
                     <label for="nombre"class="col-sm-2">NOMBRE</label>
                     <p class="form-control-static col-sm-10">{{$jugador->nombre}}</p>
                </div>
                    <div class="form-group row">
                     <label for="apellido" class="col-sm-2">APELLIDO</label>
                     <p class="form-control-static col-sm-10">{{$jugador->apellido}}</p>
                </div>
                    <div class="form-group row">
                     <label for="apodo" class="col-sm-2">APODO</label>
                     <p class="form-control-static col-sm-10">{{$jugador->apodo}}</p>
                </div>
                    <div class="form-group row">
                     <label for="fechanacimiento" class="col-sm-2">FECHANACIMIENTO</label>
                     <p class="form-control-static col-sm-10">{{$jugador->fechaNacimiento}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('jugadores.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
