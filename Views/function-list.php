<?php 
  include_once('header.php');
  include_once('nav-bar.php');
  require_once('validate-admin.php');
?>

  <div id="breadcrumb" class="hoc clear" > 
    <h6 class="heading">Sala: <?php echo $room->getName();?></h6>
    <form action="<?php echo FRONT_ROOT ?>Function/ShowAddView" method="get">
              <button type="submit" class="btn" style="background-color:GREEN;color:white;" name="idRoom" value="<?php echo $room->getId();?>">Agregar Funcion</button>
            </form>
  </div>
</div>

  <div class="center card shadow-sm " >   
    <div class="form-group nospace inline  ">
      <h6 class= "mb-1 text-muted small"><br><!--Ordenar por--></h6>
      <!--<form action="<?php echo FRONT_ROOT ?>Function/ShowListView" method="get">
        <input type="radio" name="orderedBy" value="name" onclick="this.form.submit()" ><h6 class= "mb-1 text-muted small">Nombre</h6>
        <input type="radio" name="orderedBy" value="capacity" onclick="this.form.submit()" ><h6 class= "mb-1 text-muted small">Capacidad</h6>
      </form>-->
    </div>
  </div>

  <div class="wrapper row3" style="background-color: #EAEDED;">
    <main class="hoc container clear"> 
      <!-- main body -->
      <div class="content"> 
        <div class="scrollable">
          <h6 class="heading" style="float:left">Listado de Funciones</h6>
              <table style="text-align:center;">
                <thead>
                  <tr>
                    <th style="width: 100px;">Dia</th>
                    <th style="width: 100px;">Hora</th>
                    <th style="width: 600px;">Pelicula</th>
                    <th style="width: 100px;" colspan=3>Acccion </th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(!empty($functionList)) { foreach($functionList as $function) {?>
                    
                    <tr>
                      <td><?php echo $function->getDay(); ?></td>
                      <td><?php echo $function->getTime(); ?></td>
                      <td><?php echo $function->getMovie()->getTitle(); ?></td>
                      <td>
                        <form action="<?php echo FRONT_ROOT ?>Ticket/ShowListView" method="get">
                        <button type="submit" class="btn" name="idFunction" style="background-color:GREEN;color:white;" value="<?php echo $function->getId();?>">Entradas</button>
                        </form>
                      </td>
                      <td>
                        <form action="<?php echo FRONT_ROOT ?>Function/ShowEditView" method="post">
                        <button type="submit" class="btn" name="idFunction" style="background-color:#DC8E47;color:white;" value="<?php echo $function->getId();?>">Editar</button>
                        </form>
                      </td>
                      <td>
                        <form action="<?php echo FRONT_ROOT ?>Function/Remove" method="post"><!-- SOLUCIONAR REDIRECCION AL BORRAR!! FALTA ID PARA MOSTRAR-->
                          <button type="submit" class="btn" style="background-color:RED;color:white;" name="idFunction" value="<?php echo $function->getId();?>">Remover</button>
                        </form>
                      </td>
                    </tr>
                    <?php } } else {?><tr><td colspan=6;><?php echo "No hay funciones disponibles para esta sala";}?></td></tr>
                </tbody>
            </table>
            
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
  