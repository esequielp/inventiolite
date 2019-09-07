<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Repuestos Pino C.A | Dashboard</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.4 -->
  <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/Ionicons/css/ionicons.min.css">    
  <!-- Theme style -->
  <link href="plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <link href="plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css" />
  <link href="plugins/dist/css/hovereffect.css" rel="stylesheet" type="text/css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- jQuery 2.1.4 -->
<!-- Bootstrap 3.3.2 JS -->
<script src="plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="plugins/morris/raphael-min.js"></script>
<script src="plugins/morris/morris.js"></script>
<link rel="stylesheet" href="plugins/morris/morris.css">
<link rel="stylesheet" href="plugins/morris/example.css">
<script src="plugins/jspdf/jspdf.min.js"></script>
<script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>
<?php if(isset($_GET["view"]) && $_GET["view"]=="sell"):?>
  <script type="text/javascript" src="plugins/jsqrcode/llqrcode.js"></script>
  <script type="text/javascript" src="plugins/jsqrcode/webqr.js"></script>
<?php endif;?>

</head>

<body class="<?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>  skin-blue-light sidebar-mini <?php else:?>login-page<?php endif; ?>" >
  <div class="wrapper">
    <!-- Main Header -->
    <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
    <header class="main-header">
      <!-- Logo -->
      <a href="./" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>REPUESTOS</b> PINO C.A</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account Menu -->

           <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name;  }?>
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Cambiar Password</a></li>
                <li class="divider"></li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="./logout.php" class="btn btn-default .btn-xm">Salir</a>
                  </div>
                </li>
              </ul>
            </li>

          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">ADMINISTRACION</li>
        <?php if(isset($_SESSION["user_id"])):?>
          <li><a href="./index.php?view=home"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
          <li class="treeview">
            <a href="#"><i class='fa fa-dashboard'></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="./index.php?view=dashboard1">Dashboard v1</a></li>
              <li><a href="./index.php?view=dashboard2">Dashboard v2</a></li>
            </ul>
          </li>
          <li><a href="./?view=sell"><i class='fa fa-usd'></i> <span>Vender</span></a></li>
          <li><a href="./?view=sells"><i class='fa fa-shopping-cart'></i> <span>Ventas</span></a></li>
          <li><a href="./?view=box"><i class='fa fa-cube'></i> <span>Caja</span></a></li>
          <li><a href="./?view=products"><i class='fa fa-glass'></i> <span>Productos</span></a></li>
          <li class="treeview">
            <a href="#"><i class='fa fa-database'></i> <span>Catalogos</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="./?view=categories">Categorias</a></li>
              <li><a href="./?view=clients">Clientes</a></li>
              <li><a href="./?view=providers">Proveedores</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class='fa fa-area-chart'></i> <span>Inventario</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="./?view=inventary">Inventario</a></li>
              <li><a href="./?view=re">Abastecer</a></li>
              <li><a href="./?view=res">Abastecimientos</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class='fa fa-file-text-o'></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="./?view=reports">Inventario</a></li>
              <li><a href="./?view=sellreports">Ventas</a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="#"><i class='fa fa-cog'></i> <span>Administracion</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="./?view=users">Usuarios</a></li>
              <li><a href="./?view=settings">Configuracion</a></li>
              <li><a href="./?view=divisas">Cambio Divisas</a></li>
            </ul>
          </li>
        <?php endif;?>

      </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
<?php endif;?>

<!-- Content Wrapper. Contains page content -->
<?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
<div class="content-wrapper">
  <div class="content">
    <?php View::load("index");?>
  </div>
</div><!-- /.content-wrapper -->

<!--      <footer class="main-footer">
<div class="pull-right hidden-xs">
<b>Version</b> 3.0
</div>
<strong>Copyright &copy; 2019 <a href="http://evilnapsis.com/company/" target="_blank">Evilnapsis</a></strong>
</footer> -->
<?php else:?>
  <div class="login-box">
    <div class="login-logo">
      <a href="./">INVENTIO<b>LITE</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <form action="./?action=processlogin" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" required class="form-control" placeholder="Password"/>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">

          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
          </div><!-- /.col -->
        </div>
      </form>
    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->  
<?php endif;?>


</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js" type="text/javascript"></script>
<script src="plugins/Datatables/dataTables.min.js"></script>
<link rel="stylesheet" href="plugins/Datatables/dataTables.css">
<script src="plugins/dist/js/functions.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. Slimscroll is required when using the
fixed layout. -->
</body>
</html>

