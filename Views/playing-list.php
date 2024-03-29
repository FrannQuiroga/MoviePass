<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Peliculas en Cartel</h6>
  </div>


  <div class="center card shadow-sm ">   
    <div class="form-group nospace inline " >
      
      <form action="<?php echo FRONT_ROOT ?>Movie/ShowPlayingView" method="get" >
        <div>
          <h6 class= "mb-1 text-muted small"><br>Ordenar por</h6>
          <input type="radio" name="orderedBy" value="title" onclick="this.form.submit()" <?php if($orderedBy =="title") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Titulo</h6>
          <input type="radio" name="orderedBy" value="vote_average desc" onclick="this.form.submit()"<?php if($orderedBy =="vote_average desc") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Puntuacion</h6>
        </div>
        <div>
          <h6 class= "mb-1 text-muted small" style="margin-left:300px;"><br>Filtrar por</h6>
          <select name="filterGenre" class= "text-muted small dropdown" style="margin-left:50px;height:25px;width:150px;">
          <option <?php if($filterGenre == null) echo "selected";?> value="null">Todas las categorias</option>
            <?php foreach ($genreList as $genre){ ?>
              <option <?php if($filterGenre == $genre->getId()) echo "selected";?> value="<?php echo $genre->getId()?>"><?php echo $genre->getName();?></option>
            <?php } ?>      
          </select>
          <input type="date" name="day" class= " center text-muted small dropdown" style="width:120px;margin-left=40px;height:25px;" value="<?php if($filterDay==null) {echo "disabled";}?>" min="<?php echo $today?>" max="2019-12-31">
        </div>
        <div>
          <button class="btn mb btn-outline-success " style="margin-right=0px" type="submit">Filtrar</button>
        </div>
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
  