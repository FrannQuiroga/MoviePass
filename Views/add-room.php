<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
      <h6 class="heading">Ingreso de Salas</h6>
  </div>

  <div class="wrapper row3" style="background-color: #EAEDED;">
    <main class="container" > 
      <!-- main body -->
      <div class="content" > 
        <div id="comments" style="align-items:center;">
          <h2>Ingresar Sala</h2>
          <form action="<?php echo FRONT_ROOT ?>Room/Add" method="post"  style="padding: 2rem !important;">
            <table> 
              <thead class="center">
                <tr>
                  <th>Nombre</th>
                  <th>Capacidad</th>
                  <th>Cines disponibles</th>
                </tr>
              </thead>
              <tbody allign="center">
                <tr>
                  <td style="width: 420px;">
                    <input type="text" name="name" value="" size="22" required>
                  </td>
                  <td style="width: 205px;">
                    <input type="number" name="capacity" min="1" max="999" size="10" required>
                  </td>
                  <td>
                    <select name="idCinema" style="margin-right:3px;height:43px;width:420px;" required>
                    <?php foreach ($cinemaList as $cinema){ ?>
                      <option value="<?php echo $cinema->getId()?>"><?php echo $cinema->getName();?></option>
                    <?php } ?>      
                    </select>
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
  