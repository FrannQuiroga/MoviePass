<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
      <h6 class="heading">Sala: <?php echo $room->getName()?> </h6>
      <form action="<?php echo FRONT_ROOT; ?>Function/ShowListView" method="get">
            <button class="btn" type="submit" name="idRoom" style="background-color:GREEN;color:white;" value="<?php echo $room->getId();?>">Ver Listado</button>
          </form>
  </div>

  <div class="wrapper row3" style="background-color: #EAEDED;">
    <main class="container" > 
      <!-- main body -->
      <div class="content" > 
        <div id="comments" style="align-items:center;">
          <h2>Ingresar Datos a modificar</h2>
          <form action="<?php echo FRONT_ROOT ?>Function/Edit" method="post"  style="padding: 2rem !important;">
            <table> 
              <thead class="center">
                <tr>
                  <th>Sala</th>
                  <th>Dia</th>
                  <th>Horario</th>
                  <th>Pelicula</th>
                </tr>
              </thead>
              <tbody allign="center">
                <tr>
                <?php echo "Sala: ".$room->getName();?>
                </tr>
                <tr>
                <?php echo "Dia: ".$function->getDay();?>
                </tr>
                <tr>
                <?php echo "Hora: ".$function->getTime();?>
                </tr>
                <?php echo "Pelicula: ".$movie->getTitle();?>
                <tr>
                  <td>
                    <select name="idRoom" style="margin-right:3px;height:43px;width:240px;" required>
                      <option value="<?php echo $room->getId()?>"><?php echo $room->getName();?></option>      
                    </select>
                  </td> 
                  <td >
                    <select name="day" style="margin-right:3px;height:43px;width:240px;" required>
                      <option value="7/11">7/11</option>
                      <option value="8/11">8/11</option>
                      <option value="9/11">9/11</option>
                      <option value="10/11">10/11</option>
                      <option value="11/11">11/11</option>
                      <option value="12/11">12/11</option>
                      <option value="13/11">13/11</option>     
                    </select>
                  </td>
                  <td >
                    <select name="time" style="margin-right:3px;height:43px;width:240px;" required>
                      <option value="16:00">16:00</option>
                      <option value="18:30">18:30</option>
                      <option value="21:00">21:00</option>
                      <option value="23:30">23:30</option>    
                    </select>
                  </td>
                  <td>
                    <select name="idMovie" style="margin-right:3px;height:43px;width:240px;" required>
                    <?php foreach ($movieList as $movie){ ?>
                      <option value="<?php echo $movie->getId()?>"><?php echo $movie->getTitle();?></option>
                    <?php } ?>      
                    </select>
                    
                    <input type="hidden" name="idroom" value="<?php echo $room->getId()?>">    
                  
                  </td>      
                </tr>
                </tbody>
            </table>
            <div>
              <input type="submit" class="btn" value="Modificar" style="background-color:#DC8E47;color:white;"/>
            </div>
          </form>
        </div>
      </div>
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>


<?php 
include_once('footer.php');
?>