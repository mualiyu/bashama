<section class="loginmodal">
	<div id="commentmodal" class="modal">
	    <div class="modal-content center">
	      <h4>Say Something about Our Restaurant</h4>

	      <h5><small class="center" id="com_error" style="color: red;"></small></h5>
	      <form action="" method="post">

	      	<div class="row">

            <?php
            if(!isset($_SESSION['user'])){
              echo '<div class="input-field col s12">
	                    <input id="cname" type="text" name="cname" class="validate">
                        <label for="name">Name</label>
                    </div>';
            }
            ?>
             
		    <div class="input-field col s12">
	          <textarea id="comment" style="height:80px;" class="validate" name="comment"></textarea>
	          <label for="comment">Comment</label>
	        </div>
	        
		  </div>

          <button class="modal-close waves-effect waves-light btn" style="background: #ee6e73 !important;" type="submit" name="submit" >Submit</button>
	      	
          </form>
          
        <?php

            include "backends/connection-mysqli.php";

            if(isset($_POST['submit'])){
                date_default_timezone_set("Africa/Lagos");
                if(!isset($_SESSION['user'])){
                    $name = $_POST["cname"];
                } else{
                    $name = $_SESSION['user'];
                }              
                $comment = $_POST["comment"];
                $date = date("d-M-Y h:i");

                if(!$name || !$comment){
                    $err_msg ="Don't leave the fields blank!";
                }else{
                    $query = "INSERT INTO comments (name, comment, timestamp) VALUES ('".$name."', '".$comment."', '".$date."')";
                    $run = mysqli_query($conn, $query);

                    if(!$query){
                        $err_msg = "There were some problem in the Server! Try after some time!";
                    }else{
                        $err_msg = "Thank you, We realy appreciate.";
                    }
                }
            }

        ?>
	    </div>
	  </div>
  </section>