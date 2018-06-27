@if(Auth::user()->hasRole('Administrador'))
	<a href="/admin/perfil/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil del usuario</a>
@endif
@if(Auth::user()->hasRole('Oficial de Partes'))
		<a href="/oficialpartes/perfil/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil del usuario</a>
@endif                    
@if(Auth::user()->hasRole('Secretario de Acuerdos'))
	<a href="/secretarioacuerdo/perfil/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil del usuario</a>
@endif                    
@if(Auth::user()->hasRole('Proyectista'))
	<a href="/proyectista/perfil/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil del usuario</a>
@endif                    
@if(Auth::user()->hasRole('Actuario'))
	<a href="/actuario/perfil/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil del usuario</a>
@endif                    
@if(Auth::user()->hasRole('Magistrado'))
	<a href="/magistrado/perfil/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil del usuario</a>
@endif                    
@if(Auth::user()->hasRole('Usuario'))
	<a href="/user/perfil/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil del usuario</a>
@endif                    
@if(Auth::user()->hasRole('Amparos'))
	<a href="/amparos/perfil/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil del usuario</a>
@endif                    
@if(Auth::user()->hasRole('Institución'))
	<a href="/institucion/perfil/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil del usuario</a>
@endif