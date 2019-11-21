<?php 
include_once('header.php');
include_once('nav-bar.php');
?>
<br>

  <div class="card shadow-sm" style="width:400px;height:660px;margin-left:auto;margin-right:auto;background-color: #EAEDED;padding: 2rem !important;">
    <article class="card-body ">
      <h4 class="card-title mb-4 mt-1 text-center"style="color:black">Crear cuenta</h4>
      <p class="text-center"style="color:grey">Registrarse con Facebook</p>
      <a href="" class="btn btn-block btn-facebook" style="background-color:#3B5998;color:white;"> <i class="fab fa-facebook-f"></i> &nbsp; facebook</a>
      <hr><p class="divider-text text-center" style="color:black;">
        Ó
      </p><hr>
      <p class="text-center"style="color:grey">Ingrese sus datos para crear su cuenta gratis</p>
      <form action="<?php echo FRONT_ROOT ?>User/Add" method="post"  style="padding: 2rem !important;">
        <div class="form-group input-group">
          <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          </div>
          <input name="name" class="form-control" placeholder="Nombre/s" type="text" required>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          </div>
          <input name="surname" class="form-control" placeholder="Apellido/s" type="text" required>
        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
          </div>
          <input name="document" class="form-control" placeholder="Documento" type="number" required>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
          </div>
          <input name="email" class="form-control" placeholder="Email" type="email" required>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
          <input name="password" class="form-control" placeholder="************" type="password" size="10" required>
        </div> <!-- form-group// -->
        <br>                                    
        <input type="submit" class="btn btn-block" value="Crear cuenta" style="background-color:#DC8E47;color:white;"/><br>
        <p class="small text-center"style="color:grey">Ya tienes cuenta? <a href="<?php echo FRONT_ROOT ?>User/ShowLoginView">Ingresar</a> </p>                                                                 
    </form>
    </article>
  </div> <!-- card.// -->

  <!--<div class="wrapper row3" style="background-color: #EAEDED;">
    <main class="container" > 
    
      <div class="content" > 
        <div id="comments" style="align-items:center;">
          <h2>Ingrese sus datos</h2>
          <form action="<?php echo FRONT_ROOT ?>User/Add" method="post"  style="padding: 2rem !important;">
            <table> 
              <thead class="center">
                <tr>
                  <th>Nombre/s</th>
                  <th>Apellido/s</th>
                  <th>Documento</th>
                </tr>
              </thead>
              <tbody allign="center">
                <tr>
                  <td style="width: 150px;">
                    <input type="text" name="name" value="" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="text" name="surname" value="" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="number" name="document" min="1" max="99999999" size="10" required>
                  </td>
                </tr>
                </tbody>
            </table>
            <table> 
              <thead class="center">
                <tr>
                  <th>Email</th>
                  <th>Contraseña</th>
                  <th>Repita contraseña</th>
                </tr>
              </thead>
              <tbody allign="center">
                <tr>
                  <td style="width: 150px;">
                    <input type="text" name="email" value="" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="text" name="password" value="" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="text" name="" value="" size="22" required>
                  </td>
                </tr>
                </tbody>
            </table>
            <div>
              <input type="submit" class="btn" value="Registrarse" style="background-color:#DC8E47;color:white;"/>
            </div>
          </form>
        </div>
      </div>
      
      <div class="clear"></div>
    </main>
  </div>-->


<?php 
include_once('footer.php');
?>