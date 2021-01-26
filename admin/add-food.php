<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addfood'])) {
  	$fname = $_POST['fname'];
  	$cat = $_POST['cat'];
  	$desc = $_POST['desc'];
  	
  	$query = "INSERT INTO `food`(`fname`, `cat_id`, `description`) VALUES ('$fname', '$cat', '$desc');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Food Inserted!</p>';
  		
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Fodd Not Inserted, please input right informations!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-utensils"></i>  Add Food<small class="text-warning"> Add New Food!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add food</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="3000">
	  <div class="toast-header">
	    <strong class="mr-auto">Food Insert Alert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
	<form  method="POST" action="">
		<div class="form-group">
		    <label for="name">Name of Food</label>
		    <input name="fname" type="text" class="form-control" id="name" value="<?= isset($fname)? $fname: '' ; ?>" required="">
	  	</div>
          <?php
            $sel = "SELECT id,name FROM categories";
            $sel_query = mysqli_query($db_con,$sel);
                      
          ?>
	  	<div class="form-group">
		    <label for="cat">Category</label>
            <select name ="cat" class="form-control" required="">
                <?php
                     while ($run_sel = mysqli_fetch_assoc($sel_query)){ 
                        # code...
                        echo '<option value="'.$run_sel['id'].'">'.$run_sel['name'].'</option>';
                    }
                ?>
            </select>
		</div>
	  	<div class="form-group">
		    <label for="desc">Description</label>
		    <textarea name="desc" style="height:140px;" type="text" value="<?= isset($desc)? $desc: '' ; ?>" class="form-control" id="address" required=""><?= isset($long_d)? $long_d: '' ; ?></textarea>
	  	</div>
	  	<div class="form-group text-center">
		    <input name="addfood" value="Add Food" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>