<?php 
include_once('header.php');
include_once('nav-bar.php');
//foreach($ticketList as $key => $ti){echo $key;};
?>

<!DOCTYPE html>
<html>   
<body>
<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">SALA: <?php echo $function->getRoom()->getName();?> PELICULA: <?php echo $function->getMovie()->getTitle();?></h6>
    <h6 class="heading">FECHA:<?php echo $function->getDay();?> HORA:<?php echo $function->getTime();?></h6>
  </div>
    <div aligne="center" style="width:1200px; margin: 0 auto;">
            <div class="row" style="width:100%;">
                <div class="col-xs-11">
                    <div class="btn-group"  data-toggle="buttons">
                    <form action="<?php echo FRONT_ROOT; ?>Shopping/AddTicketShopping" metod="post">
                        <div class="col-xs-6">
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="1" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==1){unset($ticketList[$key]);echo "disabled";}}?> >A1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="2" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==2){unset($ticketList[$key]);echo "disabled";}}?> >A2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="3" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==3){unset($ticketList[$key]);echo "disabled";}}?> >A3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="4" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==4){unset($ticketList[$key]);echo "disabled";}}?> >A4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="5" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==5){unset($ticketList[$key]);echo "disabled";}}?> >A5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="6" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==6){unset($ticketList[$key]);echo "disabled";}}?> >A6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="7" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==7){unset($ticketList[$key]);echo "disabled";}}?> >A7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="8" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==8){unset($ticketList[$key]);echo "disabled";}}?> >A8</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="9" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==9){unset($ticketList[$key]);echo "disabled";}}?> >B1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="10" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==10){unset($ticketList[$key]);echo "disabled";}}?> >B2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="11" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==11){unset($ticketList[$key]);echo "disabled";}}?> >B3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="12" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==12){unset($ticketList[$key]);echo "disabled";}}?> >B4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="13" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==13){unset($ticketList[$key]);echo "disabled";}}?> >B5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="14" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==14){unset($ticketList[$key]);echo "disabled";}}?> >B6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="15" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==15){unset($ticketList[$key]);echo "disabled";}}?> >B7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="16" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==16){unset($ticketList[$key]);echo "disabled";}}?> >B8</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="17" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==17){unset($ticketList[$key]);echo "disabled";}}?> >C1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="18" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==18){unset($ticketList[$key]);echo "disabled";}}?> >C2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="19" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==19){unset($ticketList[$key]);echo "disabled";}}?> >C3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="20" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==20){unset($ticketList[$key]);echo "disabled";}}?> >C4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="21" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==21){unset($ticketList[$key]);echo "disabled";}}?> >C5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="22" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==22){unset($ticketList[$key]);echo "disabled";}}?> >C6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="23" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==23){unset($ticketList[$key]);echo "disabled";}}?> >C7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="24" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==24){unset($ticketList[$key]);echo "disabled";}}?> >C8</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="25" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==25){unset($ticketList[$key]);echo "disabled";}}?> >D1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="26" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==26){unset($ticketList[$key]);echo "disabled";}}?> >D2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="27" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==27){unset($ticketList[$key]);echo "disabled";}}?> >D3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="28" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==28){unset($ticketList[$key]);echo "disabled";}}?> >D4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="29" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==29){unset($ticketList[$key]);echo "disabled";}}?> >D5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="30" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==30){unset($ticketList[$key]);echo "disabled";}}?> >D6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="31" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==31){unset($ticketList[$key]);echo "disabled";}}?> >D7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="32" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==32){unset($ticketList[$key]);echo "disabled";}}?> >D8</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="33" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==33){unset($ticketList[$key]);echo "disabled";}}?> >F1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="34" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==34){unset($ticketList[$key]);echo "disabled";}}?> >F2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="35" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==35){unset($ticketList[$key]);echo "disabled";}}?> >F3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="36" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==36){unset($ticketList[$key]);echo "disabled";}}?> >F4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="37" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==37){unset($ticketList[$key]);echo "disabled";}}?> >F5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="38" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==38){unset($ticketList[$key]);echo "disabled";}}?> >F6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="39" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==39){unset($ticketList[$key]);echo "disabled";}}?> >F7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="40" <?php foreach ($ticketList as $key => $ticket){if($ticket->getSeatNumber()==40){unset($ticketList[$key]);echo "disabled";}}?> >F8</label>
                        </div> <!-- faltan foreach para -->
                        <div class="col-xs-6">
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="G1">G1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="G2">G2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="G3">G3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="G1">G4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="G1">G5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="G1">G6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="G1">G7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="G1">G8</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">H1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">H2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">H3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">H4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">H5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">H6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">H7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">H8</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">I1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">I2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">I3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">I4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">I5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">I6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">I7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">I8</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">J1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">J2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">J3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">J4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">J5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">J6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">J7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">J8</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">K1</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">K2</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">K3</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">K4</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">K5</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">K6</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">K7</label>
                            <label class="btn btn-success asiento2"><input type="checkbox" name = "seats[]" value="A1">K8</label>
                        </div>
                        <button class="btn" style="background-color:#DC8E47;color:white;" type="submit" name="id" value="<?php echo $function->getId(); ?>">Siguiente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
 
<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
include_once('footer.php');
?>
  