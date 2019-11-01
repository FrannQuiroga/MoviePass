<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

    <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Sobre Nosotros</h6>
    <a href="<?php echo FRONT_ROOT ?>"  class="btn" style="background-color:GREEN;color:white;" >Volver</a>
    </div> 

    <div class="row">
        <div class="card flex-md-row mb-4 shadow-sm h-md-250" style="align-items:center;margin-left:100px;width:700px;">
                <img class="card-img-left flex-auto d-none d-lg-block" alt="Movie_Poster_[180x250]" src="<?php echo FRONT_ROOT . IMG_PATH?>FrancoQuiroga.jpg" style="width: 180px; height: 250px;">
                <div class="card-body d-flex flex-column align-items-start">
                    <div class="mb-1 text-muted small">
                    </div>
                    <strong class="d-inline-block mb-2 text-primary">Franco Quiroga</strong>
                    <div class="mb-1 text-muted small">Mar del Plata</div><br><br>
                    <p style="color:black">Estudiante de Tecnicatura Universitaria en Programación que se dicta en la Universidad tecnologica Nacional de Mar del Plata. Ultimo año en curso.</p>
                </div>     
        </div>
        <div class="card flex-md-row mb-4 shadow-sm h-md-250" style="align-items:center;margin-left:auto;margin-right:100px;width:700px;">
                
                <div class="card-body d-flex flex-column align-items-start">
                    <div class="mb-1 text-muted small">
                    </div>
                    <strong class="d-inline-block mb-2 text-primary">Patricio Diaz</strong>
                    <div class="mb-1 text-muted small">Mar del Plata</div><br><br>
                    <p style="color:black">Estudiante de Tecnicatura Universitaria en Programación que se dicta en la Universidad tecnologica Nacional de Mar del Plata. Ultimo año en curso.</p>
                </div> 
                <img class="card-img-right flex-auto d-none d-lg-block" alt="Movie_Poster_[180x250]" src="<?php echo FRONT_ROOT . IMG_PATH?>PatricioDiaz.jpg" style="width: 180px; height: 250px;">    
        </div>
        
    </div>

<?php 
include_once('footer.php');
?>