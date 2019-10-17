
<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Bienvenido!</h6>
  </div>
</div>

<div class="center card shadow-sm " style="background-color: #EAEDED;padding: 2rem !important;" >
    <form action="<?php echo FRONT_ROOT ?>" method="post">    
        <strong class="d-inline-block mb-2 text-primary">Usuario</strong>
        <input style="margin-left: auto;margin-right:auto;width: 300px;" type="text" placeholder=" Ingrese su usuario" name="username" value="" size="22" required><br>
        <strong class="d-inline-block mb-2 text-primary">Contraseña</strong>
        <input style="margin-left: auto;margin-right:auto;width: 300px;" type="password" placeholder=" Ingrese su contraseña" name="password" value="" size="22" required>
        <br>
        <input type="submit" class="btn" value="Ingresar" style="background-color:#DC8E47;color:white;"/>
    </form>
    <a>ó</a>
    <div>
        <a class="btn" style="background-color:GREEN;color:white;" role="button" href="<?php echo FRONT_ROOT?>User/ShowAddView">Registrarse</a>
        <a class="btn" style="background-color:BLUE;color:white;" role="button" href="">Ingresar con Facebook</a>
    </div>
    <br>
</div>

<?php 
include_once('footer.php');
?>