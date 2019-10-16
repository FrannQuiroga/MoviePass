<?php 
  include_once('header.php');
  include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Listado de Generos</h6>
  </div>
</div>

<div class="center card shadow-sm " >   
    <div class="form-group nospace inline  ">
      <h6 class= "mb-1 text-muted small"><br>Ordenar por</h6>
      <form action="<?php echo FRONT_ROOT ?>Genre/Get" method="get">
        <input type="radio" name="ordered" value="name asc" onclick="this.form.submit()" checked ><h6 class= "mb-1 text-muted small">Nombre [A-Z]</h6>
        <input type="radio" name="ordered" value="name desc" onclick="this.form.submit()"><h6 class= "mb-1 text-muted small">Nombre [Z-A]</h6>
      </form>
    </div>
  </div>
</div>

<div >
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div >
            <table style="text-align:center;">
              <thead>
                <tr>
                  <th style="width: 80px;">Id</th>
                  <th style="width: 250px;">Nombre</th>
                  <th style="width: 250px;">Cantidad de peliculas actuales</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach($genreList as $genre){?>
                  <tr>
                      <td><?php echo $genre->getId(); ?></td>
                      <td><?php echo $genre->getName(); ?></td>
                      <td>¡Ni idea!</td>
                  </tr>
                <?php } ?>
              </tbody>
          </table>
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
  include_once('footer.php');
?>