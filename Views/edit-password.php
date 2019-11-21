<?php 
include_once('header.php');
include_once('nav-bar.php');
require_once('validate-session.php');
?>

<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Editar datos personales</h6>
    <a href="<?php echo FRONT_ROOT ?>User/ShowProfileView"  class="btn" style="background-color:GREEN;color:white;" >Volver</a>
  </div>
</div>

<div class="wrapper row3" style="background-color: #EAEDED;">
    <main class="container" > 
    
      <div class="content" > 
        <div id="comments" style="align-items:center;">
          <h2>Ingrese su nueva contraseña:</h2>
          <form action="<?php echo FRONT_ROOT ?>User/EditPassword" method="post"  style="padding: 2rem !important;">
            <table> 
              <thead class="center">
                <tr>
                  <th>Contraseña</th>
                  <th>Repita contraseña</th>
                </tr>
              </thead>
              <tbody allign="center">
                <tr>
                  <td style="width: 150px;">
                    <input type="password" name="password1" value="<?php echo $user->getPassword();?>" size="10" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="password" name="password2" value="<?php echo $user->getPassword();?>" size="10" required>
                  </td>
                </tr>
                </tbody>
            </table>
            <div>
              <input type="submit" class="btn" value="Cambiar" style="background-color:#DC8E47;color:white;"/>
            </div>
          </form>
        </div>
      </div>
      
      <div class="clear"></div>
    </main>
</div>

<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>