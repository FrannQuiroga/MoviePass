<?php
include_once('header.php');
include_once('nav-bar.php');
require_once('validate-session.php');
?>
    <div id="breadcrumb" class="hoc clear"> 
        <h6 class="heading">Mi carrito</h6>
    </div>
</div>

<div >

	
<br><br>
	<!--TABLA DE ENTRADA ELEGIDA CON DETALLE Y SELECT CANTIDAD-->

		<div style="margin-left:auto;margin-right=auto">

			
			<form action="<?php echo FRONT_ROOT ?>Ticket/BuyTickets" method="post">	
				<table class="table table-borderless table-shopping-cart">
					<thead >
						<tr style="text-align:center;">
							<th style="width:600px">Funcion</th>
							<th style="width:150px">Cantidad</th>
							<th style="width:150px">Precio por entrada</th>
							<th style="width:150px">Precio Total</th>
							<th style="width:150px">Accion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="align-items-center">
								<!--<figure class="itemside align-items-center">
									<div class="aside"><img src="<?php echo IMAGE_URL . $function->getMovie()->getPosterPath();?>" class="img-sm" style="width:120px;height=180px"></div>
									<figcaption class="info itemside align-items-center right">
										<p class="title text-dark"><?php echo $function->getMovie()->getTitle();?></p>
										<p class="text-muted small"><?php echo $function->getDay().", ".$function->getTime(); ?>  <br> <?php echo "Cine ".$function->getRoom()->getCinema()->getName().", ".$function->getRoom()->getName(); ?></p>
									</figcaption>
								</figure>-->
								
								<div style="overflow:hidden">
								<div style="float:left;padding-left:20px" ><img src="<?php echo IMAGE_URL . $function->getMovie()->getPosterPath();?>" class="img-sm" style="width:75px;height=115px"></div>
									<div style="float:left;padding-left:100px">
										<p class="title text-dark"><?php echo $function->getMovie()->getTitle();?></p>
									
										<p class="text-muted small"><?php echo $function->getDay().", ".$function->getTime(); ?>  <br> <?php echo "Cine ".$function->getRoom()->getCinema()->getName().", ".$function->getRoom()->getName(); ?></p>
									</div>
								
							</td>
							<td style="text-align:center">
								<input name="quantity" type="number"  style="width:120px" value="<?php echo $quantity ?>" min=1 max=<?php if($availableTickets>5){echo 4;}else{echo $availableTickets;} ?>>
						
							</td>
							<td style="text-align:center;">
								<div class="price-wrap mb-2">
									<var class="price">$<?php echo $function->getRoom()->getCinema()->getPrice();?></var>
									<!--<small class="text-muted">$<?php echo $function->getRoom()->getCinema()->getPrice();?> c/u </small>-->
								</div>
							</td>
							<td style="text-align:center;" class="d-none d-md-block">
								<div class="price-wrap mb-2">
									<!--<var class="price">$<?php echo $function->getRoom()->getCinema()->getPrice() * $quantity;?></var>-->
									
								</div>
							</td>
							<td>
							<button type="submit" class="btn"  style="background-color:GREEN;color:white;" >Comprar</button>
							</td>
						</tr>
						<input type="hidden" name="idFunction" value="<?php echo $function->getId(); ?>">
					</tbody>
				</table>

			</form>

		</div> <!-- card.// -->

	
</div> <!-- row.// -->

<div class="bgded overlay" style="background-image:url('<?php echo FRONT_ROOT.IMG_PATH?>butacas.jpg');">
<?php 
  include_once('footer.php');
?>
  