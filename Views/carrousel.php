<?php 
  include_once('header.php');
  include_once('nav-bar.php');
  require_once('validate-session.php');
?>
<?php $loggedUser = $_SESSION["loggedUser"];?>
  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Bienvenido, <?php echo $loggedUser->getUserProfile()->getName();?></h6>
  </div>
</div>

  <div style="background-color: #EAEDED;">
    <main class="hoc container clear"> 
      <!-- main body -->
        <div id="carousel1_indicator" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
                <li data-target="#carousel1_indicator" data-slide-to="1"></li>
                <li data-target="#carousel1_indicator" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo FRONT_ROOT.IMG_PATH?>Logo.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo FRONT_ROOT.IMG_PATH?>FondoPeliculas.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo FRONT_ROOT.IMG_PATH?>MoviePassTheatre.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>

<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
  include_once('footer.php');
?>