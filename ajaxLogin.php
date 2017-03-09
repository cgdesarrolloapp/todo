<?php
$user= strtolower ($_POST['username']);
$pass= strtolower($_POST['password']);

$resultado;
if ($user=="admin" and $pass=="abcd5678"){
	
	session_start();
	$_SESSION['login_user'] = $user;
	$resultado=1;
	echo $resultado;	
} else{
	$resultado= 0;
	echo $resultado;
} 
?> 