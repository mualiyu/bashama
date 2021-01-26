<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addcat'])) {
  	$name = $_POST['name'];
  	$short_d = $_POST['short_d'];
  	$long_d = $_POST['long_d'];
  	
  	$query = "INSERT INTO `categories`(`name`, `short_desc`, `long_desc`) VALUES ('$name', '$short_d', '$long_d');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Category Inserted!</p>';
  		
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Category Not Inserted, please input right informations!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-cart-plus"></i>  Add Category<small class="text-warning"> Add New Category!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Category</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="3000">
	  <div class="toast-header">
	    <strong class="mr-auto">Category Insert Alert</strong>
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
		    <label for="name">Category Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?= isset($name)? $name: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="short_d">Short Description</label>
		    <input name="short_d" type="text" value="<?= isset($short_d)? $short_d: '' ; ?>" class="form-control"  id="roll" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="long_d">Long Description</label>
		    <textarea name="long_d" style="height:130px;" type="text" class="form-control" id="address" required=""><?= isset($long_d)? $long_d: '' ; ?></textarea>
	  	</div>
	  	<div class="form-group text-center">
		    <input name="addcat" value="Add Category" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>