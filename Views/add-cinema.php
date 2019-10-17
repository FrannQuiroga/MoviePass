
<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Ingreso de Cines</h6>
  </div>
</div>
<div class="wrapper row3" style="background-color:#EAEDED;">
  <main class="container" style="width: 90%;"> 
    <!-- main body -->
    <div class="content" > 
      <div id="comments" style="align-items:center;">
        <h2>Ingresar Cine</h2>
        <form action="<?php echo FRONT_ROOT ?>Cinema/Add" method="post"  style="padding: 2rem !important;">
          <table> 
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Capacidad</th>
                <th>Direccion</th>
                <th>Valor de entrada</th>
              </tr>
            </thead>
            <tbody allign="center">
              <tr>
                <td style="width: 350px;">
                  <input type="text" name="name" value="" size="22" required>
                </td>
                <td>
                  <input type="number" name="capacity" min="1" max="999" size="10" required>
                </td>
                <td style="width: 350px;">
                  <input type="text" name="address" value="" size="22" required>
                </td>
                <td>
                  <input type="number" name="price" min="1" max="999" size="10" required>
                </td>        
              </tr>
              </tbody>
          </table>
          <div>
            <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;"/>
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
  