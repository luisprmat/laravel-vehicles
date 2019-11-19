@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">Panel administrativo - {{ config('app.name', 'Vehicles') }}.</div>

                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('vehicles.index') }}">Ver listado</a></li>
                        <li><a href="#">Ingresar nuevo</a></li>
                        <li><a href="{{ route('vehicles.upload') }}">Subir masivamente desde archivo</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Panel administrativo - <strong>{{ Auth::user()->name }}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Cerrar</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->previous_logged_at)
                        Accediste por última vez <i>{{ Carbon\Carbon::parse(Auth::user()->previous_logged_at)->diffForHumans() }}</i>
                    @else
                        Bienvenido(a): Es la primera vez que accedes a nuestro sistema.
                    @endif

                    <ul>
                        <li><a href="{{ route('password.change') }}">Cambiar contraseña</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
