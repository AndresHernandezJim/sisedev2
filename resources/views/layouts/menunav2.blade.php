
@if(Auth::user()->hasRole('Administrador'))
	<li class="footer"><a href="#">ver todas</a></li>
@endif
@if(Auth::user()->hasRole('Oficial de Partes'))
	<li class="footer"><a href="/oficialpartes/notificaciones">ver todas</a></li>
@endif                    
@if(Auth::user()->hasRole('Secretario de Acuerdos'))
	<li class="footer"><a href="/secretarioacuerdo/notificaciones">ver todas</a></li>
@endif                    
@if(Auth::user()->hasRole('Proyectista'))

@endif                    
@if(Auth::user()->hasRole('Actuario'))
	<li class="footer"><a href="/actuario/notificaciones">Ver todas</a></li>
@endif                    
@if(Auth::user()->hasRole('Magistrado'))

@endif                    
@if(Auth::user()->hasRole('Usuario'))
	
@endif                    
@if(Auth::user()->hasRole('Amparos'))
	
@endif                    
@if(Auth::user()->hasRole('Institución'))
	
@endif