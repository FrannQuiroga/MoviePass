<?php 
  include_once('header.php');
  include_once('nav-bar.php');
?>

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">User <?php echo $user->getName();?></h6>
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
                    <th style="width: 300px;">Name</th>
                    <th style="width: 300px;">Surname</th>
                    <th style="width: 300px;">Document</th>
                    <th style="width: 300px;">Password</th>
                    <th style="width: 100px;">is Admin?</th>
                    <th style="width: 100px;">is Available</th>
                    <!--<th style="width: 100px;">Apellido</th>
                    <th style="width: 100px;">Documento</th>-->
                    <th style="width: 100px;" colspan=3>Action </th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td><?php echo $user->getId(); ?></td>
                      <td><?php echo $user->getEmail(); ?></td>
                      <td><?php echo $user->getName(); ?></td>
                      <td><?php echo $user->getSurname(); ?></td>
                      <td><?php echo $user->getDocument(); ?></td>
                      <td><?php echo $user->getPassword(); ?></td>
                      <td><?php if($user->getIsAdmin()) echo "Yes";else echo "No"; ?></td>
                      
                      <td><?php if($user->getIsAvailable()) echo "Yes";else echo "No"; ?></td>
                      
                      <td>
                        <form action="<?php echo FRONT_ROOT ?>User/ShowListView" method="post">
                          <button type="submit" class="btn" name="id" style="background-color:GREEN;color:white;" value="<?php echo $user->getId();?>">Volver</button>
                        </form>
                      </td>
                    </tr>
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
  