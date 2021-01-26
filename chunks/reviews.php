<section class="freviews">

		<div class="section white center">
			<h3 class="header">What Our Customers Say</h3>
			<div class="carousel myreviews" style="margin-bottom: 35px;">
			<?php
				$sel = "SELECT * FROM comments ORDER BY(id) DESC";
				$sel_query = mysqli_query($conn, $sel);

				while ($row = mysqli_fetch_assoc($sel_query)){

			?>
			    <a class="carousel-item" href="#one!">
			    	<div class="row">
					    <div class="col s12">
					      <div class="card-panel teal" style="background: #ee6e73 !important;">
					        <span class="white-text">"<?php echo $row['comment']; ?>"<br>-<br> <strong><?php echo $row['name']; ?></strong>
					        </span>
					      </div>
					    </div>
					  </div>
				</a>
			<?php
				}
			?>
			    
			  </div>
		</div>
	</section>