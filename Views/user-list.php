<?php 
  include_once('header.php');
  include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Listado de Usuarios</h6>
  </div>
</div>

  <div class="center card shadow-sm " >   
    <div class="form-group nospace inline  ">
      <h6 class= "mb-1 text-muted small"><br>Ordenar por</h6>
      <form action="<?php echo FRONT_ROOT ?>User/ShowListView" method="get">
        <input type="radio" name="orderedBy" value="id" onclick="this.form.submit()" <?php if($orderedBy =="id") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Id</h6>
        <input type="radio" name="orderedBy" value="email" onclick="this.form.submit()" <?php if($orderedBy =="email") {echo "checked";}?>><h6 class= "mb-1 text-muted small">Email</h6>
      </form>
    </div>
  </div>

  <div class="wrapper row3" style="background-color: #EAEDED;padding: 2rem !important;">
    <main class="hoc container clear"> 
      <!-- main body -->
      <div class="content"> 
        <div class="scrollable">

              <table style="text-align:center;">
                <thead>
                  <tr>
                    <th style="width: 100px;">Id </th>
                    <th style="width: 300px;">Email</th>
                    <th style="width: 300px;">Password</th>
                    <th style="width: 100px;">Es Admin?</th>
                    <!--<th style="width: 100px;">Apellido</th>
                    <th style="width: 100px;">Documento</th>-->
                    <th style="width: 100px;" colspan=3>Acccion </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($userList as $user){?>
                    <tr>
                      <td><?php echo $user->getId(); ?></td>
                      <td><?php echo $user->getEmail(); ?></td>
                      <td><?php echo $user->getPassword(); ?></td>
                      <td><?php if($user->getIsAdmin()) echo "Si";else echo "No"; ?></td>
                      <td>
                        <form action="<?php echo FRONT_ROOT ?>User/Get" method="get">
                          <button type="submit" class="btn" name="id" style="background-color:GREEN;color:white;" value="<?php echo $user->getId();?>">Ver</button>
                        </form>
                      </td>
                      <td>
                        <form action="<?php echo FRONT_ROOT ?>User/ShowEditView" method="post">
                        <button type="submit" class="btn" name="id" style="background-color:#DC8E47;color:white;" value="<?php echo $user->getId();?>">Editar</button>
                        </form>
                      </td>
                      <td>
                        <form action="<?php echo FRONT_ROOT ?>User/Remove" method="post">
                          <button type="submit" class="btn" name="id" style="background-color:RED;color:white;" value="<?php echo $user->getId();?>">Remover</button>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
          </form>
        </div>
      </div>
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>

  <div class="bgded overlay" style="background-image:url('https://media.wired.com/photos/5c086b7d1554ed7f00412f8c/125:94/w_2375,h_1786,c_limit/Moviepass-746083947.jpg');">
<?php 
  include_once('footer.php');
?>
  