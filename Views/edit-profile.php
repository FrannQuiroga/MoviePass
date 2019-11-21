<?php 
include_once('header.php');
include_once('nav-bar.php');
require_once('validate-session.php');
?>

<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Editar datos personales</h6>
    <a href="<?php echo FRONT_ROOT ?>User/EditProfile"  class="btn" style="background-color:GREEN;color:white;" >Volver</a>
  </div>
</div>

<div class="wrapper row3" style="background-color: #EAEDED;">
    <main class="container" > 
    
      <div class="content" > 
        <div id="comments" style="align-items:center;">
          <h2>Ingrese sus datos:</h2>
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
                    <input type="text" name="name" value="<?php echo $user->getUserProfile()->getName();?>" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="text" name="surname" value="<?php echo $user->getUserProfile()->getSurname();?>" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="number" name="document" value="<?php echo $user->getUserProfile()->getDocument();?>" min="1" max="99999999" size="10" required>
                  </td>
                </tr>
                </tbody>
            </table>
            <div>
              <input type="submit" class="btn" value="Editar" style="background-color:#DC8E47;color:white;"/>
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