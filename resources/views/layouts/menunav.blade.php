@if(Auth::user()->hasRole('Administrador'))
<div>Acceso como administrador</div>
@endif
@if(Auth::user()->hasRole('Oficial de Partes'))
	<li><a href="/oficialpartes/demanda"><i class="fa fa-list"></i> <span>Demandas</span></a></li>
	<li><a href="/oficialpartes/notificaciones"><i class=" fa fa-envelope"> </i> <span>Notificaciones</span></a></li>
	<!-- <li><a href="#!"><i class=" fa fa-envelope"> </i> <span>Notificaciones</span></a></li> -->
	<li><a href="/oficialpartes/seguimiento"><i class="fa fa-map-marker"></i> <span>Seguimiento</span></a></li>
	<li class="treeview">
	  <a href="#">
	    <i class="fa  fa-users"></i>
	    <span>usuarios</span>
	    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
	  </a>
	  <ul class="treeview-menu">
	    <li><a href="/oficialpartes/newuser"><i class="fa fa-user-plus"></i> Registro de Usuarios</a></li>
	    <li><a href="/oficialpartes/usersearch"><i class="fa fa-search"></i> <span>Busqueda de Usuarios</span></a></li>
	  </ul>
	</li>
@endif                    
@if(Auth::user()->hasRole('Secretario de Acuerdos'))
	<li><a href="/secretarioacuerdo/acuerdos/"><i class="fa fa-file-text"></i><span>Acuerdos</span></a></li>
	<li><a href="/secretarioacuerdo/notificaciones"><i class="fa fa-envelope"></i><span>Notificaciones</span></a></li>
	<li><a href="/secretarioacuerdo/seguimiento"><i class="fa fa-map-marker"></i><span>Seguimiento</span></a></li>
	<li><a href="#"><i class="fa fa-legal"></i><span>Sentencias</span></a></li>
@endif                    
@if(Auth::user()->hasRole('Proyectista'))
	<li class="treeview">
	  <a href="#">
	    <i class="fa fa-files-o"></i>
	    <span>Expedientes pendientes</span>
	    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
	  </a>
	  <ul class="treeview-menu">
	    
	  </ul>
	</li>
		<li class="treeview">
	  <a href="#">
	    <i class="fa fa-files-o"></i>
	    <span>Proyectos Redactados</span>
	    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
	  </a>
	  <ul class="treeview-menu">
	    
	  </ul>
	</li>
		<li class="treeview">
	  <a href="#">
	    <i class="fa fa-files-o"></i>
	    <span>Seguimiento</span>
	    <span class="pull-right-container">
	      <span class="label label-primary pull-right">4</span>
	    </span>
	  </a>
	  <ul class="treeview-menu">
	   
	  </ul>
	</li>
@endif                    
@if(Auth::user()->hasRole('Actuario'))
	<li><a href="/actuario/expedientes"><i class="fa fa-file-text"></i><span>Expedientes</span></a></li>
	<li><a href="/actuario/notificaciones"><i class="fa fa-envelope"></i><span>Notificaciones</span></a></li>
	<li><a href="/actuario/seguimiento"><i class="fa fa-map-marker"></i><span>Seguimiento</span></a></li>
@endif                    
@if(Auth::user()->hasRole('Magistrado'))
	<li class="treeview"><a href="#"><i class="fa fa-archive"></i><span>Archivo</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
		<ul class="treeview-menu">
			<li><a href="/magistrado/demanda"><i class="fa fa-list"></i><span>Demandas en curso</span></a></li>
			<li><a href="#"><i class="fa fa-file-text"></i><span>Acuerdos en curso</span></a></li>
			<li><a href="#"><i class="fa fa-file-zip-o"></i><span>Amparos en Curso</span></a></li>
		</ul>
	</li>
	<li class="treeview"><a href=""><i class="fa fa-gears"></i><span>Proyectos activos</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
		<ul class="treeview-menu">
			<li><a href="#"><i class=" fa fa-folder-open"></i><span>Proyectos de sentencias</span></a></li>
			<li><a href="#"><i class="fa fa-map-marker"></i><span>Seguimiento</span></a></li>
			<li><a href="#"><i class="fa fa-legal"></i><span>Sentencias</span></a></li>
		</ul>
	</li>
	<li><a href="#"><i class="fa fa-envelope"></i><span>Notificaciones</span></a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i><span>Estadísticas</span></a></li>
	<li class="treeview">
	  <a href="#">
	    <i class="fa fa-users"></i>
	    <span>Gestion de usuarios</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
	  </a>
	  <ul class="treeview-menu">
	    <li><a href="/magistrado/usuarios/crear"><i class="fa fa-user-plus"></i> Añadir usuarios</a></li>
	    <li><a href="/magistrado/usuarios/buscar"><i class="fa fa-search"></i> <span>Buscar</span></a></li>

	  </ul>
	</li>
@endif                    
@if(Auth::user()->hasRole('Usuario'))
	<li><a href="#"><i class="fa fa-file-text"></i><span>Demandas</span></a></li>
	<li><a href="#"><i class="fa fa-envelope"></i><span>Notificaciones</span></a></li>
@endif                    
@if(Auth::user()->hasRole('Amparos'))
	<li><a href="#"><i class="fa fa-file-text"></i><span>Demandas</span></a></li>
	<li><a href="#"><i class="fa fa-file-zip-o"></i><span>Amparos</span></a></li>
	<li><a href="#"><i class="fa fa-envelope"></i><span>Notificaciones</span></a></li>
	<li><a href="#"><i class="fa fa-map-marker"></i><span>Seguimiento</span></a></li>
@endif                    
@if(Auth::user()->hasRole('Institución'))
	<li><a href="#"><i class="fa fa-file-text"></i><span>Demandas</span></a></li>
	<li><a href="#"><i class="fa fa-map-marker"></i><span>Seguimiento</span></a></li>
@endif