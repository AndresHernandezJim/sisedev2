@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
@stop
@section('content')
 <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Demandas</li>
  </ol>
<div class="box">
	<div class="box-header">
		<div class="col-md-10"><h5><strong>Demandas</strong></h5></div>
		
			
	</div>
	<div class="box-body">

		<div class="row">
		<!--  -->
    <input type="hidden" id="rol" value="{{$rol}}">
    <div class="col-md-12 col-sm-12">
        <table class="table table-bordered table-hover table-md table-responsive" role="grid" id="tabla">
          <thead class="thead-dark">
              <th style="width: 10%;"><center>Expediente</center></th>
              <th style="width: 10%;"><center>Fecha</center></th>
              <th style="width: 20%;"><center>Demandante</center></th>
              <th style="width: 20%;"><center>Demandado</center></th>
              <th style="width: 25%;"><center>Resumen<center></th>
              <th style="width: 5%;">Estatus</th>
          </thead>
          <tbody>
            @foreach($exp as $item)
              <tr data-child-value="{{$item->id}}">
                <td class="details-control"><center><a class="btn btn-primary btn-small">{{$item->expediente}}</a></center></td>
                <td>{{$item->fecha}}</td>
                <td>{{$item->demandado}}</td>
                <td>{{$item->demandante}}</td>
                <td >{{$item->resumen}}</td>
              <td></td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
              <th style="width: 10%;"><center>Expediente</center></th>
              <th style="width: 10%;"><center>Fecha</center></th>
              <th style="width: 20%;"><center>Demandado</center></th>
              <th style="width: 20%;"><center>Demandante</center></th>
              <th style="width: 25%;"><center>Resumen<center></th>
              <th style="width: 5%;">Estado</th>
          </tfoot>
      </table>
     
    </div>
    
		
</div>
  <div class="modal" id="myModalmostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-sm-16">
            <div class="widget-box">
              <div class="widget-body">
                <div class="modal-body datagrid table-responsive" style="padding: 0px;">
                  <div class="panel-body" id="editar_resul" style="padding: 0px;">
                    <div class="col-md-12">
                      <object id="object" type="application/pdf" data="" width="100%" height="600">
                      <param id="param" name="src" value="" />
                    </object>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>                            
      </div>
    </div>
  </div>
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/js/nuevademanda.js" type="text/javascript"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endsection