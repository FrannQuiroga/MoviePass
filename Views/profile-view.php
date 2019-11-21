<?php 
include_once('header.php');
include_once('nav-bar.php');
require_once('validate-session.php');
?>

    <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Mi perfil</h6>
    
    </div>
</div> 


<div class="row" style="background-color:#EAEDED;padding: 2rem !important;">

    <div class="card flex-md-row mb-4 shadow-sm h-md-250" style="align-items:center;width:500px;margin-left:auto;margin-right:auto;">
            <img class="card-img-left flex-auto d-none d-lg-block" alt="Movie_Poster_[180x250]" src="<?php echo FRONT_ROOT . IMG_PATH?>Avatar.png" style="width: 180px; height: 200px;">
            <div class="card-body d-flex flex-column align-items-start">
                <div class="mb-1 text-muted small">
                </div>
                <strong class="d-inline-block mb-2 text-primary"><?php echo $user->getUserProfile()->getName(). " " .$user->getUserProfile()->getSurname(); ?></strong>
                <div class="mb-1 text-muted small">DNI: <?php echo $user->getUserProfile()->getDocument();?></div>
                <div class="mb-1 text-muted small">Usuario: <?php echo $user->getEmail();?></div>
                <div class="mb-1 text-muted small"></div><br><br>
                <a href="<?php echo FRONT_ROOT;?>User/ShowEditPasswordView"  class="btn" style="background-color:GREEN;color:white;" >Cambiar contraseña</a>
            </div>     
    </div>
    <!--Tabla de entradas compradas-->
    <?php if(!$user->getIsAdmin()){ ?> <!--Validacion, si es admin no tiene entradas compradas!!-->
    <div class="scrollable" style="margin-left:auto;margin-right:auto;">
          <h6 class="heading" style="float:left"><br><br>Mis entradas</h6>
              <table style="text-align:center;">
                <thead>
                  <tr>
                    <th style="width: 100px;">Dia</th>
                    <th style="width: 100px;">Hora</th>
                    <th style="width: 400px;">Pelicula</th>
                    <th style="width: 200px;">Cine</th>
                    <th style="width: 200px;">Sala</th>
                    <th style="width: 100px;">N° de Asiento</th>
                    <!--<th style="width: 80px;" >Detalles </th>-->
                    
                  </tr>
                </thead>
                <tbody>
                <?php if(!empty($ticketList)) { foreach($ticketList as $ticket) { ?>
                  <tr>
                    <td><?php echo $ticket->getFunction()->getDay(); ?></td>
                    <td><?php echo $ticket->getFunction()->getTime(); ?></td>
                    <td><?php echo $ticket->getFunction()->getMovie()->getTitle(); ?></td>
                    <td><?php echo $ticket->getFunction()->getRoom()->getCinema()->getName(); ?></td>
                    <td><?php echo $ticket->getFunction()->getRoom()->getName(); ?></td>
                    <td><?php echo $ticket->getSeatNumber(); ?></td>
                    
                    
                    <!--<td>
                      <form action="" method="get">
                        <button type="submit" class="btn" name="idTicket" style="background-color:GREEN;color:white;" value="<?php echo $ticket->getId();?>">Ver</button>
                      </form>
                    </td>-->
                  </tr>
                <?php } } else {?><tr><td colspan=7;><?php echo "No dispone de entradas adquiridas al momento";}?></td></tr>
                </tbody>
            </table>
    </div>
    <?php } ?>

</div>

<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>