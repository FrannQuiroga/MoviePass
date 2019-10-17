<?php 
    include_once('header.php');
    include_once('nav-bar.php'); 
?>

</div>

<div id="pageintro" class="hoc clear" style="background-color: #EAEDED;padding: 2rem !important;"> 
  <article class="center">
      <h3 class="heading underline">¡Generos Actualizados!</h3>
      <p>La base de datos de generos ha sido actualizada exitosamente.<br>¿Que desea hacer ahora?</p>
      <footer>
          <a class="btn" style="background-color:#DC8E47;color:white;" role="button" href="<?php echo FRONT_ROOT ?>Genre/ShowListView">Ver listado</a>
          <a class="btn" style="background-color:#DC8E47;color:white;" role="button" href="<?php echo FRONT_ROOT ?>">Menu principal</a>
      </footer>
  </article>
</div>

<?php 
  include_once('footer.php');
?> 