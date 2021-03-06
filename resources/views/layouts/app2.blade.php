<!DOCTYPE html>
<html>
<head>
  <meta lang="es">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon.png">
  <title>{{ config('app.name', 'Seguimiento de demandas y Sentencias SiSeDe') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
  <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @yield('style')
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/home" class="logo" title="Menu de inicio">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SSD</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">SiSeDe</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" title="Cambiar modo de visualización" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
  
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            @include('layouts.menunav3')
          </li>
          <li class="dropdown notifications-menu">
            @include('layouts.menunav2')
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <input type="hidden" id="idusuario" value="{{ Auth::user()->id }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"  title="Panel del Usuario">
              <img src="{{Auth::user()->avatar}}" class="user-image" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{Auth::user()->avatar}}" class="img-circle" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">

                <p>
                 {{ Auth::user()->name }} 
                  
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  @include('layouts.perfil')
                  
                </div>
                <div class="pull-right">
                	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat" title="Salir del sistema">
                        Cerrar Sesión
                    </a >
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          @if(Auth::user()->hasRole('Usuario') || Auth::user()->hasRole('Institución'))
          @else
          <li>
            <a href="#" data-toggle="control-sidebar" title="Tipos de documentos para este Actor"><i class="fa fa-gears"></i></a>
          </li>
          @endif
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- contenido para los usuarios  -->
         @include('layouts.menunav')
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- contenido de los breadcrumbs -->
     @yield('navegacion')
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- contenido principal -->
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <img src="/img/logo.png" style="width:30px;" alt="Logotipo Tribunal"> &nbsp;
    <strong>Tribunal de lo Contencioso Administrativo del Estado de Colima &copy;. Derechos Reservados <?php echo date('Y'); ?>.</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" >

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
       @include('layouts.nav3')
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="/bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="/js/jquery-2.2.4.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<script src="/js/documentos.js"></script>
<script type="text/javascript">
  $('[data-toggle="popover"]').popover({ trigger: "hover"});
</script>
<!-- <script src="/bower_components/Chart.js/Chart.js"></script>
 --><!-- AdminLTE for demo purposes -->
<!-- <script src="/dist/js/demo.js"></script> -->
@yield('script')
</body>
</html>
