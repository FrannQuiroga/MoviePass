
<div class="bgded overlay" style="background-image:url('https://media.wired.com/photos/5c086b7d1554ed7f00412f8c/125:94/w_2375,h_1786,c_limit/Moviepass-746083947.jpg');"><!--style="background-image:url('<?php echo IMG_PATH?>butacas.jpg');"-->

  <div class="wrapper">
    <header id="header" class="hoc clear" > 
      <div id="logo" class="fl_left">
        <h1><a href="<?php echo FRONT_ROOT ?>">Movie Pass</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
            <!--<li>
              <div class="inline">
                <input type="search" name="searched" style="color:grey" placeholder="Buscar pelicula..." required >
                <button href="<?php echo FRONT_ROOT ?>Movie/Search" type="submit"style= "background-color:transparent;border:0px"><i class="fa fa-search"></i></button>
              </div>
            </li>-->
            <li>
            <a class="drop" ><i class="fa fa-cogs"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Movie/Update">Peliculas</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Genre/Update">Generos</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Cinema/ShowAddView">Cines</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Room/ShowAddView">Salas</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>User/ShowAddView">Usuarios</a></li>
              </ul>
            </li>
            <li>
            <a class="drop" ><i class="fa fa-film"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Movie/ShowListView">Peliculas</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Genre/ShowListView">Generos</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Cinema/ShowListView">Cines</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Room/ShowListView">Salas</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>User/ShowListView">Usuarios</a></li>
              </ul>
            </li>
            <li>
              <a class="drop "><i class="fa fa-user"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>User/ShowLoginView">Ingresar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>User/ShowAddView">Registrarse</a></li>
              </ul>
            </li>
            <li>
              <a class="drop"><i class="fa fa-shopping-cart"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>">Ver carrito</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>">Comprar</a></li>
              </ul>
            </li>
        </ul>
        </nav>
    </header>
    <br>
    <form class="py-2" action="<?php echo FRONT_ROOT ?>Movie/Search" method="get">
			<div class="input-group">
			  <input type="text" class="form-control" name="searched" placeholder="Buscar pelicula...">
			  <div class="input-group-append">
			    <button class="" type="submit" style= "background-color:transparent;border:0px" ><i class="fa fa-search"></i></button>
			  </div>
			</div>
		</form>
  </div>
