
<?php 
  include_once('header.php');
  include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear" > 
    <h6 class="heading"><?php if($roomList == null)
                        {
                          echo "No hay salas disponibles.";
                        }else
                        { echo "Cine: ". $roomList[0]->getCinema()->getName();?></h6>
  </div>
</div>

  <div class="center card shadow-sm " >   
    <div class="form-group nospace inline  ">
      <h6 class= "mb-1 text-muted small"><br><!--Ordenar por--></h6>
      <form action="<?php echo FRONT_ROOT ?>Room/ShowListView" method="get">
        <!--<input type="radio" name="orderedBy" value="name" onclick="this.form.submit()" <?php if($orderedBy =="name") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Nombre</h6>
        <input type="radio" name="orderedBy" value="capacity" onclick="this.form.submit()" <?php if($orderedBy =="capacity") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Capacidad</h6>
      </form>-->
    </div>
  </div>

  <div class="wrapper row3" style="background-color: #EAEDED;">
    <main class="hoc container clear"> 
      <!-- main body -->
      <div class="content"> 
        <div class="scrollable">
          <h6 class="heading" style="float:left">Listado de Salas</h6>
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
                      <td><?php echo $room->getCinema()->getName(); ?></td> <!--MODIFICADO(OBJETO CINE)-->
                      <td>
                        <form action="<?php echo FRONT_ROOT ?>Room/Get" method="get">
                          <button type="submit" class="btn" name="id" style="background-color:GREEN;color:white;" value="<?php echo $room->getId();?>">Funciones</button>
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
                  <?php } }?>
                </tbody>
            </table>
          </form>
        </div>
      </div>
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>

  <div class="bgded overlay" style="background-image:url('https://media.wired.com/photos/5c086b7d1554ed7f00412f8c/125:94/w_2375,h_1786,c_limit/Moviepass-746083947.jpg');">
<?php 
  include_once('footer.php');
?>
  