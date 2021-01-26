<section class="fnavbar">
		<div class="navbar-fixed">
		<nav>
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo" id="logo_name">Bashama Kitchen</a>
		      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="/bashama" class="hvr-grow">Home</a></li>
				<li><a href="/bashama/about-bashama.php" class="hvr-grow">About Us</a></li>
				<li><a href="#" class="hvr-grow modal-trigger" data-target="modal_location">Location</a></li>
		        <li><a href="food-categories.php" class="hvr-grow">Categories</a></li>
				<li><a href="foods.php" class="hvr-grow">Foods</a></li>
		        <li><a href="#" class="hvr-grow" onclick="toggleModal('Contact Info', 'You can contact us directly by calling to this number +234-816-723-6629. Check the bottom Footer Section of the website for more info.');">Contact</a></li>
		        
		        <?php

		        	if (isset($_SESSION['user'])) {
		        		echo '<li><a href="#" class="hvr-grow dropdown-trigger" data-target="dropdown1">Hi, '.$_SESSION['user'].'</a></li>
		        		<li><a href="logout.php" class="hvr-grow">Logout</a></li>';
		        	} else {
		        		echo '<li><a href="#" class="hvr-grow modal-trigger" data-target="modal1">Login</a></li>
		        		<li><a href="#" class="hvr-grow modal-trigger" data-target="modal2">Register</a></li>';
		        	}

		        ?>
		        
		      </ul>
		    </div>
		  </nav>
		</div>

		  <ul class="sidenav" id="mobile-demo">
		    <li><a href="/bashama">Home</a></li>
			<li><a href="/bashama/about-bashama.php">About Us</a></li>
			<li><a href="#" class="hvr-grow modal-trigger" data-target="modal_location">Location</a></li>
	        <li><a href="food-categories.php">Categories</a></li>
	        <li><a href="foods.php">Foods</a></li>
	        <li><a href="#" onclick="toggleModal('Contact Info', 'You can contact us directly by calling to this number +234-816-723-6629. Check the bottom Footer Section of the website for more info.');">Contact</a></li>

	        <?php

		        	if (isset($_SESSION['user'])) {
		        		echo '<li><a href="#" class=" dropdown-trigger" data-target="dropdown1">Hi, '.$_SESSION['user'].'</a></li>
		        		<li><a href="logout.php">Logout</a></li>';
		        	} else {
		        		echo '<li><a href="#" class="modal-trigger" data-target="modal1">Login</a></li>
		        		<li><a href="#" class="modal-trigger" data-target="modal2">Register</a></li>';
		        	}

		        ?>
		  </ul>
		  <a class='dropdown-trigger btn' style="display:none;" href='#' data-target='dropdown1'>Drop Me!</a>

  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!" class="modal-trigger" data-target="profilemodal">Profile</a></li>
    <li><a href="#L384" style="color:;"  class="modal-trigger" data-target="orderModal"> Orders</a></li>
  </ul>

<?php
if(isset($_SESSION["user"])){
$osql = "SELECT * FROM orders WHERE user_id = '".$_SESSION['user_id']."' AND delivery_status = 0";
$query = mysqli_query($conn, $osql);
$arr_all= mysqli_fetch_assoc($query);

if(!$arr_all == 0){
	echo '
	<ul id=menu style=" position: fixed !important; z-index: 5; font-style: bold !important; font-size: 20px; font-family: serif; background-color: #f5787d; padding-left:10px; padding:5px; border-radius:20px 0px 0px 20px; right: 0; top: 80%; width: 6em; margin-top: -2em; ">
	<li><a href="#L384" style="color:white;"  class="modal-trigger" data-target="orderModal"><i class="material-icons">shopping_cart</i> Orders</a></li>
	</ul>
	';
}
}
//echo $_SESSION['user_id'];

?>

  <script>
	   	 document.addEventListener('DOMContentLoaded', function() {
    		var elems = document.querySelectorAll('.dropdown-trigger');
   		 	var instances = M.Dropdown.init(elems, options);
 		 });

  // Or with jQuery

  		$('.dropdown-trigger').dropdown();
  </script>
	</section>