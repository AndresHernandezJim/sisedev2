@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active"><i class="fa fa-user-circle-o"></i> Busqueda de Usuario</li>
  </ol> 
  <br>
@endsection
@section('content')
<div class="row">
        <div class="col-md-4 col-md-offset-8">
            <div id="ohsnap"></div>
        </div>
    </div>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header"><center><h4><b>Usuarios</b></h4></center><hr></div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-2">
						<label for="b1" class="control-label pull-right">Buscar por:</label>	
					</div>
					<div class="col-md-2">
					
						<select id="b1" class="custom-select form-control" >
							<option value="1">Nombre</option>
							<option value="2">Razon Social</option>
							<option value="3">Expediente</option>
						</select>
					</div>
					<div class="col-md-4">
						<input type="text" id="b2" class="form-control">
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<table class="table table-sm table-hover table-bordered" id="tabla">
							<thead >
								<th>Nombre</th>
								<th>Razon Social</th>
								<th>email</th>
								<th></th>
							</thead>
							<tbody >
								@foreach($usuarios as $k)
									<tr>
										<td>{{$k->Nombre}}</td>
										<td>{{$k->razon_social}}</td>
										<td>{{$k->email}}</td>
										<td><a title="Editar" href="#!" onclick="editar({{$k->id}})" class=" btn btn-sm btn-warning fa fa-pencil"></td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div id="paginacion">
							{{$usuarios->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<center><h4>Editar Usuario</h4></center>
			</div>
			<div class="modal-body">
				<form action="" id="formulario">
					<div class="col-md-12">
						<br>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" name="email" id="email" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							 <meta name="csrf-token" content="{{ csrf_token() }}" />
							<input type="hidden" name="id" id="id_usuario">
							<input type="hidden" id="tipo">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nombre</label>
									<input type="text" id="Nombre"  name="nombre" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Apellido Paterno</label>
									<input type="text" id="A_pat" name="a_pat" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Apellido Materno</label>
									<input type="text" id="A_mat" name="a_mat" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">CURP</label>
									<input type="text" name="curp" id="curp" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Teléfono</label>
									<input type="text" name="tel" id="tel" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Teléfono Celular</label>
									<input type="text" name="cel" id="cel" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Razon Social</label>
									<input type="text" id="razon_social" name="razon_social" class="form-control">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Calle</label>
									<input type="text" name="calle" id="calle" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for=""># Exteriro</label>
									<input type="text" name="n_ext" id="n_ext" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for=""># Interior</label>
									<input type="text" name="n_int" id="n_int" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="">CP.</label>
									<input type="text" name="cp" id="cp" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Colonia</label>
									<input type="text" name="colonia" id="colonia" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
                                    <label  for="municipio" class="control-label">Municipio</label> <span style="color: red;"> *</span>
                                    <select class="custom-select form-control" name="municipio" id="municipio">
                                      <option selected value="0">Seleccione el Municipio</option>
                                      <option value="Armería">Armería</option>
                                      <option value="Colima">Colima</option>
                                      <option value="Comala">Comala</option>
                                      <option value="Coquimatlán">Coquimatlán</option>
                                      <option value="Cuahutémoc">Cuahutémoc</option>
                                      <option value="Ixtlahuacán">Ixtlahuacán</option>
                                      <option value="Manzanillo">Manzanillo</option>
                                      <option value="Minatitlán">Minatitlán</option>
                                      <option value="Tecomán">Tecomán</option>
                                      <option value="Villa de Álvarez">Villa de Álvarez</option>
                                    </select>                                                           
                                 </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Localidad</label>
									<input type="text" name="localidad" id="localidad" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="referencia">Referencias</label><span style="color: red;"> *</span>
                                <textarea name="referencia" class="form-control" placeholder="Ej. Ninguna" id="refe"></textarea>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-1 col-md-offset-5">
								<a href="#!" class="btn btn-danger  pull-left" data-dismiss="modal">Cerrar</a>
							</div>
							<div class="col-md-2">
								<a href="#!" class="btn btn-success" onclick="actualizar();">Actualizar</a>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">			
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="/bower_components/jquery-ui/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/ohsnap.min.js"></script>
<script>
	function editar(id){
		$.ajax({
			type:'GET',
			url:'/oficialpartes/busqueda/getusuario',
			data:{id:id},
			success:function(data){
				data=JSON.parse(data);
				if(data.tipo==7){
					$('#tipo').val(data.tipo);
					$('#Nombre').val(data.usuario.nombre);
					$('#email').val(data.usuario.email);
					$('#A_pat').val(data.usuario.a_paterno);
					$('#A_mat').val(data.usuario.a_materno);
					$('#curp').val(data.persona.curp);
					$('#tel').val(data.persona.telefono);
					$('#cel').val(data.persona.celular);
					$('#razon_social').val(data.persona.razon_social);
					$('#calle').val(data.domicilio.calle);
					$('#n_ext').val(data.domicilio.next);
					$('#n_int').val(data.domicilio.ninter);
					$('#cp').val(data.domicilio.cp);
					$('#colonia').val(data.domicilio.colonia);
					$('#municipio').val(data.domicilio.municipio);
					$('#localidad').val(data.domicilio.localidad);
					$('#refe').val(data.domicilio.referencia);
				}else{
					$('#tipo').val(data.tipo);
					$('#Nombre').val(data.usuario.nombre);
					$('#email').val(data.usuario.email);
					$('#A_pat').val(data.usuario.a_paterno);
					$('#A_mat').val(data.usuario.a_materno);
					$('#curp').val(data.institucion.curp);
					$('#tel').val(data.institucion.telefono);
					$('#cel').val(data.institucion.celular);
					$('#razon_social').val(data.institucion.razon_social);
					$('#calle').val(data.domicilio.calle);
					$('#n_ext').val(data.domicilio.next);
					$('#n_int').val(data.domicilio.ninter);
					$('#cp').val(data.domicilio.cp);
					$('#colonia').val(data.domicilio.colonia);
					$('#municipio').val(data.domicilio.municipio);
					$('#localidad').val(data.domicilio.localidad);
					$('#refe').val(data.domicilio.referencia);
				}
			},
		});
		$('#modal1').modal('show');
		$('#id_usuario').val(id);
	}
	function eliminar(id){
        $(this).toggleClass('strike').fadeOut('slow');    
	}
	function actualizar(){
		var tipo=$('#tipo').val();
		var id=$('#id_usuario').val();
		var	nombre=$('#Nombre').val();
		var	email=$('#email').val();
		var	apat=$('#A_pat').val();
		var	amat=$('#A_mat').val();
		var	curp=$('#curp').val();
		var	tel=$('#tel').val();
		var	cel=$('#cel').val();
		var	razon=$('#razon_social').val();
		var	calle=$('#calle').val();
		var	next=$('#n_ext').val();
		var	nint=$('#n_int').val();
		var	cp=$('#cp').val();
		var	colonia=$('#colonia').val();
		var	municipio=$('#municipio').val();
		var	localidad=$('#localidad').val();
		var	ref=$('#refe').val();
		var TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			type:'POST',
			url: '/oficialpartes/busqueda/update',
			data:{_token:TOKEN,tipo:tipo,id:id,nombre:nombre,email:email,apat:apat,amat:amat,curp:curp,tel:tel,cel:cel,razon:razon,calle:calle
				,next:next,nint:nint,cp:cp,colonia:colonia,municipio:municipio,localidad:localidad,ref:ref},
			success:function(data){
				data=JSON.parse(data);
				console.log(data);
				$('#modal1').modal('hide');
				ohSnap('Se han actualizado los datos de '+data.Nombre,{'color':'green'});

			}
		});
	}
	$(document).ready(function(){
		var tipo=$('#b1').val();
		$('#b1').on('change',function(){
			tipo=$('#b1').val();
			console.log('cambio el tipo de busqueda');
			$('#b2').val('');
			console.log('limpiando barra de busqueda');
		});
		$('#b2').on('keyup',function(){

			var buscar=$('#b2').val();
			if(buscar.lengh!=0){
				if(tipo==1){
					$.ajax({
						type:'get',
						url:'/oficialpartes/busqueda/1',
						data:{
								buscar:buscar
						},
						success:function(data){
							data = JSON.parse(data);
							console.log(data);
							$( '#tabla tbody>tr  ' ).remove();
							$('#tabla thead>tr').remove();
							$('#paginacion').prop('hidden',true);
							$('#tabla thead').append("<tr><th>Nombre</th><th>email</th><th></th></tr>");
							$.each(data, function(index,val){
								$('#tabla tbody').append("<tr><td>"+val.Nombre+"</td><td>"+val.email+"</td><td><a title='Editar' href='#!' onclick='editar("+val.id+")' class=' btn btn-sm btn-warning fa fa-pencil'></a>");
							});
						}
					});
				}else if(tipo==2){
					$.ajax({
						type:'get',
						url:'/oficialpartes/busqueda/2',
						data:{
								buscar:buscar
						},
						success:function(data){
							data=JSON.parse(data);
							console.log(data);
							if(data!=null){
								$('#tabla tbody>tr ').remove();
								$('#tabla thead>tr ').remove();
								$('tabla thead').append("<tr><td>Nombre</td><td>Razon Social</td><td>Email</td><td></td></tr>");
								$.each(data,function(index,val){
									$('#tabla tbody').append("<tr><td>"+val.Nombre+"</td><td>"+val.razon_social+"</td><td><a title='Editar' href='#!' onclick='editar("+val.id+")' class=' btn btn-sm btn-warning fa fa-pencil'>");
								});
							}
						}
					});

				}else if(tipo==3){
					$.ajax({
						type:'get',
						url:'/oficialpartes/busqueda/3',
						data:{
								buscar:buscar
						},
						success:function(data){
							data=JSON.parse(data);
							console.log(data);
							if(data!=null){
								$( '#tabla tbody>tr  ' ).remove();
								$('#tabla thead>tr').remove();
								$('#paginacion').prop('hidden',true);
								$('#tabla thead').append("<tr><td></td><td>Nombre</td><td>Razon Social</td><td>Email</td><td></td></tr>");
								$.each(data, function(index,val){
									if(index==0){
										$('#tabla tbody').append("<tr><td>Demandado</td><td>"+val.Nombre+"</td><td>"+val.razon_social+"</td><td>"+val.email+"</td><td><a title='Editar' href='#!' onclick='editar("+val.id+")' class=' btn btn-sm btn-warning fa fa-pencil'></a></td></tr>");
									}else{
										$('#tabla tbody').append("<tr><td>Demandante</td><td>"+val.Nombre+"</td><td>"+val.razon_social+"</td><td>"+val.email+"</td><td><a title='Editar' href='#!' onclick='editar("+val.id+")' class=' btn btn-sm btn-warning fa fa-pencil'></a></td></tr>");
									}
								
							});
							}else{
								$( '#tabla tbody>tr  ' ).remove();
								$('#paginacion').prop('hidden',true);
							}
						}
					});

				}
			}else{
				$('#paginacion >').prop('hidden',false);
			}
		});
	});
</script>
@endsection