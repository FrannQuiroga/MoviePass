
<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  
<br>
  <div class="card shadow-sm" style="width:400px;height:530px;margin-left:auto;margin-right:auto;background-color: #EAEDED;padding: 2rem !important;">
    <article class="card-body">
      <a href="<?php echo FRONT_ROOT?>User/ShowAddView" class="float-right btn btn-outline-primary">Registrarse</a>
      <h4 class="card-title mb-4 mt-1"style="color:black">Login</h4><br>
      <p class="text-center"style="color:grey">Ingrese con Facebook</p>
      <a href="" class="btn btn-block btn-facebook" style="background-color:#3B5998;color:white;"> <i class="fab fa-facebook-f"></i> &nbsp; facebook</a>
      <hr><p class="divider-text text-center" style="color:black;">
        Ó
      </p><hr>
      <p class="text-center"style="color:grey">Ingrese su usuario y contraseña</p>
      <form action="<?php echo FRONT_ROOT ?>" method="post">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          </div>
          <input name="email" class="form-control" placeholder="Email" type="email" required>
        </div><br>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
          <input name="password" class="form-control" placeholder="************" type="password" required>
        </div>
        <br><br>                                   
        <input type="submit" class="btn btn-block" value="Login" style="background-color:#DC8E47;color:white;"/>
        <br><a class=" small" href="#">Olvidaste tu contraseña?</a>                                                                
    </form>
    </article>
  </div> <!-- card.// -->

  <!--<div class="col-md-6 hoc"style="align-items:center;">
    <div class="center card shadow-sm " style="background-color: #EAEDED;padding: 2rem !important;" >
      <form action="<?php echo FRONT_ROOT ?>" method="post">    
          <strong class="d-inline-block mb-2 text-primary"><i class="fa fa-user"></i>  Usuario</strong>
          <div class="form-group input-group">
    	      <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input name="" class="form-control" placeholder="ingrese su email..." type="email">
          </div>
          <strong class="d-inline-block mb-2 text-primary"><i class="fa fa-lock"></i>  Contraseña</strong>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="" class="form-control" placeholder="Ingrese su contraseña..." type="password">
          </div>
          
          <br>
          <input type="submit" class="btn" value="Login" style="background-color:#DC8E47;color:white;"/>
      </form>
      <a style="color:black;">ó</a>
      <div>
        <a class="btn" style="background-color:GREEN;color:white;" role="button" href="<?php echo FRONT_ROOT?>User/ShowAddView">Registrarse</a>
        
        <a role="button" href="" style="background-color:#3B5998;color:white;" class="btn  btn-facebook"> <i class="fab fa-facebook-f"></i>        Login via facebook</a>
      </div>
    </div>
  </div>-->

<?php 
include_once('footer.php');
?>