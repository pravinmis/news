<?php include "header.php";?>




<?php

include "config.php";

$user_id = $_GET['id'];
//  echo $post_id;

$sql= "SELECT * FROM user  WHERE user_id = {$user_id}";

 $result = mysqli_query($conn,$sql) or die("QUERY failed.");
 if(mysqli_num_rows($result) >0){

   while($row = mysqli_fetch_assoc($result)){

 ?>




                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>">
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <!-- <input class="form-control" name="role" value="<?php if($row['role'] ==0
                          ){ echo "normal";
                          }else {
                           echo "Admin";
                          }  ?>"> -->
                          <select name="role" id="">
                          
                            <?php 
                        if ($row['role'] == 0) {
                            echo '<option value="0" selected>normal</option>';
                               echo '<option value="1">admin</option>';
                               } else {
                                  echo '<option value="0">normal</option>';
                              echo '<option value="1" selected>admin</option>';
                             }
                         ?>
                        </select>

                        
                       </form>

                        <?php
                      }
                    }
                         ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
