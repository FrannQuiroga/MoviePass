
<div class="bgded overlay" style="background-image:url('<?php echo IMG_PATH; ?>MoviePassTheatre.png');">

  <div >
    <header id="header" class="hoc clear" > 
      <div id="logo" class="fl_left">
        <h1><a href="<?php echo FRONT_ROOT ?>">Movie Pass</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
            <li class="active"><a href="<?php echo FRONT_ROOT ?>">Menu Principal</a></li>
            <li><a class="drop" >Actualizar/Agregar</a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Movie/Update">Peliculas</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Genre/Update">Generos</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Cinema/ShowAddView">Cines</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Room/ShowAddView">Salas</a></li>
              </ul>
            </li>
            <li><a class="drop" >Listados</a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Movie/ShowListView">Peliculas</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Genre/ShowListView">Generos</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Cinema/ShowListView">Cines</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Room/ShowListView">Salas</a></li>
              </ul>
            </li>
        </ul>
        </nav> 
    </header>
  </div>
