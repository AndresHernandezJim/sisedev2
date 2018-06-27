@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('Administrador'))
                    <div>Acceso como administrador</div>
                    @endif
                    @if(Auth::user()->hasRole('Oficial de Partes'))
                    <div>Acceso como Oficial de Partes</div>
                    @endif                    
                    @if(Auth::user()->hasRole('Secretario de Acuerdos'))
                    <div>Acceso como Secretario de Acuerdos</div>
                    @endif                    
                    @if(Auth::user()->hasRole('Proyectista'))
                    <div>Acceso como Proyectista</div>
                    @endif                    
                    @if(Auth::user()->hasRole('Actuario'))
                    <div>Acceso como Actuario</div>
                    @endif                    
                    @if(Auth::user()->hasRole('Magistrado'))
                    <div>Acceso como Magistrado</div>
                    @endif                    
                    @if(Auth::user()->hasRole('Usuario'))
                    <div>Acceso como Usuario</div>
                    @endif                    
                    @if(Auth::user()->hasRole('Amparos'))
                    <div>Acceso como Oficial de Amparos</div>
                    @endif                    
                    @if(Auth::user()->hasRole('Institución'))
                    <div>Acceso como Institución</div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
