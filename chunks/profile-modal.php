<section class="infomodal">
	<div id="profilemodal" class="modal">
	    <div class="modal-content">
	      <h4 id="info-modal-heading">Profile</h4>
          <?php
          if(isset($_SESSION['user_id'])){
                $psql = "select * from users where id = '".$_SESSION['user_id']."'";
                $query = mysqli_query($conn, $psql);
                $run_p = mysqli_fetch_assoc($query);

          }
          ?>
    <div class="col s12 m4">      
	<table class="table table-bordered">
      <tr>
        <td>Name</td>
        <td><?php echo $run_p["name"]; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $run_p["email"]; ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td><?php echo "Active"; ?></td>
      </tr>
    </table>
    </div>
    <div class="col s12 m4">
    </div>
	    </div>
	    <div class="modal-footer">
	      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
	    </div>
	  </div>
  </section>