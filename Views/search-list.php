<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Mi búsqueda</h6>
  </div>


  <div class="center card shadow-sm ">   
    <div class="form-group nospace inline  ">
      <h6 class= "mb-1 text-muted small"><br>Se han encontrado <?php echo 1?> resultados para su búsqueda.</h6>   
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
            <p class="card-text mb-auto"><?php echo $movie->getOverview(); ?></p>
            <a class="btn" style="background-color:#DC8E47;color:white;" role="button" href="">Ver disponibilidad</a>
          </div>
          <img class="card-img-right flex-auto d-none d-lg-block" alt="Movie_Poster_[180x250]" src="<?php echo IMAGE_URL . $movie->getPosterPath();?>" style="width: 180px; height: 250px;">
        </div>
      <?php } ?>
    </div>
  </div>


  <div class="bgded overlay" style="background-image:url('https://media.wired.com/photos/5c086b7d1554ed7f00412f8c/125:94/w_2375,h_1786,c_limit/Moviepass-746083947.jpg');">
<?php 
include_once('footer.php');
?>