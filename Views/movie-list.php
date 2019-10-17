
<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Listado de Peliculas</h6>
  </div>
</div>

<div class="center card shadow-sm ">   
    <div class="form-group nospace inline  ">
      <h6 class= "mb-1 text-muted small"><br>Ordenar por</h6>
      
      <form action="<?php echo FRONT_ROOT ?>Movie/ShowListView" method="get">
        
        <input type="radio" name="orderedBy" value="original_title" onclick="this.form.submit()" <?php if($orderedBy =="original_title") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Titulo</h6>
        
<input type="radio" name="orderedBy" value="vote_average desc" onclick="this.form.submit()"<?php if($orderedBy =="vote_average desc") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Puntuacion</h6>
      </form>
    </div>
  </div>
</div>
<br>

<div class="row" >
  <div class="col-md-6 hoc" style="align-items:center;">
    <?php foreach($movieList as $movie){?>
      <div class="card flex-md-row mb-4 shadow-sm h-md-250" >
        <div class="card-body d-flex flex-column align-items-start">
          <div class="mb-1 text-muted small">| <?php foreach($movie->getGenres() as $genre) {
                                                          echo $genre." | "; 
          }?></div>
          <strong class="d-inline-block mb-2 text-primary"><?php echo $movie->getOriginalTitle(); ?></strong>
          <div class="mb-1 text-muted small">Puntuacion: [ <?php echo $movie->getVoteAverage(); ?> / 10 ]</div>
          <p class="card-text mb-auto"><?php echo $movie->getOverview(); ?></p>
          <a class="btn" style="background-color:#DC8E47;color:white;" role="button" href="">Ver disponibilidad</a>
        </div>
        <img class="card-img-right flex-auto d-none d-lg-block" alt="Movie_Poster_[180x250]" src="<?php echo IMAGE_URL . $movie->getPosterPath();?>" style="width: 180px; height: 250px;">
      </div>
    <?php } ?>
  </div>
</div>

<?php 
include_once('footer.php');
?>
  