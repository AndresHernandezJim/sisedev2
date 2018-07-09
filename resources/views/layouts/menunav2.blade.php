@if(Auth::user()->hasRole('Oficial de Partes'))
<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notificaciones del usuario">
  <i class="fa fa-bell-o"></i>
  @if($cant>0)
  <span class="label label-warning">{{$cant}}</span>
  @endif
</a>
<ul class="dropdown-menu">
  @if($cant==0)
  <li class="header">No tienes notificaciones nuevas</li>
  @elseif($cant>2)
  <li class="header">Tienes {{$cant}} notificaciones nuevas</li>
  @else
  <li class="header">Tienes {{$cant}} notificación nueva</li>
  @endif
  <li>
    <!-- inner menu: contains the actual data -->
    <ul id="mensajes" class="menu">
      @foreach($mensajes as $k)
      <li><a href="#" class="btn btn-small btn-default"> <p>{{$k->mensaje}} <br><small><i class="fa fa-clock-o pull-rigth"></i>{{$k->created_at}}</small></p>
      </a>
      </li>
      @endforeach
    </ul>
  </li>
	<li class="footer"><a href="/oficialpartes/notificaciones">ver todas</a></li>
</ul>
@endif                    
@if(Auth::user()->hasRole('Secretario de Acuerdos'))
<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notificaciones del usuario">
  <i class="fa fa-bell-o"></i>
  @if($cant>0)
  <span class="label label-warning">{{$cant}}</span>
  @endif
</a>
<ul class="dropdown-menu">
  @if($cant==0)
  <li class="header">No tienes notificaciones nuevas</li>
  @elseif($cant>2)
  <li class="header">Tienes {{$cant}} notificaciones nuevas</li>
  @else
  <li class="header">Tienes {{$cant}} notificación nueva</li>
  @endif
  <li>
    <!-- inner menu: contains the actual data -->
    <ul id="mensajes" class="menu">
      @foreach($mensajes as $k)
      <li><a href="#" class="btn btn-small btn-default"> <p>{{$k->mensaje}} <br><small><i class="fa fa-clock-o pull-rigth"></i>{{$k->created_at}}</small></p>
      </a>
      </li>
      @endforeach
    </ul>
  </li>
	<li class="footer"><a href="/secretarioacuerdo/notificaciones">ver todas</a></li>
</ul>
@endif                    
@if(Auth::user()->hasRole('Proyectista'))
<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notificaciones del usuario">
  <i class="fa fa-bell-o"></i>
  @if($cant>0)
  <span class="label label-warning">{{$cant}}</span>
  @endif
</a>
<ul class="dropdown-menu">
  @if($cant==0)
  <li class="header">No tienes notificaciones nuevas</li>
  @elseif($cant>2)
  <li class="header">Tienes {{$cant}} notificaciones nuevas</li>
  @else
  <li class="header">Tienes {{$cant}} notificación nueva</li>
  @endif
  <li>
    <!-- inner menu: contains the actual data -->
    <ul id="mensajes" class="menu">
      @foreach($mensajes as $k)
      <li><a href="#" class="btn btn-small btn-default"> <p>{{$k->mensaje}} <br><small><i class="fa fa-clock-o pull-rigth"></i>{{$k->created_at}}</small></p>
      </a>
      </li>
      @endforeach
    </ul>
  </li>
	<li class="footer"><a href="/proyectista/notificaciones">ver todas</a></li>
</ul>
@endif                    
@if(Auth::user()->hasRole('Actuario'))
<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notificaciones del usuario">
  <i class="fa fa-bell-o"></i>
  @if($cant>0)
  <span class="label label-warning">{{$cant}}</span>
  @endif
</a>
<ul class="dropdown-menu">
  @if($cant==0)
  <li class="header">No tienes notificaciones nuevas</li>
  @elseif($cant>2)
  <li class="header">Tienes {{$cant}} notificaciones nuevas</li>
  @else
  <li class="header">Tienes {{$cant}} notificación nueva</li>
  @endif
  <li>
    <!-- inner menu: contains the actual data -->
    <ul id="mensajes" class="menu">
      @foreach($mensajes as $k)
      <li><a href="#" class="btn btn-small btn-default"> <p>{{$k->mensaje}} <br><small><i class="fa fa-clock-o pull-rigth"></i>{{$k->created_at}}</small></p>
      </a>
      </li>
      @endforeach
    </ul>
  </li>
	<li class="footer"><a href="/actuario/notificaciones">Ver todas</a></li>
</ul>
@endif                    
@if(Auth::user()->hasRole('Magistrado'))
<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notificaciones del usuario">
  <i class="fa fa-bell-o"></i>
  @if($cant>0)
  <span class="label label-warning">{{$cant}}</span>
  @endif
</a>
<ul class="dropdown-menu">
  @if($cant==0)
  <li class="header">No tienes notificaciones nuevas</li>
  @elseif($cant>2)
  <li class="header">Tienes {{$cant}} notificaciones nuevas</li>
  @else
  <li class="header">Tienes {{$cant}} notificación nueva</li>
  @endif
  <li>
    <!-- inner menu: contains the actual data -->
    <ul id="mensajes" class="menu">
      @foreach($mensajes as $k)
      <li><a href="#" class="btn btn-small btn-default"> <p>{{$k->mensaje}} <br><small><i class="fa fa-clock-o pull-rigth"></i>{{$k->created_at}}</small></p>
      </a>
      </li>
      @endforeach
    </ul>
  </li>
  <li class="footer"><a href="/magistrado/notificaciones">ver todas</a></li>
</ul>
@endif                    
@if(Auth::user()->hasRole('Usuario'))
<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notificaciones del usuario">
  <i class="fa fa-bell-o"></i>
  @if($cant>0)
  <span class="label label-warning">{{$cant}}</span>
  @endif
</a>
<ul class="dropdown-menu">
  @if($cant==0)
  <li class="header">No tienes notificaciones nuevas</li>
  @elseif($cant>2)
  <li class="header">Tienes {{$cant}} notificaciones nuevas</li>
  @else
  <li class="header">Tienes {{$cant}} notificación nueva</li>
  @endif
  <li>
    <!-- inner menu: contains the actual data -->
    <ul id="mensajes" class="menu">
      @foreach($mensajes as $k)
      <li><a href="#" class="btn btn-small btn-default"> <p>{{$k->mensaje}} <br><small><i class="fa fa-clock-o pull-rigth"></i>{{$k->created_at}}</small></p>
      </a>
      </li>
      @endforeach
    </ul>
  </li>
  <li class="footer"><a href="/user/notificaciones">ver todas</a></li>
</ul>
@endif                    
@if(Auth::user()->hasRole('Amparos'))
	
@endif                    
@if(Auth::user()->hasRole('Institución'))
	<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" title="Notificaciones del usuario">
  <i class="fa fa-bell-o"></i>
 
  <span class="label label-warning">0</span>

</a>
<ul class="dropdown-menu">
  
  <li class="header">No tienes notificaciones nuevas</li>
  <li>
    <!-- inner menu: contains the actual data -->
    <ul id="mensajes" class="menu">
     
      <li><a href="#" class="btn btn-small btn-default"> <p>un pequeño mensaje <br><small><i class="fa fa-clock-o pull-rigth"></i>12:00 pm</small></p>
      </a>
      </li>
     
    </ul>
  </li>
  <li class="footer"><a href="/institucion/notificaciones">Ver todas</a></li>
</ul>
@endif