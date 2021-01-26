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

  if (isset($_POST['updatefood'])) {
  	$name = $_POST['fname'];
  	$cat = $_POST['cat'];
  	$desc = $_POST['desc'];
  	

  	$query = "UPDATE `food` SET `fname`='$name',`cat_id`='$cat',`description`='$desc' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Food Updated!</p>';	
  		header('Location: index.php?page=all-food&edit=success');
  	}else{
  		header('Location: index.php?page=all-food&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Food Informations!<small class="text-warning"> Edit Food!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-food">All Foods </a></li>
     <li class="breadcrumb-item active" aria-current="page">Edit Foods</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `fname`, `cat_id`, `description` FROM `food` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form method="POST" action="">
		<div class="form-group">
		    <label for="fname">Name of Food</label>
		    <input name="fname" type="text" class="form-control" id="name" value="<?php echo $row['fname']; ?>" required="">
	  	</div>
	  	<?php
            $sel = "SELECT id,name FROM categories";
            $sel_query = mysqli_query($db_con,$sel);
                      
          ?>
	  	<div class="form-group">
		    <label for="cat">Category</label>
            <select name ="cat" class="form-control" required="">

                <?php
                     $selQ = "SELECT id,name FROM categories where id = '".$row['cat_id']."'";
                     $selQ_query = mysqli_query($db_con,$selQ);
                     $run_selQ = mysqli_fetch_assoc($selQ_query);

                     echo '<option value="'.$run_selQ['id'].'">'.$run_selQ['name'].'</option> <br><br><br>';

                     while ($run_sel = mysqli_fetch_assoc($sel_query)){ 
                        # code...
                        echo '<option value="'.$run_sel['id'].'">'.$run_sel['name'].'</option>';
                    }
                ?>
            </select>
		</div>
	  	<div class="form-group">
		    <label for="desc">Description</label>
		    <textarea name="desc" style="height:130px;" type="text" class="form-control" id="address"  required=""><?php echo $row['description']; ?></textarea>
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updatefood" value="update Food" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>