<section class="infomodal">
	<div id="orderModal" class="modal">
	    <div class="modal-content" style="height:25em;">
	      <h4 id="info-modal-heading">Orders</h4>
          <div style="height:20em; overflow-x:hidden; overflow-y:scroll;">
          <table>
              <tr style="font-size:18px;">
                  <th>Order Id</th>
                  <th>Order</th>
                  <th>Status</th>
              </tr>
              <?php
                if(isset($_SESSION["user"])){
                    $osql = "SELECT * FROM orders WHERE user_id = '".$_SESSION['user_id']."' ORDER BY(timestamp) DESC";
                    $query = mysqli_query($conn, $osql);

                    while ($row = mysqli_fetch_assoc($query)){
                        $food_id = $row["food_id"];
                        $fsql = "SELECT * FROM food WHERE id = '".$food_id."'";
                        $fquery = mysqli_query($conn, $fsql);
                        $frun = mysqli_fetch_assoc($fquery);
                         
                        if($row["delivery_status"] == 1){
                            $status = "<span style=' background-color:green;' class='btn-small'>Delivered</span>";
                        }else{
                            $status = "<span style='background-color:red;' class='btn-small'>Pending</span>";
                        }
              ?>
              <tr>
                  <td><?php echo $row["order_id"]; ?></td>
                  <td><?php echo $frun['fname']; ?></td>
                  <td><?php echo $status; ?></td>
              </tr>
              <?php
                    }
                }    
              ?>
          </table>
          </div>
	    </div>
	    <div class="modal-footer">
	      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
	    </div>
	  </div>
  </section>