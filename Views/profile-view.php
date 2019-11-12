<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

    <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Mi perfil</h6>
    <!--<a href="<?php echo FRONT_ROOT ?>"  class="btn" style="background-color:GREEN;color:white;" >Volver</a>-->
    </div>
</div> 


<div class="row" style="background-color:#EAEDED;padding: 2rem !important;">

    <div class="card flex-md-row mb-4 shadow-sm h-md-250" style="align-items:center;width:500px;margin-left:auto;margin-right:auto;">
            <img class="card-img-left flex-auto d-none d-lg-block" alt="Movie_Poster_[180x250]" src="<?php echo FRONT_ROOT . IMG_PATH?>Avatar.png" style="width: 180px; height: 200px;">
            <div class="card-body d-flex flex-column align-items-start">
                <div class="mb-1 text-muted small">
                </div>
                <strong class="d-inline-block mb-2 text-primary"><?php echo $user->getUserProfile()->getName(). " " .$user->getUserProfile()->getSurname(); ?></strong>
                <div class="mb-1 text-muted small">DNI: <?php echo $user->getUserProfile()->getDocument();?></div>
                <div class="mb-1 text-muted small">Usuario: <?php echo $user->getEmail();?></div>
                <div class="mb-1 text-muted small">Contraseña: **********</div><br><br>
                <a href=""  class="btn" style="background-color:GREEN;color:white;" >Editar Información</a>
            </div>     
    </div>
    <!--Tabla de entradas compradas-->
    <?php if(!$user->getIsAdmin()){ ?> <!--Validacion, si es admin no tiene entradas compradas!!-->
    <div class="scrollable">
          <h6 class="heading" style="float:left"><br><br>Mis entradas</h6>
              <table style="text-align:center;">
                <thead>
                  <tr>
                    <th style="width: 150px;">Dia</th>
                    <th style="width: 150px;">Hora</th>
                    <th style="width: 400px;">Pelicula</th>
                    <th style="width: 400px;">Cine</th>
                    <th style="width: 100px;" colspan=2>Detalles </th>
                    <!--<th style="width: 100px;">Acccion </th>-->
                  </tr>
                </thead>
                <tbody>
                    <tr><td colspan=6;><?php echo "No dispone de entradas adquiridas al momento.";?></td></tr>
                </tbody>
            </table>
    </div>
    <?php } ?>

</div>

<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>