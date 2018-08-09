@if(Auth::user()->hasRole('Proyectista'))
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">@if($cchat!=0){{$cchat}}@endif</span>
            </a>
            <ul class="dropdown-menu">
              @if($cchat==0)
              <li class="header">No tienes mensajes nuevos</li>
              @elseif($cchat>2)
              <li class="header">Tienes {{$cchat}} mensajes nuevos</li>
              @else
              <li class="header">Tienes {{$cchat}} mensaje nuevos</li>
              @endif
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($mchat as $k)

                  <li><!-- start message -->
                    <a href="/proyectista/proyectos/ver/{{$k->id_proyecto}}_{{$k->id_exp}}">
                      <div class="pull-left">
                        <img src="{{$k->avatar}}" class="img-circle" alt="{{$k->remitente}}">
                      </div>
                      <h4>
                        {{$k->remitente}}
                      </h4>
                      @if($k->estado==1)
                      <small><i class="fa fa-clock-o"></i> Visto</small>&emsp;
                      @else
                      <small><i class="fa fa-clock-o"></i>{{$k->tiempo}}</small>@endif 
                      <small>Exp {{$k->id_exp}}/{{$k->serie}}</small>
                      <br><small>Proy. #{{$k->id_proyecto}}</small>
                      <p>{{$k->mensaje}}</p>
                    </a>
                  </li>
                  @endforeach
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
@endif

@if(Auth::user()->hasRole('Magistrado'))
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">@if($cchat!=0){{$cchat}}@endif</span>
            </a>
            <ul class="dropdown-menu">
              @if($cchat==0)
              <li class="header">No tienes mensajes nuevos</li>
              @elseif($cchat>2)
              <li class="header">Tienes {{$cchat}} mensajes nuevos</li>
              @else
              <li class="header">Tienes {{$cchat}} mensaje nuevos</li>
              @endif
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($mchat as $k)

                  <li><!-- start message -->
                    <a href="/magistrado/proyectos/expediente/{{$k->id_exp}}/{{$k->id_proyecto}}">
                      <div class="pull-left">
                        <img src="{{$k->avatar}}" class="img-circle" alt="{{$k->remitente}}">
                      </div>
                      <h4>
                        {{$k->remitente}}
                        
                      </h4>
                      @if($k->estado==1)
                      <small><i class="fa fa-clock-o"></i> Visto</small>&emsp;
                      @else
                      <small><i class="fa fa-clock-o"></i>{{$k->tiempo}}</small>@endif 
                      <small>Exp {{$k->id_exp}}/{{$k->serie}}</small>
                      <br><small>Proy. #{{$k->id_proyecto}}</small>
                      <p>{{$k->mensaje}}</p>
                    </a>
                  </li>
                  @endforeach
                  <!-- end message -->
                </ul>
              </li>
             
            </ul>
@endif   
