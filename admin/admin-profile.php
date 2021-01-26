<?php 
$admin_user=  $_SESSION['user_login'];
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>
<h1 class="text-primary"><i class="fas fa-user"></i>  Admin Profile</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
  </ol>
</nav>
<?php 
  $query = mysqli_query($db_con, "SELECT * FROM `admin` WHERE `username` ='$admin_user';");
  $row = mysqli_fetch_array($query);

 ?>
<div class="row">
  <div class="col-sm-6">
    <table class="table table-bordered">
      <tr>
        <td>User ID</td>
        <td><?php echo $row['id']; ?></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo ucwords($row['name']); ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $row['email']; ?></td>
      </tr>
      <tr>
        <td>Username</td>
        <td><?php echo ucwords($row['username']); ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td><?php echo ucwords($row['status']); ?></td>
      </tr>
      <tr>
        <td>Register Date</td>
        <td><?php echo $row['datetime']; ?></td>
      </tr>
    </table>
    <a class="btn btn-warning pull-right" href="index.php?page=edit-admin&id=<?php echo base64_encode($row['id']); ?>">Edit Profile</a>
  </div>
</div>
