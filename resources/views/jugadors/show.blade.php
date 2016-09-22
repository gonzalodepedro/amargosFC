@extends('layout')
@section('header')
<div class="page-header">
        <h1>Jugadors / Show #{{$jugador->id}}</h1>
        <form action="{{ route('jugadors.destroy', $jugador->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('jugadors.edit', $jugador->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="nombre">NOMBRE</label>
                     <p class="form-control-static">{{$jugador->nombre}}</p>
                </div>
                    <div class="form-group">
                     <label for="apellido">APELLIDO</label>
                     <p class="form-control-static">{{$jugador->apellido}}</p>
                </div>
                    <div class="form-group">
                     <label for="apodo">APODO</label>
                     <p class="form-control-static">{{$jugador->apodo}}</p>
                </div>
                    <div class="form-group">
                     <label for="fechanacimiento">FECHANACIMIENTO</label>
                     <p class="form-control-static">{{$jugador->fechanacimiento}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('jugadors.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection