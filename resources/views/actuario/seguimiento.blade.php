@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
@stop
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Seguimiento</li>
    </ol>
</div>
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
                                <td class="details-control" style="color: blue; text-align: center; font-weight: bold;"><a class="btn btn-primary btn-small"> {{$key->expediente}}</a></td>
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
<div class="row">
    <div class="modal" id="myModalmostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog">
            <div class="modal-content modal-lg">
                <div class="modal-body">
                    <div class="col-sm-16">
                        <div class="widget-box">
                            <div class="widget-body">
                                <div class="modal-body datagrid table-responsive" style="padding: 0px;">
                                    <div class="panel-body" id="editar_resul" style="padding: 0px;">
                                        <object id="object" type="application/pdf" data="" width="100%" height="550">
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
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/js/seguimiento.js"></script> 
@endsection