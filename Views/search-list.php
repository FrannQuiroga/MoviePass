<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Mi búsqueda</h6>
  </div>


  <div class="center card shadow-sm ">   
    <div class="form-group nospace inline  ">
      <h6 class= "mb-1 text-muted small"><br>Se han encontrado <?php echo count($searchList);?> resultados que contengan <?php echo "'" .$searched ."'."?></h6>   
    </div>
  </div>
</div>


  <div class="row" style="background-color:#EAEDED;padding: 2rem !important;" >
    <div class="col-md-6 hoc" style="align-items:center;">
      <?php foreach($searchList as $movie){?>
        <div class="card flex-md-row mb-4 shadow-sm h-md-250" >
          <div class="card-body d-flex flex-column align-items-start">
            <div class="mb-1 text-muted small">| <?php foreach($movie->getGenres() as $genre) {
                                                            echo $genre." | "; 
                                                }?>
            </div>
            <strong class="d-inline-block mb-2 text-primary"><?php echo $movie->getTitle(); ?></strong>
            <div class="mb-1 text-muted small">Puntuacion: [ <?php echo $movie->getVoteAverage(); ?> / 10 ]</div>
            <!--<p class="card-text mb-auto"><?php echo $movie->getOverview(); ?></p>--><br><br><br><br><br>
            <form action="<?php echo FRONT_ROOT ?>Movie/SHowMovieView" method="get">
              <button class="btn" style="background-color:#DC8E47;color:white;" type="submit" name="id" value="<?php echo $movie->getId(); ?>">Ver disponibilidad</button>
            </form>
            <!--<a class="btn" style="background-color:#DC8E47;color:white;" role="button" href="">Ver disponibilidad</a>-->
          </div>
          <img class="card-img-right flex-auto d-none d-lg-block" alt="Movie_Poster_[180x250]" src="<?php echo IMAGE_URL . $movie->getPosterPath();?>" style="width: 180px; height: 250px;">
        </div>
      <?php } ?>
    </div>
  </div>


<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>