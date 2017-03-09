<?php
session_start();
if(!empty($_SESSION['login_user']))
{
/*header('Location: home.php');*/
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<link rel="icon" type="image/png" href="/todo/assets/img/favicon.png" />
<title>Navitodolist</title>
 <!-- añadir jQuery -->
<script type="text/javascript" src="/todo/assets/js/jquery-3.1.1.min.js"></script>
<!-- añadir jQuery-UI -->
        <script src="/todo/assets/js/jquery-ui.min.js"></script>
		<script src="/todo/assets/js/jquery.ui.shake.js"></script>

<!-- script ajax login -->
        <script src="/todo/assets/js/login.js"></script>	

 <!-- añadir bootstrap -->
<link rel="stylesheet" type="text/css" href="/todo/assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/todo/assets/bootstrap/css/bootstrap-theme.css">

         <!-- añadir hojas de estilos -->
<link rel="stylesheet" type="text/css" href="/todo/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="/todo/assets/css/login.css">
</head>

<body>


<div  class=" header col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php
if(!empty($_SESSION['login_user']))
{
?>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 system left text-left">
			<?php   print "<span class='btn-logout'>Bienvenido: ".$_SESSION['login_user']."</span>"; ?>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 system right text-right">
			<a href="logout.php"><span  class="btn-logout">Salir  <span class="glyphicon glyphicon-off" aria-hidden="true"></span></span></a>
		</div>
			
		<div  id="titulo-header" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center">

			<h2 style="margin:5px">AGREGUE ELEMENTO A COLUMNA PENDIENTE</h2>
		</div>
		
		<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center">
			<div  class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
				<input type="text" id="myInput" placeholder="Agregue Elemento" maxlength="20">
				<span onclick="newElement()" class="addBtn"><span class="glyphicon glyphicon-plus" aria-hidden="true" title="Agrega elemento"></span></span>
			</div>
		 </div>
<?php
} else {
?>

            

	
	<div id="box" class=" center col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-1">
<form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label class="control-label col-sm-12 text-left" for="username"><span class="glyphicon glyphicon-user"></span> Usuario</label>
    <div class="col-sm-12">
      <input maxlength="20" type="text" name="username" class="form-control" id="username" placeholder="Ingrese Usuario">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-12 text-left" for="password"> <span class="glyphicon glyphicon-lock "> </span> Password</label>
    <div class="col-sm-12"> 
      <input maxlength="8" type="password" name="password" class="form-control password"  autocomplete="off" id="password" placeholder="Ingrese Password" >  
   </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <input type="submit" class="button button-primary" value="Ingresar" id="login"/> 
    
    </div>
  </div>
        <div id="error"></div>
</form>
</div>
<?php
}
?>	
</div>

<div class="nvc-ribbon" style="height:10px;">
        <div class="nvc-ribbon__section nvc-ribbon__section--alpha"></div>
        <div class="nvc-ribbon__section nvc-ribbon__section--beta"></div>
        <div class="nvc-ribbon__section nvc-ribbon__section--gamma"></div>
        <div class="nvc-ribbon__section nvc-ribbon__section--delta"></div>
</div>
  
  
  
  <div id="over-main">
<div id="main" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php
if(!empty($_SESSION['login_user']))
{
?>
<div id="contenedor" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div id="cont-list-todo" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<center><h2>PENDIENTES</h2></center>
		<div id="menu-pend" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 menu-listas">
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<span  class="btn-select-all-pend" title="Selecciona todos los elementos"><span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span></span>
			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<span  class="btn-ord-up" title="Orden Ascendente"><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></span>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<span  class="btn-ord-dw" title="Orden Descendente"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></span>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<span  class="btn-pass-list" title="Pasar elementos Seleccionados"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span></span>
			</div>
		</div>
		<ul id="myUL" class="list-1" >
		</ul>
	</div>

	<div id="cont-list-listo" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<center><h2>LISTOS</h2></center>
		<div id="menu-list" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 menu-listas">
		
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<span  class="btn-pass-pend" title="Pasar elementos Seleccionados"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></span>			
				
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<span  class="btn-ord-up"  title="Orden Ascendente"><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></span>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<span  class="btn-ord-dw"  title="Orden Descendente"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></span>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<span  class="btn-select-all-list" title="Selecciona todos los elementos"><span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span></span>
			</div>
		</div>
	<ul id="myUL-2"  class="list-1" >

	</ul>
	</div>
</div>


<?php
}else{
?>


<div id="home-title" class="col-lg-12 col-md-12 col-xs-12 col-md-12 disp-table center" >  
<center><h1>ToDo LIST Ver 1.0</h1></center>  
<center><h5>Desarrollado por: Cesar Rodriguez</h5></center>          
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 disp-table-cell">
                   <img src="/todo/assets/img/navitodolist.jpg">     
                </div>

                        
</div>

<?php
}
?>

</div>
</div>

<?php
if(!empty($_SESSION['login_user']))
{
?>
 <!--  javascript funcionamiento todo -->
 <script type="text/javascript" src="/todo/assets/js/todo.js"></script>
 

<?php
}
?>
<!--  javascript bootstrap --> 
 <script type="text/javascript" src="/todo/assets/bootstrap/js/bootstrap.js"></script>


</body>
</html>