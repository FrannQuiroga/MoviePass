<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Peliculas en Cartel</h6>
  </div>


  <div class="center card shadow-sm ">   
    <div class="form-group nospace inline  ">
      <h6 class= "mb-1 text-muted small"><br>Ordenar por</h6>
      <form action="<?php echo FRONT_ROOT ?>Function/ShowPlayingView" method="get">
        <input type="radio" name="orderedBy" value="title" onclick="this.form.submit()" <?php if($orderedBy =="title") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Titulo</h6>
        <input type="radio" name="orderedBy" value="vote_average desc" onclick="this.form.submit()"<?php if($orderedBy =="vote_average desc") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Puntuacion</h6>
      </form>  
    </div>
  </div>
</div>


  <div class="row" style="background-color:#EAEDED;padding: 2rem !important;" >
    <div class="col-md-6 hoc" style="align-items:center;">
      <?php if(!empty($playingList)){
            foreach($playingList as $movie){?>
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
            <!--<a class="btn" style="background-color:#DC8E47;color:white;" role="button" name="" value="" href="">Ver disponibilidad</a>-->
          </div>
          <img class="card-img-right flex-auto d-none d-lg-block" alt="Movie_Poster_[180x250]" src="<?php echo IMAGE_URL . $movie->getPosterPath();?>" style="width: 180px; height: 250px;">
        </div>
      <?php } } else{ ?>
      <br><div class= "center" style="text-align:center"><?php echo "¡No hay peliculas disponibles!"; ?></div><br><br><br><br><br><br><?php } ?>
    </div>
  </div>


<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>
  