<?php 
include_once('header.php');
include_once('nav-bar.php');
?>
<div class="wrapper row3" style="background-color: #EAEDED;">
    <main class="container" > 
    
      <div class="content" > 
        <div id="comments" style="align-items:center;">
          <h2>Ingrese sus datos nuevos <?php echo $user->getName();?></h2>
          <form action="<?php echo FRONT_ROOT ?>User/edit" method="post"  style="padding: 2rem !important;">
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
                    <input type="text" name="name" value="<?php echo $user->getName()?>" placeholder= "<?php echo $user->getName()?>" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="text" name="surname" value="<?php echo $user->getSurname()?>" placeholder= "<?php echo $user->getSurname()?>" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="number" name="document" min="1" max="99999999" value="<?php echo $user->getDocument()?>" placeholder= "<?php echo $user->getDocument()?>"  size="10" required>
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
                    <input type="text" name="email" value="<?php echo $user->getEmail()?>" placeholder= "<?php echo $user->getEmail()?>" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="text" name="password" value="<?php echo $user->getPassword()?>" placeholder= "<?php echo $user->getPassword()?>" size="22" required>
                  </td>
                  <td style="width: 150px;">
                    <input type="text" name="" value="<?php echo $user->getPassword()?>" placeholder= "<?php echo $user->getPassword()?>" size="22" required>
                  </td>
                  <input type="hidden" name="id" value="<?php echo $user->getId()?>">
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