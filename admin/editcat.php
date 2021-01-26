<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);

  if (isset($_POST['updatecat'])) {
  	$name = $_POST['name'];
  	$short_d = $_POST['short_d'];
  	$long_d = $_POST['long_d'];
  	

  	$query = "UPDATE `categories` SET `name`='$name',`short_desc`='$short_d',`long_desc`='$long_d' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Category Updated!</p>';	
  		header('Location: index.php?page=all-cat&edit=success');
  	}else{
  		header('Location: index.php?page=all-cat&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Category Informations!<small class="text-warning"> Edit Category!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-cat">All Categories </a></li>
     <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `name`, `short_desc`, `long_desc` FROM `categories` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form method="POST" action="">
		<div class="form-group">
		    <label for="name">Category Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="short_d">Short Description</label>
		    <input name="short_d" type="text" class="form-control"  id="roll" value="<?php echo $row['short_desc']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="long_d">Long Description</label>
		    <textarea name="long_d" style="height:130px;" type="text" class="form-control" id="address" value="<?php echo $row['long_desc']; ?>" required=""><?php echo $row['long_desc']; ?></textarea>
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updatecat" value="update category" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>