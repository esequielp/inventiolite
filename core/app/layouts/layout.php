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
  <link href="plugins/dist/css/styles.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="plugins/Datatables/dataTables.css">
  <link rel="stylesheet" type="text/css" href="plugins/Datatables/Buttons-1.5.6/css/buttons.dataTables.min.css">
<!-- jQuery 3.4.1 -->
<!-- Bootstrap 3.3.2 JS -->
<script src="plugins/jquery/jquery-2.2.4.min.js"></script>
<script src="plugins/modernizr/2.8.3/modernizr.js"></script>

<script type="text/javascript" language="javascript" src="plugins/jquery/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Select2 -->
<script type="text/javascript" language="javascript" src="plugins/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript" language="javascript" src="plugins/Datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="plugins/Datatables/Buttons-1.5.6/js/buttons.flash.min.js"></script>

<script type="text/javascript" language="javascript" src="plugins/Datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

<script type="text/javascript" language="javascript" src="plugins/Datatables/Buttons-1.5.6/js/buttons.print.min.js"></script>  

<script type="text/javascript" language="javascript" src="plugins/Datatables/JSZip-2.5.0/jszip.min.js"></script>

<script type="text/javascript" language="javascript" src="plugins/Datatables/pdfmake-0.1.36/pdfmake.min.js"></script>

<script type="text/javascript" language="javascript" src="plugins/Datatables/pdfmake-0.1.36/vfs_fonts.js"></script>


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
 <div class="se-pre-con"></div>
 <div class="wrapper">
    <!-- Main Header -->
    <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
<header class="main-header">
         <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>R</b>P</span>
          <!-- logo for regular state and mobile devices -->
          <!-- <span class="logo-lg"><b>REPUESTOS</b> PINO C.A</span> -->
        <img src="plugins/dist/img/logo_163px.png"  >
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
           <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
<!--               <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tiene 4 mensajes</li>
                  <li> -->
                    <!-- inner menu: contains the actual data -->
                    <!-- <ul class="menu">
                      <li> --><!-- start message -->
<!--                         <a href="#">
                          <div class="pull-left">
                            <img src="plugins/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Enviado por:
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Jose Reverón</p>
                        </a>
                      </li> --><!-- end message -->
<!--                       ...
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Ver todos los mensajes</a></li>
                </ul>
              </li> -->
              <!-- Notifications: style can be found in dropdown.less -->
<!--               <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tiene 10 Alertas</li>
                  <li> -->
                    <!-- inner menu: contains the actual data -->
<!--                     <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="ion ion-ios-people info"></i> Productos sin Stock
                        </a>
                      </li>
                      ...
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Ver Todas</a></li>
                </ul>
              </li> -->
              <!-- Tasks: style can be found in dropdown.less -->
<!--               <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tiene 9 tareas</li>
                  <li> -->
                    <!-- inner menu: contains the actual data -->
                    <!-- <ul class="menu">
                      <li> --><!-- Task item -->
 <!--                        <a href="#">
                          <h3>
                           Reabastecer Inventario
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li> --><!-- end task item -->
       <!--                ...
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">Ver todas las tareas</a>
                  </li>
                </ul>
              </li> -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="plugins/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                    <?php if(isset($_SESSION["user_id"]) )
                        { echo UserData::getById($_SESSION["user_id"])->username ." ". UserData::getById($_SESSION["user_id"])->lastname; }  ?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="plugins/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                     <?php if(isset($_SESSION["user_id"]) )
                        { echo UserData::getById($_SESSION["user_id"])->username ." ". UserData::getById($_SESSION["user_id"])->lastname; }  ?>
                      <small><?php if(isset($_SESSION["user_id"]) )
                        { echo UserData::getById($_SESSION["user_id"])->name ; }  ?></small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="index.php?view=edituser&id=<?php echo $_SESSION["user_id"];?>" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="./logout.php" class="btn btn-default btn-flat">Salir</a>
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

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">ADMINISTRACION</li>
        <?php if(isset($_SESSION["user_id"])):?>
          <li><a href="./index.php?view=home"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
          <li class="treeview">
            <a href="#"><i class='fa fa-dashboard'></i> <span>Dashboard</span> <!-- <i class="fa fa-angle-left pull-right"></i> --></a>
<!--             <ul class="treeview-menu">
              <li><a href="./index.php?view=dashboard1">Dashboard v1</a></li>
              <li><a href="./index.php?view=dashboard2">Dashboard v2</a></li>
            </ul> -->
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
              <li><a href="./?view=almacenes">Almacenes</a></li>
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
    <!-- <a href="login-logo"><b>REPUESTOS</b>PINO C.A</a> -->
    <img src="plugins/dist/img/logo.png"  >
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <form action="./?action=processlogin" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password"   name="password"class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
           <a href="#">Olvide mi password</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php endif;?>

</div><!-- ./wrapper -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-center">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title red" style="text-align: left;">Atención</h4>
      </div>
      <div class="modal-body">
          <p id="error"></p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
  </div>

</div>
</div>
<!-- REQUIRED JS SCRIPTS -->
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js" type="text/javascript"></script>
<script src="plugins/Datatables/dataTables.min.js"></script>
<script src="plugins/dist/js/functions.js"></script>
</body>
</html>

