<?php
include "inc/connection.php";
include "inc/ratingbox.php";

switch ( $_GET["type"] ) {
	case 'feed':
		$ratings = feed();
		ob_start();
		?>
		
			<div id="feed">
				<center><h4><b>Seneste anmeldelser<b></h4></center>
				<?php foreach ( $ratings as $rating ): ?>
					<div class="row rating-row" data-href="http://phonerate.dk/phones.php?phone=<?= $rating["phoneid"]; ?>&cat=<?= $rating["catid"] ?>#commentdiv">
						<div class="col-sm-4">
							<img class="img-circle" src="<?php echo $rating['fbpicture']; ?>" />
						</div>

						<div  class="col-sm-7"  style="background-color:rgba(252,252,252,1); border-radius: 27px;">
						<div class="rating-container" >      
								<small><?= $rating['facebookname'];?> har anmeldt sin <b><i><?= $rating['phonename'] ?></i></b></small>
								<?php
									$sum = floor($rating['sum_rating']);
									$left = 5 - $sum;
								?>
								<div  class="rating" >
									<?php for ( $i=0; $i < $left ; $i++ ) : ?>
										<span >☆</span>
									<?php endfor; ?>
									<?php for ( $i=0; $i < $sum ; $i++ ) : ?>
										<span class="checked">☆</span>
									<?php endfor; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php
		ob_get_contents();
	break;

	case 'top':
		$ratings = topRatings();
		ob_start();
		?>
			<div id="feed">
				<center><h4><b>Bedst ratede telefoner<b></h4></center>
				<?php foreach ( $ratings as $rating ): ?>
					<div class="row rating-row" data-href="http://phonerate.dk/phones.php?phone=<?= $rating["phoneid"]; ?>&cat=<?= $rating["catid"] ?>">
						<div class="col-sm-3">
							<span><img class="img-circle" width="50" height="50" src="data:image/jpeg;base64,<?php echo base64_encode($rating["phonephoto"]); ?>" /></span>
						</div>
						<div class="col-sm-9 ">
							<h4><b><?= $rating["phonename"]; ?><b></h4>
							<?php
								$sum = floor($rating['rating_sum']);
								$left = 5 - $sum;
							?>
							<div class="rating">
								<?php for ( $i=0; $i < $left ; $i++ ) : ?>
									<span>☆</span>
								<?php endfor; ?>
								<?php for ( $i=0; $i < $sum ; $i++ ) : ?>
									<span class="checked">☆</span>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php
		ob_get_contents();
	break;

	case 'bottom':
		$ratings = worseRatings();
		ob_start();
		?>
			<div id="feed">
				<center><h4><b>Værst ratede telefoner<b></h4></center>
				<?php foreach ( $ratings as $rating ): ?>
					<div class="row rating-row" data-href="http://phonerate.dk/phones.php?phone=<?= $rating["phoneid"]; ?>&cat=<?= $rating["catid"] ?>">
				 <div class="col-sm-3">
							<span><img class="img-circle" width="50" height="50" src="data:image/jpeg;base64,<?php echo base64_encode($rating["phonephoto"]); ?>" /></span>
						</div>
						<div class="col-sm-9 ">
							<h4><b><?= $rating["phonename"]; ?><b></h4>
							<?php
								$sum = floor($rating['rating_sum']);
								$left = 5 - $sum;
							?>
							<div class="rating">
								<?php for ( $i=0; $i < $left ; $i++ ) : ?>
									<span>☆</span>
								<?php endfor; ?>
								<?php for ( $i=0; $i < $sum ; $i++ ) : ?>
									<span class="checked">☆</span>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php
		ob_get_contents();
	break;
}
?>