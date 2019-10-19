
<?php 
  include_once('header.php');
  include_once('nav-bar.php');
?>

      <div id="breadcrumb" class="hoc clear" > 
        <h6 class="heading">Listado de Salas</h6>
      </div>
    </header>
  </div>
</div>

<div class="center card shadow-sm " >   
  <div class="form-group nospace inline  ">
    <h6 class= "mb-1 text-muted small"><br>Ordenar por</h6>
    <form action="<?php echo FRONT_ROOT ?>Room/ShowListView" method="get">
      <input type="radio" name="orderedBy" value="name" onclick="this.form.submit()" <?php if($orderedBy =="name") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Nombre</h6>
      <input type="radio" name="orderedBy" value="capacity" onclick="this.form.submit()" <?php if($orderedBy =="capacity") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Capacidad</h6>
    </form>
  </div>
</div>


<div style="background-color: #EAEDED;padding: 2rem !important;">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">

            <table style="text-align:center;">
              <thead>
                <tr>
                  <th style="width: 300px;">Nombre</th>
                  <th style="width: 100px;">Capacidad</th>
                  <th style="width: 300px;">Cine</th>
                  <th style="width: 200px;" colspan=3>Acccion </th>
                  <!--<th style="width: 100px;">Acccion </th>-->
                </tr>
              </thead>
              <tbody>
                <?php foreach($roomList as $room){?>
                  <tr>
                    <td><?php echo $room->getName(); ?></td>
                    <td><?php echo $room->getCapacity(); ?></td>
                    <td><?php foreach($cinemaList as $cinema){ if($cinema->getId() == $room->getIdCinema())echo $cinema->getName();} ?></td>
                    <td>
                      <form action="<?php echo FRONT_ROOT ?>Room/Get" method="get">
                        <button type="submit" class="btn" name="id" style="background-color:GREEN;color:white;" value="<?php echo $room->getId();?>">Ver</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo FRONT_ROOT ?>Room/Edit" method="post">
                      <button type="submit" class="btn" name="id" style="background-color:#DC8E47;color:white;" value="<?php echo $room->getId();?>">Editar</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo FRONT_ROOT ?>Room/Remove" method="post">
                        <button type="submit" class="btn" style="background-color:RED;color:white;" name="id" value="<?php echo $room->getId();?>">Remover</button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
          </table>
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
  