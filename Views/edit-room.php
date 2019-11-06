<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
      <h6 class="heading"><?php echo "Sala: ".$room->getName();?></h6>
  </div>
</div>

<div class="wrapper row3" style="background-color: #EAEDED;">
    <main class="container" > 
        <!-- main body -->
        <div class="content" > 
        <div id="comments" style="align-items:center;">
            <h2>Ingresar Datos a modificar</h2>
            <form action="<?php echo FRONT_ROOT ?>Room/Edit" method="post"  style="padding: 2rem !important;">
            <table> 
                <thead class="center">
                <tr>
                    <th>Nombre</th>
                    <th>Capacidad</th>
                    <th>Cine</th>
                </tr>
                </thead>
                <tbody allign="center">
                <tr>
                    <td style="width: 420px;">
                    <input type="text" name="name" value="<?php echo $room->GetName()?>" placeholder= "<?php echo $room->getName()?>" size="22" required>
                    </td>
                    <td style="width: 205px;">
                    <input type="number" name="capacity" value="<?php echo $room->GetCapacity()?>" placeholder= "<?php echo $room->getCapacity()?>" min="1" max="999" size="10" required>
                    </td>
                    <td>
                    <select name="idCinema" style="margin-right:3px;height:43px;width:420px;" required>
                        <option value="<?php echo $room->getCinema()->getId()?>"><?php echo $room->getCinema()->getName();?></option>      
                    </select>
                    </td>
                    <input type="hidden" name="id" value="<?php echo $room->getId()?>">     
                </tr>
                </tbody>
            </table>
            <div>
                <input type="submit" class="btn" value="Modificar" style="background-color:#DC8E47;color:white;"/>
            </div>
            </form>

        </div>
        </div>
        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>

<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>