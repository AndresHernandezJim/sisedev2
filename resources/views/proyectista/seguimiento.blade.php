@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active"><i class="fa fa-map-marker"></i> Seguimiento</li>
</ol>
<br>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <center><h4><b>Seguimiento</b></h4></center>
            </div>
            <div class="box-body">
                <input type="hidden" value="{{$rol}}" id="rol">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-md table-responsive" role="grid" id="example">
                      <thead>
                            <th style="width: 10%;">Expediente</th>
                            <th style="width: 10%;">Creado</th>
                            <th style="width: 20%;">Demandado</th>
                            <th style="width: 20%;">Demandante</th>
                            <th style="width: 30%;">Resumen</th>
                      </thead>
                        <tbody>
                          @foreach ($exp as  $key)
                              <tr data-child-value="{{$key->id_expediente}}">
                                <td class="details-control"><a class="btn btn-primary btn-small"data-toggle="popover" data-content="Visauliza el seguimiento paso a paso del expediente" rel="popover" placement="top" title="Ver el seguimiento del Expediente {{$key->expediente}}/{{$key->serie}}"> {{$key->expediente}}</a></td>
                                <td>{{$key->fechasis}}</td>
                                <td>{{$key->Demandado}}</td>
                                <td>{{$key->Demandante}}</td>
                                <td>{{$key->Resumen}}</td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModalmostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-sm-16">
          <div class="widget-box">
            <div class="widget-body">
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
@endsection

@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/js/seguimiento.js"></script> 
@endsection