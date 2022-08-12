<?php
//iniciar la sesion y la conexion a bd
require_once './Includes/conexion.php';

//recoger datos del formulario
if(isset($_POST)){

	if(isset($_SESSION['error_login'])){
		session_unset($_SESSION['error_login']);
	}

    $email=trim($_POST["email"]);
    $password=$_POST["password"];
    //consultar para comprobar las credenciales del usuarios

    $sql="SELECT * FROM usuario WHERE email = '$email'";
    $login=mysqli_query($db,$sql);

    if($login && mysqli_num_rows($login)==1){
        $usuario=mysqli_fetch_assoc($login);
        var_dump($usuario);

        //comprobar la contraseña

        $verify=password_verify($password,$usuario['passwords']);

        //Ultilizar una sesion para guardar los datos del usuario logueado

        if($verify){
            $_SESSION['usuario']=$usuario;

        }else{
            //si algo falla enviar una sesion con el fallo
            $_SESSION['error_login']="Login incorrecto";
        }
    }else{
        $_SESSION['error_login']="Login incorrecto";
    }
}
header('Location:index.php');

//redirigir al index.php

?>