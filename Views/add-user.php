<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Registro de usuario</h6>
  </div>
</div>

<div class="wrapper row3" style="background-color: #EAEDED;">
  <main class="container" > 
    <!-- main body -->
    <div class="content" > 
      <div id="comments" style="align-items:center;">
        <h2>Ingrese sus datos</h2>
        <form action="<?php echo FRONT_ROOT ?>User/Add" method="post"  style="padding: 2rem !important;">
          <table> 
            <thead class="center">
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Repita contraseña</th>
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
                <td style="width: 150px;">
                  <input type="text" name="email" value="" size="22" required>
                </td>
                <td style="width: 150px;">
                  <input type="text" name="password" value="" size="22" required>
                </td>
                <td style="width: 150px;">
                  <input type="text" name="re_password" value="" size="22" required>
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
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>


<?php 
include_once('footer.php');
?>