
<?php 
  include_once('header.php');
  include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear" style="background-image:url('<?php echo IMG_PATH; ?>MoviePassButacas.png');"> 
    <h6 class="heading">Listado de Cines</h6>
  </div>
</div>

<div class="center card shadow-sm " >   
    <div class="form-group nospace inline  ">
      <h6 class= "mb-1 text-muted small"><br>Ordenar por</h6>
      <form action="<?php echo FRONT_ROOT ?>Cinema/ShowListView" method="get">
        <input type="radio" name="orderedBy" value="name" onclick="this.form.submit()" <?php if($orderedBy =="name") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Nombre</h6>
        <input type="radio" name="orderedBy" value="capacity" onclick="this.form.submit()" <?php if($orderedBy =="capacity") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Capacidad</h6>
        <input type="radio" name="orderedBy" value="price" onclick="this.form.submit()" <?php if($orderedBy =="price") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Precio</h6>
      </form>
    </div>
  </div>
</div>

<div class="wrapper row3" style="background-color: #EAEDED;">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">

            <table style="text-align:center;">
              <thead>
                <tr>
                  <th style="width: 300px;">Nombre</th>
                  <th style="width: 100px;">Capacidad</th>
                  <th style="width: 300px;">Direccion</th>
                  <th style="width: 100px;">Precio </th>
                  <th style="width: 200px;" colspan=3>Acccion </th>
                  <!--<th style="width: 100px;">Acccion </th>-->
                </tr>
              </thead>
              <tbody>
                <?php foreach($cinemaList as $cinema){?>
                  <tr>
                    <td><?php echo $cinema->getName(); ?></td>
                    <td><?php echo $cinema->getCapacity(); ?></td>
                    <td><?php echo $cinema->getAddress(); ?></td>
                    <td><?php echo "$" . $cinema->getPrice(); ?></td>
                    <td>
                      <form action="<?php echo FRONT_ROOT ?>Cinema/Get" method="get">
                        <button type="submit" class="btn" name="id" style="background-color:GREEN;color:white;" value="<?php echo $cinema->getId();?>">Ver</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo FRONT_ROOT ?>Cinema/Edit" method="post">
                      <button type="submit" class="btn" name="id" style="background-color:#DC8E47;color:white;" value="<?php echo $cinema->getId();?>">Editar</button>
                      </form>
                    </td>
                    <td>
                      <form action="<?php echo FRONT_ROOT ?>Cinema/Remove" method="post">
                        <button type="submit" class="btn" name="id" style="background-color:RED;color:white;" value="<?php echo $cinema->getId();?>">Remover</button>
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
  