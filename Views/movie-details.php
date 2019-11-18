
<?php 
include_once('header.php');
include_once('nav-bar.php');
require_once('validate-session.php');
?>
    
    <div id="breadcrumb" class="hoc clear"> 
        <h6 class="heading">Horarios: <?php echo $movie->getTitle();?></h6>
    </div>
</div>


<div class="row" style="background-image:url('<?php echo IMAGE_URL . $movie->getBackdropPath();?>');background-size: cover !important;padding: 4rem !important;" >
    <div class="card flex-md-row mb-4 shadow-sm h-md-250" style="align-items:center;margin-left:100px;margin-right:200px;width:900px;">
            <img class="card-img-left flex-auto d-none d-lg-block" alt="Movie_Poster_[180x250]" src="<?php echo IMAGE_URL . $movie->getPosterPath();?>" style="width: 180px; height: 250px;">
            <div class="card-body d-flex flex-column align-items-start">
                <div class="mb-1 text-muted small">| <?php foreach($movie->getGenres() as $genre) {
                                                            echo $genre." | "; 
                                                }?>
                </div>
                <strong class="d-inline-block mb-2 text-primary"><?php echo $movie->getTitle(); ?></strong>
                <div class="mb-1 text-muted small">Puntuacion: [ <?php echo $movie->getVoteAverage(); ?> / 10 ]</div>
                <strong><p class="card-text mb-auto"><?php if($movie->getOverview() != null) echo $movie->getOverview(); else echo "Sinopsis no disponible." ?></p></strong>
            </div>     
    </div>
    <!--
    <div  class="center card flex-md-row mb-4 shadow-sm h-md-250" style="align-items:center;width:300px;margin-left:auto;margin-right:150px;">
        <div class="card-body align-items-start center" style="text-align:center"> 
            <p><strong><u>Funciones:</u></strong><br><br><u>Cine 1:</u><br>16:00 - 18:30 - 21:00 - 23:30<br><br>
                <u>Cine 2:</u><br>16:00 - 18:30 - 21:00 - 23:30<br><br>
                <u>Cine 3:</u><br>16:00 - 18:30 - 21:00 - 23:30<br>
            </p>
        </div>
    </div>-->
    <?php //var_dump($functionList);?>

    <div  class=" card flex-md-row mb-4 shadow-sm h-md-250" style="align-items:center;width:400px;margin-left:auto;margin-right:150px;" >
        <div class="card-body align-items-start center" > 
            <p><strong style="text-align:center"><u class="text-primary">Funciones:</u></strong>
            <?php if(!empty($functionList)) {
                    $cinema = null;
                    $room = null;
                    $day = null;
                    foreach($functionList as $function) { 
                            if($cinema != $function->getRoom()->getCinema()->getName()) { 
                                $cinema = $function->getRoom()->getCinema()->getName();?>
                            <br><br><strong ><?php echo "--------------Cine: ".$cinema."--------------"; ?></strong>
                    <?php  } if($room != $function->getRoom()->getName()){
                                $room = $function->getRoom()->getName(); ?>
                            <br><br><strong style="margin-left:-230px;"><?php echo "     -Sala: ".$room; ?></strong >
                    <?php  } if($day != $function->getDay()){ 
                                $day = $function->getDay(); ?>
                            <br><br><strong class="text-primary" style="margin-left:-220px">><u><?php echo $day; //VER POR QUE ES UN STRING (no puedo formatear!!) ?></u></strong><br> 
                    <?php } ?><?php echo "|".$function->getTime()."|";?>
                                    
                                    <form action=<?php echo FRONT_ROOT."Function/AvailableSeats";?> method="post">
                                        <button class="btn" type="submit" name="idfunction" style="background-color:GREEN;color:white;" value="<?php echo $function->getId()?>"> Seleccionar </button>                               
                                    </form>
                     <?php } }
                            else {?><br><br><strong> <?php echo "No hay funciones disponibles";}?></strong>
                        
            </p>
        </div>
    </div>

      <!-- main body 
      <div class=" content"> 
        <div class="scrollable">
          <h6 class="heading" >Listado de Funciones</h6>
              <table style="text-align:center;">
                <thead>
                  <tr>
                    <th style="width: 100px;">Dia</th>
                    <th style="width: 100px;">Hora</th>
                    <th style="width: 300px;">Cine</th>
                    <th style="width: 300px;">Sala</th>
                    <th style="width: 100px;">Acccion </th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php if(!empty($functionList)) { foreach($functionList as $function) {?>
                    <tr>
                      <td><?php echo $function->getDay(); ?></td>
                      <td><?php echo $function->getTime(); ?></td>
                      <td><?php echo $function->getRoom()->getCinema()->getName(); ?></td>
                      <td><?php echo $function->getRoom()->getName(); ?></td>
                      <td>
                        <form action="" method="post">
                        <button type="submit" class="btn" name="" style="background-color:#GREEN;color:white;" value="">Comprar</button>
                        </form>
                      </td>
                    </tr>
                    <?php } } else {?><tr><td colspan=6;><?php echo "No hay funciones disponibles";}?></td></tr>
                </tbody>
            </table>
            
        </div>
      </div>
      
      <div class="clear"></div>-->
   
    
</div>


<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>