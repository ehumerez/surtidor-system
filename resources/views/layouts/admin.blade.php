<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADVentas | www.incanatoit.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AD</b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Surtidor S.R.L Emanuel</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">Proyecto de Sistemas</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      www.incanatoit.com - Desarrollando Software
                      <small>www.youtube.com/jcarlosad7</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{url('finalisar')}}" class="btn btn-default btn-flat">Cerrar Secion</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                    
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('almacen/combustible')}}"><i class="fa fa-circle-o"></i> Combustibles</a></li>
                <li><a href="{{url('almacen/inventario')}}"><i class="fa fa-circle-o"></i> Inventario</a></li>
                <li><a href="{{url('almacen/tanque')}}"><i class="fa fa-circle-o"></i> Tanques</a></li>
                <li><a href="{{url('almacen/dispenser')}}"><i class="fa fa-circle-o"></i> Dispensadores</a></li>
                <li><a href="{{url('almacen/manguera')}}"><i class="fa fa-circle-o"></i> Mangueras</a></li>
                <li><a href="{{url('almacen/tanquedispenser')}}"><i class="fa fa-circle-o"></i> Destalle de Manguera</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Administrar Usuario</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admusuario/user')}}"><i class="fa fa-circle-o"></i> Gestionar Usuario</a></li>
                <li><a href="{{url('admusuario/grupo')}}"><i class="fa fa-circle-o"></i> Gestionar Grupo</a></li>
                <li><a href="{{url('admusuario/bitacora')}}"><i class="fa fa-circle-o"></i> Administrar Bitacora</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Administrar Procesos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('proceso/facturaadmi')}}"><i class="fa fa-circle-o"></i> Venta Combustible</a></li>
                <li><a href="{{url('proceso/compra')}}"><i class="fa fa-circle-o"></i> Compra Combustible</a></li>
                <li><a href="{{url('perfil/vehiculoadmi')}}"><i class="fa fa-circle-o"></i> Verificar B-sisa</a></li>
              </ul>
            </li>
             
             <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Administrar Premios</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('premio/clientef')}}"><i class="fa fa-circle-o"></i> Clientes Fieles</a></li>
                <li><a href="{{url('premio/regalo')}}"><i class="fa fa-circle-o"></i> Premios Disponibles</a></li>
                <li><a href="{{url('premio/cliente_premio')}}"><i class="fa fa-circle-o"></i> Pedidos</a></li>
                <li><a href="{{url('premio/vehiculoafiliado')}}"><i class="fa fa-circle-o"></i> Vehiculos Afiliados</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Administrar Perfil</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('perfil/personaadmi')}}"><i class="fa fa-circle-o"></i> Gestionar Clientes/Personas</a></li>
                <li><a href="{{url('perfil/trabajador')}}"><i class="fa fa-circle-o"></i> Gestionar Trabajador</a></li>
                <li><a href="{{url('perfil/turno')}}"><i class="fa fa-circle-o"></i> Gestionar Turno</a></li>
                <li><a href="{{url('perfil/trabajadorturno')}}"><i class="fa fa-circle-o"></i> Turno Trabajadores</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Operador Form</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('operador/vehiculo')}}"><i class="fa fa-circle-o"></i> Realizar Venta</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Ventas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              	@yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2020 <a href="www.incanatoit.com">IncanatoIT</a>.</strong> All rights reserved.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>
