<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>
<h1 class="text-primary"><i class="fas fa-shopping-cart"></i> Orders<small class="text-warning"> Orders List!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Orders</li>
  </ol>
</nav>
<?php if(isset($_GET['delete']) || isset($_GET['edit'])) {?>
  <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
    <div class="toast-header">
      <strong class="mr-auto">Order Insert Alert</strong>
      <small><?php echo date('d-M-Y'); ?></small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      <?php 
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='success') {
            echo "<p style='color: green; font-weight: bold;'>Order Deleted Successfully!</p>";
          }  
        }
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='error') {
            echo "<p style='color: red'; font-weight: bold;>Order Not Deleted!</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='success') {
            echo "<p style='color: green; font-weight: bold; '>Order Edited Successfully!</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='error') {
            echo "<p style='color: red; font-weight: bold;'>Order Not Edited!</p>";
          }  
        }
      ?>
    </div>
  </div>
    <?php } ?>
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Order ID</th>
      <th scope="col">Food</th>
      <th scope="col">Name</th>
      <th scope="col">Time</th>
      <th scope="col">Status</th>
      <th scope="col">Acion</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query=mysqli_query($db_con,'SELECT * FROM `orders` ORDER BY `orders`.`id` DESC;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 

$fquery = mysqli_query($db_con, "select * from food where id = '".$result['food_id']."'");
$fresult = mysqli_fetch_assoc($fquery);

if($result['delivery_status'] == 1){
 $d_status = "<span style='background:green !important;' class='btn'>delivered</span>";
 $action = '<a class="btn btn-xs btn-danger" onclick="javascript:confirmationDelete($(this));return false;" href="index.php?page=delete-order&id='.base64_encode($result['id']).'">
             <i class="fas fa-trash-alt"></i></a>';
}else{
 $d_status = "<span style='background-color:!important;' class='btn btn-xs btn-warning'>Waiting!!</span>";
 $action = '<a class=btn btn-xs btn-danger"" href="index.php?page=editorder&id='.base64_encode($result['id']).'">
              <i class="fa fa-check"></i></a>';
}
        echo '<td>'.$i.'</td>
        <td>'.ucwords($result['order_id']).'</td>
        <td>'.$fresult['fname'].'</td>
        <td>'.ucwords($result['user_name']).'</td>
        <td>'.$result['timestamp'].'</td>
        <td>'.$d_status.'</td>
          <td>'.$action.'</td>';?>
      </tr>  
     <?php $i++;} ?>
    
  </tbody>
</table>
<script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>