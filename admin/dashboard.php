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

<h1><a href="index.php"><i class="fas fa-tachometer-alt"></i>  Dashboard</a> <small>Satistics Overview</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Dashboard</li>
  </ol>
</nav>

<div class="row student">
  <div class="col-sm-4">
     <div class="card text-white bg-primary mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-utensils fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $stu=mysqli_query($db_con,'SELECT * FROM `food`'); $stu= mysqli_num_rows($stu); echo $stu; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Total Foods</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
      <a href="index.php?page=all-food">
        <div class="row">
          <div class="col-sm-8">
            <p class="">All Foods</p>
          </div>
          <div class="col-sm-4">
            <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class="card text-white bg-info mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $tusers=mysqli_query($db_con,'SELECT * FROM `users`'); $tusers= mysqli_num_rows($tusers); echo $tusers; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Total Users</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="index.php?page=all-users">
        <div class="row">
          <div class="col-sm-8">
            <p class="">All Users</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class="card text-white bg-warning mb-3">
      <div class="card-header">
        <div class="row">
          <?php $usernameshow = $_SESSION['user_login']; $userspro = mysqli_query($db_con,"SELECT * FROM `admin` WHERE `username`='$usernameshow';"); $userrow=mysqli_fetch_array($userspro); ?>
          <div class="col-sm-6">
            <div style="font-size: 20px"><?php echo ucwords($userrow['name']); ?></div>
          </div>
          <div class="col-sm-6">
            
            <div class="clearfix"></div>
            <div class="float-sm-right">Welcome!</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <a href="index.php?page=admin-profile">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Your Profile</p>
          </div>
          <div class="col-sm-4">
            <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>  
</div>
<hr>
<h3>New Orders</h3>
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
      $query=mysqli_query($db_con,'SELECT * FROM `orders` ORDER BY `orders`.`timestamp` DESC;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
         $fquery = mysqli_query($db_con, "select * from food where id = '".$result['food_id']."'");
         $fresult = mysqli_fetch_assoc($fquery);

         if($result['delivery_status'] == 1){
          $d_status = "<span style='background:green !important;' class='btn btn-warning'>delivered</span>";
          $action = '<a class="btn btn-xs btn-danger" onclick="javascript:confirmationDelete($(this));return false;" href="index.php?page=delete&id='.base64_encode($result['id']).'">
                     <i class="fas fa-trash-alt"></i></a>';
         }else{
          $d_status = "<span style='background-color:!important;' class='btn btn-warning'>Waiting!!</span>";
          $action = '<a class=btn btn-xs btn-danger"" href="index.php?page=editorder&id='.base64_encode($result['id']).'">
                      <i class="fa fa-check"></i></a>';
         }

        echo '<td>'.$i.'</td>
          <td>'.ucwords($result['order_id']).'</td>
          <td>'.$fresult['fname'].'</td>
          <td>'.ucwords($result['user_name']).'</td>
          <td>'.$result['timestamp'].'</td>
          <td>'.$d_status.'</td>
          <td>'.$action.'</td>';
          // ₦ 
          ?>
      </tr>  
     <?php $i++;} ?>
    
  </tbody>
</table>