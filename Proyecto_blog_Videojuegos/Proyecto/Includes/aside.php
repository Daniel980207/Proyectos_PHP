<?php require_once 'helpers.php';
?>
    <aside id="aside">
        <?php if(isset($_SESSION['usuario'])):?>
        <div id="usuario-logueado" class="Block_aside">
            <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'] ?></h3>
            <!--Bloque-->
            <a href="cerrar.php" class="bt bt-verde" >Crear entradas</a>
            <a href="cerrar.php" class="bt " >Crear categorias</a>
            <a href="cerrar.php" class="bt bt-naranja" >Mis datos</a>
            <a href="cerrar.php" class="bt bt-red" >Cerrar sesión</a>
        </div>
        <?php endif;?>
        <div id="login" class="Block_aside">
            <h3>Identificate</h3>

        <?php if(isset($_SESSION['error_login'])):?>
        <div  class="alert alert-error">
            <h3> <?= $_SESSION['error_login'] ?></h3>
        </div>
        <?php endif;?>

            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">

                <input type="submit" value="Enviar">

            </form>
        </div>
        <div id="register" class="Block_aside">
            <h3>Register</h3>
            <!--Mostrar errores-->
            <?php if(isset($_SESSION['completado'])):?>
                <div class="alert alert-exit">
                <?=$_SESSION['completado'];?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])):?>
                <div class="alert alert-error">
                <?=$_SESSION['errores']['general'];?>
                </div>
            <?php endif;?>

            <form action="./Includes/register.php" method="post" enctype="multipart/formPOST">

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
                <?php echo isset($_SESSION['errores'])?mostrarERROR($_SESSION['errores'],'nombre'):''?>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos">
                <?php echo isset($_SESSION['errores'])?mostrarERROR($_SESSION['errores'],'apellidos'):''?>

                <label for="email">Email</label>
                <input type="email" name="email" id="email2">
                <?php echo isset($_SESSION['errores'])?mostrarERROR($_SESSION['errores'],'email'):''?>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password2">
                <?php echo isset($_SESSION['errores'])?mostrarERROR($_SESSION['errores'],'password'):''?>

                <input type="submit" value="Registro" id="registro">

            </form>
            <?php borrarErrores();?>
        </div>
    </aside>