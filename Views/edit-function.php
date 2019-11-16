<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
      <h6 class="heading">Sala: <?php echo $function->getRoom()->getName();?> </h6>
      <form action="<?php echo FRONT_ROOT; ?>Function/ShowListView" method="get">
            <button class="btn" type="submit" name="idRoom" style="background-color:GREEN;color:white;" value="<?php echo $function->getRoom()->getId();?>">Ver Listado</button>
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
                  
                  <th>Dia</th>
                  <th>Horario</th>
                  <th>Pelicula</th>
                </tr>
              </thead>
              <tbody allign="center">
                <tr>
                  
                  <input type="hidden" name="idRoom" value="<?php echo $function->getRoom()->getId();?>">

                  <?php $today= new \DateTime();?>

                  <td >
                    <input type="date" name="day"  style="width:240px;" value="<?php echo $function->getDay();?>" min="<?php echo $today->format('Y-m-d');?>" max="2019-12-31" required>   
                  </td>
                  <td >
                    <select name="time" style="margin-right:3px;height:43px;width:240px;" required><!--HORARIO FORZADO; FALTA TABLA!!-->
                      <option <?php if($function->getTime()=="16:00")echo "selected";?> value="16:00">16:00</option>
                      <option <?php if($function->getTime()=="18:30")echo "selected";?> value="18:30">18:30</option>
                      <option <?php if($function->getTime()=="21:00")echo "selected";?> value="21:00">21:00</option>
                      <option <?php if($function->getTime()=="23:30")echo "selected";?> value="23:30">23:30</option>    
                    </select>
                  </td>
                  <td>
                    <select name="idMovie" style="margin-right:auto;height:43px;width:500px;" required>
                    <?php foreach ($movieList as $movie){ ?>
                      <option <?php if($function->getMovie()->getId()==$movie->getId())echo "selected";?> value="<?php echo $movie->getId()?>"><?php echo $movie->getTitle();?></option>
                    <?php } ?>      
                    </select>    
                  </td> 
                  <input type="hidden" name="idFunction" value="<?php echo $function->getId()?>">     
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