<?php 
  include_once('header.php');
  include_once('nav-bar.php');
  require_once('validate-admin.php');
?>

  <div id="breadcrumb" class="hoc clear" > 
    <h6 class="heading">Funcion</h6>
    <?php if(empty($ticketList)) { ?>
    <form action="<?php echo FRONT_ROOT ?>Ticket/GenerateTickets" method="post">
              <button type="submit" class="btn" style="background-color:GREEN;color:white;" name="idFunction" value="<?php echo $function->getId();?>">Generar entradas</button>
            </form>
    <?php } ?>
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
          <h6 class="heading" style="float:left">Listado de Entradas</h6>
              <table style="text-align:center;">
                <thead>
                  <tr>
                    <th style="">N° de Asiento</th>
                    <th style="">Pelicula</th>
                    <th style="">Cine</th>
                    <th style="">Sala</th>
                    <th style="">Precio</th>
                    <th style="">Disponibilidad</th>
    
                  </tr>
                </thead>
                <tbody>
                    <?php if(!empty($ticketList)) { foreach($ticketList as $ticket) {?>
                    
                    <tr>
                      <td><?php echo $ticket->getSeatNumber(); ?></td>
                      <td><?php echo $ticket->getFunction()->getMovie()->getTitle(); ?></td>
                      <td><?php echo $ticket->getFunction()->getRoom()->getCinema()->getName(); ?></td>
                      <td><?php echo $ticket->getFunction()->getRoom()->getName(); ?></td>
                      <td><?php echo $ticket->getFunction()->getRoom()->getCinema()->getPrice(); ?></td>
                      <td><?php if(is_null($ticket->getUser())) echo "Disponible"; else echo "Vendida";?></td>
                    </tr>

                    <?php } } else {?><tr><td colspan=6;><?php echo "No hay entradas disponibles para esta funcion";}?></td></tr>
                
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
  