
<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">

  <div class="wrapper">
    <header id="header" class="hoc clear" > 
      <div id="logo" class="fl_left">
        <h1><a href="<?php echo FRONT_ROOT ?>">movie<strong>pass</strong></a></h1>
      </div>
      <?php if(isset($_SESSION["loggedUser"])) { 
                $loggedUser = $_SESSION["loggedUser"]; 
                if($loggedUser->getIsAdmin() == 1) { //Si es ADMIN muestro una navbar
                  ?>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
            <li>
            <a class="drop" ><i class="fa fa-cogs"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Movie/Update">Peliculas</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Genre/Update">Generos</a></li>
                
              </ul>
            </li>
            <li>
            <a class="drop" ><i class="fa fa-film"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Movie/ShowListView">Peliculas</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Genre/ShowListView">Generos</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Cinema/ShowListView">Cines</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>User/ShowListView">Usuarios</a></li>
              </ul>
            </li>
            <li>
              <a class="drop "><i class="fa fa-user"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>User/ShowProfileView">Ver mi perfil</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>User/Logout">Salir</a></li>
              </ul>
            </li>
        </ul>
        </nav>
      <?php } else { //Muestro navbar de usuario normal?> 
        <nav id="mainav" class="fl_right">
        <ul class="clear">
            <li>
              <form style="display:inline;" action="<?php echo FRONT_ROOT ?>Movie/SHowSearchView" method="get">
                <div class="inline">
                  <input type="search" name="searched" style="color:grey" placeholder="Buscar..." required >
                  <button href="<?php echo FRONT_ROOT ?>Movie/Search" type="submit"style= "background-color:transparent;border:0px"><i class="fa fa-search"></i></button>
                </div>
              </form>
            </li>
            <li>
            <a class="drop" ><i class="fa fa-film"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Movie/ShowPlayingView">Ver Cartelera</a></li>
              </ul>
            </li>
            <li>
              <a class="drop"><i class="fa fa-shopping-cart"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>">Ver carrito</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>">Comprar</a></li>
              </ul>
            </li>
            <li>
              <a class="drop "><i class="fa fa-user"></i></a>
              <ul>
                <li><a href="<?php echo FRONT_ROOT ?>User/ShowProfileView">Ver mi perfil</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>User/Logout">Salir</a></li>
              </ul>
            </li>
        </ul>
        </nav> 
      <?php } } else { //No hay session iniciada, navbar solo con login registro?>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li>
            <a class="drop "><i class="fa fa-user"></i></a>
            <ul>
              <li><a href="<?php echo FRONT_ROOT ?>User/ShowLoginView">Ingresar</a></li>
              <li><a href="<?php echo FRONT_ROOT ?>User/ShowAddView">Registrarse</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <?php } ?>      
    </header>
    <br>
    
  </div>
