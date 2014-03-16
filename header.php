<link href="../dist/css/lobster.css" rel="stylesheet" type="text/css">
<link href="../dist/css/Cabin.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../constancias/print.css" media="print">

<?php
@session_start();
if(@$_SESSION['usuario']!=NULL){
}else{
@$_SESSION['usuario']='Invitado';
@$_SESSION['correo']='N/A';
@$_SESSION['cedula']='N/A';
}
?>

<style type="text/css">

body { 
    background: url(../cream_dust.png) repeat 0 0;
}

.nopadding {
  margin-left: 50px;
  margin-bottom: 3%;
}

.dropdown-submenu{
position:relative;
}

.dropdown-submenu>.dropdown-menu{
top:0;
left:100%;
margin-top:-6px;
margin-left:-1px;
-webkit-border-radius:0 6px 6px 6px;
-moz-border-radius:0 6px 6px 6px;
border-radius:0 6px 6px 6px;}

.dropdown-submenu:hover>.dropdown-menu{
display:block;}

.dropdown-submenu>a:after{
display:block;
content:" ";
float:right;
width:0;
height:0;
border-color:transparent;
border-style:solid;
border-width:5px 0 5px 5px;
border-left-color:#cccccc;
margin-top:5px;
margin-right:-10px;}

.dropdown-submenu:hover>a:after{
border-left-color:#ffffff;}

.dropdown-submenu.pull-left{
float:none;}

.dropdown-submenu.pull-left>.dropdown-menu{
left:-100%;
margin-left:10px;
-webkit-border-radius:6px 0 6px 6px;
-moz-border-radius:6px 0 6px 6px;
border-radius:6px 0 6px 6px;} 

.user-details {position: relative; padding: 0;}
.user-details .user-image {position: relative;  z-index: 1; width: 100%; text-align: center;}
 .user-image img { clear: both; margin: auto; position: relative;}

.user-details .user-info-block {width: 100%; top: 55px; z-index: 0; }
 .user-info-block .user-heading {width: 100%; text-align: center; margin: 10px 0 0;}
 .user-info-block .navigation {float: left; width: 100%; margin: 0; padding: 0; list-style: none; border-bottom: 1px solid #428BCA; border-top: 1px solid #428BCA;}
  .navigation li {float: left; margin: 0; padding: 0;}
   .navigation li a {padding: 20px 30px; float: left;}
   .navigation li.active a {background: #428BCA; color: #fff;}
 .user-info-block .user-body {float: left; padding: 5%; width: 90%;}
  .user-body .tab-content > div {float: left; width: 100%;}
  .user-body .tab-content h4 {width: 100%; margin: 10px 0; color: #333;}
  
  #box{
    width: 190px;
    right: -140px;
    top: 15%; /* change this value to place the menu higher or lower */
    position: fixed;
    z-index: 100;
}

#tab{
    float: left;
    list-style: none outside none;
    margin: 0;
    padding: 0;
    position: relative;
    z-index: 99;
}

#links{
    width: 80px;
    padding: 10px;
    float: left;
}

.showed, .hide{
    /* we specify the transition length for hiding and showing */
            transition: margin-right .4s ease-in;
    -webkit-transition: margin-right .4s ease-in;
}

.hised{
    margin-right:0px;
}

.showed{
    margin-right:265px;
}

#arrow, .bt{
    cursor: pointer;
}

li{
    cursor: pointer;
}

a{
  text-decoration: none;
}

#deco{
    width: 250px;
            box-shadow:0px 0px 5px #000;
       -moz-box-shadow:0px 0px 5px #000;
    -webkit-box-shadow:0px 0px 5px #000;
}

</style>

<script>
  
  function toggle(id) {
    var el = document.getElementById(id);
    var img = document.getElementById("arrow");
    var box = el.getAttribute("class");
    if(box == "hised"){
        el.setAttribute("class", "showed");
        delay(img, "../src/arrowright.png", 400);
    }
    else{
        el.setAttribute("class", "hised");
        delay(img, "../src/arrowleft.png", 400);
    }
}

function delay(elem, src, delayTime){
    window.setTimeout(function() {elem.setAttribute("src", src);}, delayTime);
}

</script>

<?php if(@$_SESSION['nivel']=='Administrador' || @$_SESSION['nivel']=='Coordinador' || @$_SESSION['nivel']=='Secretaria'): ?>

<div id="box" class="hised hidden-print">
      <ul id="tab">
          <li >
              <img id="arrow" onclick="toggle('box');" src="../src/arrowleft.png" data-toggle="tooltip" data-placement="left" title="Menu Administrador">
          </li>
      </ul>

      <div id="links">
          <div id="deco">
          <ul class="list-group" id="accordion">
          <li class="list-group-item"><a href="../Admin/registro.php"><span class="glyphicon glyphicon-plus"></span> Registro de usuarios</a></li>
          <li class="list-group-item"><a href="../Admin/registroo.php"><span class="
glyphicon glyphicon-user"></span> Registro de profesores</a></li>
          <li class="list-group-item"><a href="../Admin/habilitar.php"><span class="glyphicon glyphicon-remove"></span> Habilitar/Deshabilitar profesores</a></li>
          <li class="list-group-item"><a href="../Admin/Habvacunas.php"><span class="glyphicon glyphicon-pushpin"></span>  Agregar vacunas</a></li>
          <li class="list-group-item"><a href="../Admin/Habenfermedades.php"><span class="glyphicon glyphicon-asterisk"></span> Agregar enfermedades</a></li>
          <li class="list-group-item"><a href="../Admin/agregar_diversidad.php"><span class="glyphicon glyphicon-eye-close"></span> Agregar Diversidades Funcionales</a></li>
          <li class="list-group-item"><a href="../Admin/agregar_actividades.php"><span class="glyphicon glyphicon-tower"></span> Agregar actividades</a></li>
          <li class="list-group-item"><a href="../Admin/agregar_secciones.php"><span class="glyphicon glyphicon-tasks"></span>  Agregar secciones</a></li>
          <li class="list-group-item"><a href="../Admin/agregar_materia.php"> <span class="glyphicon glyphicon-book"></span> Agregar materias</a></li>   
          <li class="list-group-item"><a href="../admin/camb_header.php"><span class="glyphicon glyphicon-minus"></span>Cambiar Cabecera</a></li>
          <li class="list-group-item"><a href="../admin/actualizar_director.php"><span class="glyphicon glyphicon-pencil"></span> Actualizar directivo</a></li>
          
<?php if(@$_SESSION['nivel']=='Administrador'): ?>
         <li class="list-group-item"><a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks"></span> Movimientos en el sistema</a><span class="caret"></span>
          
          <ul class="dropdown-menu" role="menu">
          <li><a href="../Admin/bitacoras.php"><span class="
glyphicon glyphicon-th-list"></span> General</a></li>
          <li><a href="../Admin/por_fecha.php"><span class="glyphicon glyphicon-calendar"></span> Por fecha</a></li>
          <li><a href="../Admin/por_usuario.php"><span class="glyphicon glyphicon-user"></span> Por usuario</a></li>
          <li><a href="../Admin/por_mov.php"><span class="glyphicon glyphicon-hand-right"></span>  Por movimiento</a></li></ul>
           
</li>

<?php endif; ?>

</ul>
          </div>
      </div>
  </div>
<?php endif; ?>

<div class="row">
<div class="col-lg-12">
<center><img src="../imagenes/logoo.jpg" width="1000" height="100"></center>
</div>
</div>

<div class="row">

<div class="col-md-12">

  <div class="navbar navbar-default hidden-print">
  <div class="hidden-print">
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">

<?php if(@$_SESSION['nivel']=='Administrador' || @$_SESSION['nivel']=='Coordinador' || @$_SESSION['nivel']=='Secretaria' || @$_SESSION['nivel']=='Profesor'): ?>

     <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="glyphicon glyphicon-search"></span>
          Gesti&oacute;n<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>
            <a href="../gestion/menuins.php"><span class="glyphicon glyphicon-plus-sign"></span> Inscripci&oacute;n</a></li>
            <li>
            <a href="../gestion/asignar.php">Asignar Seccion</a></li>
<li class="dropdown-submenu"><a href="#">Reinscripci&oacute;n</a>
<ul class="dropdown-menu">
            <li>
                        
  <form class="form-inline" role="form" method="get" action="../gestion/menureins.php">
  <div class="form-group">
  <input type="text" pattern="[0-9]+" maxlength="8" id="cedula" name="cedula" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" class="form-control" required="required"><br>
  </div><button type="submit" class="btn btn-default form-control">Verificar</button>            
            </form>
            
            </li>

           </ul></li>

<?php endif; ?>

<?php if(@$_SESSION['nivel']=='Administrador' || @$_SESSION['nivel']=='Coordinador' || @$_SESSION['nivel']=='Secretaria'): ?>
<li class="dropdown-submenu"><a href="#">Retirar</a>
          <ul class="dropdown-menu">
            <li>
            
            
            
       <form class="form-inline" role="form" method="get" action="../gestion/retirar.php">
  <div class="form-group">
        <input type="text" pattern="[0-9]+" maxlength="8" id="cedula" name="cedulae" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" class="form-control" required="required"><br>
        <input type="text" id="motivo" name="motivo" placeholder="Ingrese el motivo" class="form-control" required="required"><br>
        <input type="text" id="inst_nva" name="inst_nva" placeholder="Instituci&oacute;n nueva" class="form-control" required="required"><br>
  </div><button type="submit" class="btn btn-default form-control">Retirar</button>            
            </form>
            
            </li>

           </ul></li>

          <li><a href="../gestion/reintegra.php">Reintegrar</a></li>
        </ul>
      </li>
      
<?php endif; ?>

<?php if(@$_SESSION['nivel']=='Administrador' || @$_SESSION['nivel']=='Coordinador' || @$_SESSION['nivel']=='Secretaria'): ?>

      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-folder-open"></span>  Consultas<b class="caret"></b></a>
         <ul class="dropdown-menu">
          <li class="dropdown-submenu"><a href="#">Consulta del estudiante</a>
          <ul class="dropdown-menu">
            <li>
            
            
       <form class="form-inline" role="form" method="get" action="../Consultas/consulta_estudiante.php">
  <div class="form-group">
        <input type="text" pattern="[0-9]+" maxlength="8" id="cedulae" name="cedulae" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" class="form-control" required="required"><br>
  </div><button type="submit" class="btn btn-default form-control">Buscar</button>            
            </form>
            
            </li>

           </ul></li>
          <li class="dropdown-submenu"><a href="#">Consulta de usuarios</a><ul class="dropdown-menu">
            <li> <form class="form-inline" role="form" method="get" action="../Consultas/consulta_usuario.php">
  <div class="form-group">
        <input type="text" pattern="[0-9]+" maxlength="8" id="cedula" name="cedulau" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" class="form-control" required="required">
  </div><button type="submit" class="btn btn-default form-control">Buscar</button>
</form>
</li>
           </ul></li>

          <li class="dropdown-submenu"><a href="#">Consulta de profesores</a><ul class="dropdown-menu">
            <li> <form class="form-inline" role="form" method="get" action="../Consultas/consulta_profesor.php">
  <div class="form-group">
        <input type="text" pattern="[0-9]+" maxlength="8" id="cedula" name="cedulap" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" class="form-control" required="required">
  </div><button type="submit" class="btn btn-default form-control">Buscar</button>
</form>
</li>
           </ul></li>
           </ul></li>

<?php endif; ?>
      

 <?php if(@$_SESSION['nivel']=='Administrador' || @$_SESSION['nivel']=='Coordinador' || @$_SESSION['nivel']=='Secretaria'): ?>
      
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span> Constancias<b class="caret"></b></a>
         <ul class="dropdown-menu">
          <li class="dropdown-submenu"><a href="#">Constancia de conducta</a>
          <ul class="dropdown-menu">
            <li>
            
            
            
       <form class="form-inline" role="form" method="get" action="../constancias/conducta.php">
  <div class="form-group">
        <input type="text" pattern="[0-9]+" maxlength="8" id="cedula" name="cedula" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" class="form-control" required="required"><br>
  </div><button type="submit" class="btn btn-default form-control">Generar constancia</button></form></li></ul></li>
     
  
  <li class="dropdown-submenu"><a href="#">Constancia de retiro</a><ul class="dropdown-menu">
            <li> <form class="form-inline" role="form" method="get" action="../constancias/retiro.php">
  <div class="form-group">
        <input type="text" pattern="[0-9]+" maxlength="8" id="cedula" name="cedula" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" class="form-control" required="required">
  </div><button type="submit" class="btn btn-default form-control">Generar constancia</button>
</form></li></ul></li>

          <li class="dropdown-submenu"><a href="#">Constancia de egreso</a><ul class="dropdown-menu">
            <li> <form class="form-inline" role="form" method="get" action="../constancias/egreso.php">
  <div class="form-group">
        <input class="form-control" pattern="[0-9]+" type="text" maxlength="8" name="cedula" pattern="[0-9]+" id="cedula" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" required="required"><br>
  </div><button type="submit" class="btn btn-default form-control">Generar constancia</button>
</form></li></ul></li>


          <li class="dropdown-submenu"><a href="#">Justificacion de retiro</a><ul class="dropdown-menu">
            <li> <form class="form-inline" role="form" method="get" action="../constancias/justificacion.php">
  <div class="form-group">
                <input class="form-control" pattern="[0-9]+" type="text" maxlength="8" name="cedula" pattern="[0-9]+" id="cedula" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" required="required"><br>
  </div><button type="submit" class="btn btn-default form-control">Generar justificacion</button>
</form></li></ul></li>

          <li class="dropdown-submenu"><a href="#">Constancia de estudio</a>
          <ul class="dropdown-menu">
            <li>
       <form class="form-inline" role="form" method="get" action="../constancias/estudio.php">
  <div class="form-group">
                <input class="form-control" pattern="[0-9]+" type="text" maxlength="8" name="cedula" pattern="[0-9]+" id="cedula" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" required="required"><br>
  </div><button type="submit" class="btn btn-default form-control">Generar constancia</button></form></li></ul></li></ul></li>

<?php endif; ?>  

 <?php if(@$_SESSION['nivel']=='Administrador' || @$_SESSION['nivel']=='Coordinador' || @$_SESSION['nivel']=='Secretaria'): ?>

<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span> Reportes<b class="caret"></b></a>
        <ul class="dropdown-menu">
<li class="dropdown-submenu"><a href="#">Generar planilla de estudiante</a>
          <ul class="dropdown-menu">
          <li>
          <form class="form-inline" role="form" method="get" action="../planilla.php">
  <div class="form-group">
  <input type="text" pattern="[0-9]+" maxlength="8" id="cedula" name="cedula" placeholder="Ingrese cedula (solo numeros)" title="Solo numeros en este campo. Ej: 11222333" class="form-control" required="required"><br>
  </div><button type="submit" class="btn btn-default form-control">Generar</button>            
            </form></li></ul></li>
          <li><a href="../reportes/inscritos.php">Listado de estudiantes inscritos</a></li>
          <li><a href="../reportes/retirados.php">Listado de estudiantes retirados</a></li>
          <li><a href="../reportes/egresados.php">Listado de estudiantes egresados</a></li>
          <li><a href="../reportes/nombre.php">Listado de estudiantes ordenado por nombre</a></li>
          <li><a href="../reportes/seccion.php">Listado de estudiantes por secci&oacute;n</a></li>
          <li><a href="../reportes/as.php">Listado de estudiantes por seccion y a&ntilde;o</a></li>
          <li><a href="../reportes/sexo_edad.php">Listado de estudiantes por sexo y edad</a></li>

<?php if(@$_SESSION['nivel']=='Administrador'): ?>
          <li><a href="../reportes/cs.php">Listado de coordinadores y secretarias</a></li>
<?php endif ?></ul></li>

  <?php endif; ?>      

<?php if(@$_SESSION['nivel']=='Administrador' || @$_SESSION['nivel']=='Coordinador' || @$_SESSION['nivel']=='Secretaria'): ?>

<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['usuario']; ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li class="dropdown-submenu"><a href="#">Seguridad y respaldos</a>
          <ul class="dropdown-menu">
          <li>
          <li><a href="../respaldos/exportar.php">Exportar</a></li>
          <li class="dropdown-submenu"><a href="#">Restaurar</a>
<ul class="dropdown-menu">
            <li>
                        
       <form class="form-inline" role="form" method="POST" action="../respaldos/importar.php">
  <div class="form-group">
            <input name="enviar2" type="file" class="botonsubir" id="enviar" required/>
  </div><button type="submit" class="btn btn-default form-control">Restaurar</button>            
            </form></li></ul></li></li></ul></li></ul></li>
            <?php endif ?>
 
    </ul>
  </div>  
  </div><!-- /.navbar-collapse -->


</div>
</div>


<div class="row">
  <div class="col-sm-12 col-lg-12 col-md-12">
    <div class="col-sm-3 col-md-3 user-details hidden-print">
            <div class="user-image">
                <img src="http://www.gravatar.com/avatar/2ab7b2009d27ec37bffee791819a090c?s=100&d=mm&r=g" class="img-circle">
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3><?php echo $_SESSION['usuario']; ?></h3>
                    <span class="help-block"><?php echo $_SESSION['correo']; ?></span>
                </div>
                <ul class="navigation">
                    <li>
                        <a href="../logout.php">
                            <span class="glyphicon glyphicon-user"></span><label>Cerrar sesion</label>
                        </a>
                    </li>
                    <?php if($_SESSION['usuario']!='Invitado'): ?>
                    <li>
                        <?php echo sprintf('<a href="../consultas/modifica_usu.php?cedula=%s">',$_SESSION['cedula']);?>

                            <span class="glyphicon glyphicon-cog"></span><label>Modificar datos</label>
                        </a>
                    </li>
                  <?php endif; ?>
                </ul>
                </div>
            </div>