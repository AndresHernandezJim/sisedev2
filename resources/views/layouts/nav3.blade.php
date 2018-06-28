
@if(Auth::user()->hasRole('Administrador'))
	<li class="footer"><a href="#">ver todas</a></li>
@endif
@if(Auth::user()->hasRole('Oficial de Partes')) 
<div class="tab-pane active" id="control-sidebar-home-tab" >
        <input type="hidden" id="roldocumento" value="oficialpartes">
        <!-- /.control-sidebar-menu -->
	 	<h3 class="control-sidebar-heading">Tipos de Documentos Disponibles</h3>
		 	<div class="control-sidebar-menu" >
		 		<div class="row">
			 		<div class="col-md-12">
				 		<div class="form-group" id="formadd">
				 			<div class="row">
				 				<div class="col-md-10 col-md-offset-1">
				 					<label class="control-sidebar-subheading">Agregar</label>
				 				</div>
				 			</div>
				 			<div class="col-md-10">	
				 				<input type="text" class="form-control" id="adddoc">
				 			</div>
			 			    <a href="#" class="btn  btn-sm btn-success" onclick="agregardoc();" title="Añadir tipo de documento"><i class="fa fa-plus"></i></a>
				 		</div>
				 		<div class="form-group"id="formactua">
				 			<div class="row">
				 				<div class="col-md-10 col-md-offset-1">
		 							<label class="control-sidebar-subheading">Editar</label>
				 				</div>
				 			</div>
		 					<div class="col-md-8">
		 						<input type="text" class="form-control" id="moddoc">
		 					</div>
		 					<a href="#" class="btn btn-sm btn-success" title="Actualizar el Tipo" onclick="save();"><i class="fa fa-check"></i></a>&nbsp;<a href="#" onclick="cancelar();" class="btn btn-sm btn-warning" title="Descartar Cambios"><i class="fa fa-trash"></i></a>
		 					<input type="hidden" id="iddocto">
		 				</div>
			 		</div>
		 		</div>
		 	</div>
		 	<br>

	        <ul class="control-sidebar-menu" id="listadoc">
	        	@if(sizeof($tipoac)==0)
					<li><div class="menu-info"><p>No existen elementos para mostrar</p></div></li>
	        	@else
	        	@foreach($tipoac as $k)
					<li ondblclick="modificar({{$k->id}});">
						<div class="menu-info">
							<p><a href="#" onclick="eliminar({{$k->id}});"   title="Eliminar éste tipo de Documento"><i class="fa fa-times" style="color:red;"></i></a> &nbsp;{{$k->Tipo}} </p>
						</div>
					</li>
	        	@endforeach
	        	@endif
	         
	        </ul>

	     <h3 class="control-sidebar-heading">Tipos de Documentos Eliminados</h3>
	     <ul class="control-sidebar-menu" id="listadoc2">
	     	@if(sizeof($tipoac2)==0)
				<li><div class="menu-info"><p>No existen elementos para mostrar</p></div></li>
	     	@else
		     	@foreach($tipoac2 as $k)
					<li>
						<div class="menu-info">
								<p><a href="#" onclick="restaurar({{$k->id}});" title="Restablecer éste tipo de documento"><i class="fa fa-check" style="color:green;"></i></a> &nbsp;{{$k->Tipo}} </p>
						</div>
					</li>
		     	@endforeach
	     	@endif
	     </ul>       
        <!-- /.control-sidebar-menu -->
    </div>
@endif                    
@if(Auth::user()->hasRole('Secretario de Acuerdos'))
	<div class="tab-pane active" id="control-sidebar-home-tab" >
        <input type="hidden" id="roldocumento" value="secretarioacuerdo">
        <!-- /.control-sidebar-menu -->
	 	<h3 class="control-sidebar-heading">Tipos de Documentos Disponibles</h3>
		 	<div class="control-sidebar-menu" >
		 		<div class="row">
			 		<div class="col-md-12">
				 		<div class="form-group" id="formadd">
				 			<div class="row">
				 				<div class="col-md-10 col-md-offset-1">
				 					<label class="control-sidebar-subheading">Agregar</label>
				 				</div>
				 			</div>
				 			<div class="col-md-10">	
				 				<input type="text" class="form-control" id="adddoc">
				 			</div>
			 			    <a href="#" class="btn  btn-sm btn-success" onclick="agregardoc();" title="Añadir tipo de documento"><i class="fa fa-plus"></i></a>
				 		</div>
				 		<div class="form-group"id="formactua">
				 			<div class="row">
				 				<div class="col-md-10 col-md-offset-1">
		 							<label class="control-sidebar-subheading">Editar</label>
				 				</div>
				 			</div>
		 					<div class="col-md-8">
		 						<input type="text" class="form-control" id="moddoc">
		 					</div>
		 					<a href="#" class="btn btn-sm btn-success" title="Actualizar el Tipo" onclick="save();"><i class="fa fa-check"></i></a>&nbsp;<a href="#" onclick="cancelar();" class="btn btn-sm btn-warning" title="Descartar Cambios"><i class="fa fa-trash"></i></a>
		 					<input type="hidden" id="iddocto">
		 				</div>
			 		</div>
		 		</div>
		 	</div>
		 	<br>

	        <ul class="control-sidebar-menu" id="listadoc">
	        	@if(sizeof($tipoac)==0)
					<li><div class="menu-info"><p>No existen elementos para mostrar</p></div></li>
	        	@else
	        	@foreach($tipoac as $k)
					<li ondblclick="modificar({{$k->id}});">
						<div class="menu-info">
							<p><a href="#" onclick="eliminar({{$k->id}});"   title="Eliminar éste tipo de Documento"><i class="fa fa-times" style="color:red;"></i></a> &nbsp;{{$k->Tipo}} </p>
						</div>
					</li>
	        	@endforeach
	        	@endif
	         
	        </ul>

	     <h3 class="control-sidebar-heading">Tipos de Documentos Eliminados</h3>
	     <ul class="control-sidebar-menu" id="listadoc2">
	     	@if(sizeof($tipoac2)==0)
				<li><div class="menu-info"><p>No existen elementos para mostrar</p></div></li>
	     	@else
		     	@foreach($tipoac2 as $k)
					<li>
						<div class="menu-info">
								<p><a href="#" onclick="restaurar({{$k->id}});" title="Restablecer éste tipo de documento"><i class="fa fa-check" style="color:green;"></i></a> &nbsp;{{$k->Tipo}} </p>
						</div>
					</li>
		     	@endforeach
	     	@endif
	     </ul>       
        <!-- /.control-sidebar-menu -->
    </div>
@endif                    
@if(Auth::user()->hasRole('Proyectista'))

@endif                    
@if(Auth::user()->hasRole('Actuario')) 
	<div class="tab-pane active" id="control-sidebar-home-tab" >
        <input type="hidden" id="roldocumento" value="actuario">
        <!-- /.control-sidebar-menu -->
	 	<h3 class="control-sidebar-heading">Tipos de Documentos Disponibles</h3>
		 	<div class="control-sidebar-menu" >
		 		<div class="row">
			 		<div class="col-md-12">
				 		<div class="form-group" id="formadd">
				 			<div class="row">
				 				<div class="col-md-10 col-md-offset-1">
				 					<label class="control-sidebar-subheading">Agregar</label>
				 				</div>
				 			</div>
				 			<div class="col-md-10">	
				 				<input type="text" class="form-control" id="adddoc">
				 			</div>
			 			    <a href="#" class="btn  btn-sm btn-success" onclick="agregardoc();" title="Añadir tipo de documento"><i class="fa fa-plus"></i></a>
				 		</div>
				 		<div class="form-group"id="formactua">
				 			<div class="row">
				 				<div class="col-md-10 col-md-offset-1">
		 							<label class="control-sidebar-subheading">Editar</label>
				 				</div>
				 			</div>
		 					<div class="col-md-8">
		 						<input type="text" class="form-control" id="moddoc">
		 					</div>
		 					<a href="#" class="btn btn-sm btn-success" title="Actualizar el Tipo" onclick="save();"><i class="fa fa-check"></i></a>&nbsp;<a href="#" onclick="cancelar();" class="btn btn-sm btn-warning" title="Descartar Cambios"><i class="fa fa-trash"></i></a>
		 					<input type="hidden" id="iddocto">
		 				</div>
			 		</div>
		 		</div>
		 	</div>
		 	<br>

	        <ul class="control-sidebar-menu" id="listadoc">
	        	@if(sizeof($tipoac)==0)
					<li><div class="menu-info"><p>No existen elementos para mostrar</p></div></li>
	        	@else
	        	@foreach($tipoac as $k)
					<li ondblclick="modificar({{$k->id}});">
						<div class="menu-info">
							<p><a href="#" onclick="eliminar({{$k->id}});"   title="Eliminar éste tipo de Documento"><i class="fa fa-times" style="color:red;"></i></a> &nbsp;{{$k->Tipo}} </p>
						</div>
					</li>
	        	@endforeach
	        	@endif
	         
	        </ul>

	     <h3 class="control-sidebar-heading">Tipos de Documentos Eliminados</h3>
	     <ul class="control-sidebar-menu" id="listadoc2">
	     	@if(sizeof($tipoac2)==0)
				<li><div class="menu-info"><p>No existen elementos para mostrar</p></div></li>
	     	@else
		     	@foreach($tipoac2 as $k)
					<li>
						<div class="menu-info">
								<p><a href="#" onclick="restaurar({{$k->id}});" title="Restablecer éste tipo de documento"><i class="fa fa-check" style="color:green;"></i></a> &nbsp;{{$k->Tipo}} </p>
						</div>
					</li>
		     	@endforeach
	     	@endif
	     </ul>       
        <!-- /.control-sidebar-menu -->
    </div>
@endif                    
@if(Auth::user()->hasRole('Magistrado'))

@endif                    
@if(Auth::user()->hasRole('Usuario'))
	
@endif                    
@if(Auth::user()->hasRole('Amparos'))
	
@endif                    
@if(Auth::user()->hasRole('Institución'))
	
@endif