
<?php 
include_once('header.php');
include_once('nav-bar.php');
require_once('validate-session.php');
?>
    
    <div id="breadcrumb" class="hoc clear"> 
        <h6 class="heading">Horarios</h6>
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
                <p class="card-text mb-auto"><?php if($movie->getOverview() != null) echo $movie->getOverview(); else echo "Sinopsis no disponible." ?></p>
            </div>     
    </div>
    <div  class="center card flex-md-row mb-4 shadow-sm h-md-250" style="align-items:center;width:300px;margin-left:auto;margin-right:150px;">
        <div class="card-body align-items-start center" style="text-align:center"> 
            <p><strong><u>Funciones:</u></strong><br><br><u>Cine 1:</u><br>16:00 - 18:30 - 21:00 - 23:30<br><br>
                <u>Cine 2:</u><br>16:00 - 18:30 - 21:00 - 23:30<br><br><!--FORZADO PARA MOSTRAR ALGO!! ARMAR BIEN-->
                <u>Cine 3:</u><br>16:00 - 18:30 - 21:00 - 23:30<br>
            </p>
        </div>
    </div>
    
</div>


<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>