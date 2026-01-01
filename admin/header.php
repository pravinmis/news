<?php
//echo "<pre>";
//print_r($_SERVER);
//echo "<pre>";

  include "config.php";
   echo "<h1>".basename($_SERVER['PHP_SELF'])."</h1>";

     $page = basename($_SERVER['PHP_SELF']);

     switch($page){

       case "post.php":
    $page_title= "post";
    break;

    case "update-post.php":
    if(isset($_GET['id'])){
   $sql = "SELECT * FROM post WHERE post_id={$_GET['id']}";
   $result_title=mysqli_query($conn,$sql) or die("query faileddd");
   $row_title=mysqli_fetch_assoc($result_title);
   $page_title=$row_title['title'];
 }else{
   $page_title="no update post found";
 }
       break;
       case "category.php":
      $page_title="category";
       break;

       case "update-category.php":
       if(isset($_GET['cid'])){
      $sql="SELECT * FROM category WHERE category_id={$_GET['cid']}";
      $result_title=mysqli_query($conn,$sql) or die("query faileddd");
      $row_title=mysqli_fetch_assoc($result_title);
      $page_title=$row_title['category_name'];
    }else{
      $page_title="no category title found";
    }

       break;
       case "users.php":
      $page_title="users";
       break;

       case "users-update.php":
       if(isset($_GET['id'])){
      $sql="SELECT * FROM user WHERE user_id={$_GET['id']}";
      $result_title=mysqli_query($conn,$sql) or ("query faileddd");
      $row_title=mysqli_fetch_assoc($result_title);
      $page_title= $row_title['first_name']."".$row_title['last_name'];
    }else{
      $page_title="no author title found";
    }

       break;
       default:
       $page_title="news site";
       break;

     }


session_start();
if(!isset($_SESSION["username"])){
    header("location: http://localhost/news-site/admin/");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $page_title;?></title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>


        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">

                      <?php
                    include "config.php";

                     $sql="SELECT * FROM settings";
                     $result=mysqli_query($conn,$sql) or die("query failed.");
                     if(mysqli_num_rows($result)>0){
                     while($row=mysqli_fetch_assoc($result)){

                       if($row['logo']==""){

                         echo '<h2>'.$row['websitename'].'</h2>';
                       }else{
                    echo  '<a href="index.php"><img src="images/'.$row['logo'].'"></a>';
                  }

                    }
                  }
                  ?>
                    </div>

                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-6  col-md-4">
                        <a href="logout.php" class="admin-logout"> logout </a>
                    </div>
                    <div class="col-md-offset-6  col-md-4">
                        <a href="payment.php" class="admin-logout"> payment</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <?php

                              if($_SESSION["user_role"] == '1'){

                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="settings.php">Settings</a>
                            </li>
                            <?php
                              }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
