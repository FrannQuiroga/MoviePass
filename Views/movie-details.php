
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

    <div  class=" card flex-md-row mb-4 shadow-sm h-md-250" style="align-items:center;width:400px;margin-left:auto;margin-right:150px;" >
        <div class="card-body align-items-start center" > 
        <form action="<?php echo FRONT_ROOT ?>" method="post">
            <p><strong style="text-align:center"><u class="text-primary">Funciones:</u></strong>
            <?php if(!empty($functionList)) {?>
                
                    <?php $cinema = null;
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
                                <br><br><strong class="text-primary" style="margin-left:-220px">><u><?php echo $day; ?></u></strong><br>
                        <?php } ?>

                        <span display:inline>
                            <input style="margin-left:auto;margin-right:auto" type="radio" name="idFunction" value="<?php echo $function->getId();?>">
                            <label for="idFunction"><?php echo $function->getTime();?></label>
                        </span>
                        
                        <?php } } else {?><br><br> <?php echo "No hay funciones disponibles";}?>
                           
            </p>
        <?php if(!empty($functionList)){?>
            <button type="submit" class="btn" name="idFunction" style="background-color:GREEN;color:white;">Comprar</button>
        <?php } ?>
        </form>
        </div>
    </div>

      
   
    
</div>


<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>