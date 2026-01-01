<?php
// echo "<pre>";
// print_r($_SERVER);
// echo "<pre>";


  include "config.php";
   echo "<h1>".basename($_SERVER['PHP_SELF'])."</h1>";
    $page = basename($_SERVER['PHP_SELF']);
  //   $page=$_SERVER['PATH_INFO'];

     switch($page){
       case "single.php":
       if(isset($_GET['id'])){
      $sql = "SELECT * FROM post WHERE post_id={$_GET['id']}";
      $result_title=mysqli_query($conn,$sql) or die("query faileddd");
      $row_title=mysqli_fetch_assoc($result_title);
      $page_title=$row_title['title'];
    }else{
      $page_title="no page title  found";
    }
       break;
       case "category.php":
       if(isset($_GET['cid'])){
      $sql="SELECT * FROM category WHERE category_id={$_GET['cid']}";
      $result_title=mysqli_query($conn,$sql) or die("query faileddd");
      $row_title=mysqli_fetch_assoc($result_title);
      $page_title=$row_title['category_name'];
    }else{
      $page_title="no  category title found";
    }
       break;
       case "author.php":
       if(isset($_GET['aid'])){
      $sql="SELECT * FROM user WHERE user_id={$_GET['aid']}";
      $result_title=mysqli_query($conn,$sql) or ("query faileddd");
      $row_title=mysqli_fetch_assoc($result_title);
      $page_title=$row_title['first_name']."".$row_title['last_name'];
    }else{
      $page_title="no author title found";
    }
       break;
       case "search.php":
       if(isset($_GET['search'])){
      $page_title= $_GET['search'];
    }else{
        $page_title="no search title found";
    }
       break;
       default:
       $page_title="news site";
       break;
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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>
<script src="jquery.js"></script>
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .row1{
      display: flex;
    }
    .roshan{
       display: none;
    }
    @media only screen and (max-width:952px){
      .roshan {
        display:block;
      }

      ul {
    margin-top: 30px;
    width: 100%;
    height: 100vh;
    background: #2c3e50;

    }

    .menu > li > a {
    padding: 23px 32px;
     display: block;
    text-transform: uppercase;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    transition: all 0.5s ease 0s;
    }
    }




    </style>
</head>
<body>
<!-- HEADER -->
<div id="header-admin">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->


            <div class="col-md-12">
              <center>
              <?php
            include "config.php";

             $sql="SELECT * FROM settings";
             $result=mysqli_query($conn,$sql) or die("query failed.");
             if(mysqli_num_rows($result)>0){
             while($row=mysqli_fetch_assoc($result)){
               if($row['logo']==""){

                 echo '<h2>'.$row['websitename'].'</h2>';
               }else{
            echo  '<a href="index.php"><img src="images/'.$row['logo'] .'"></a>';
          }

            }
          }
          ?>
        </center>
            </div>

            <!-- /LOGO -->
              <!-- LOGO-Out -->

            <!-- /LOGO-Out -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">

    <div class="container">
        <div class="row1">
            <div class="col-md-10">

                  <?php
               include "config.php";

               if(isset($_GET['cid'])){

               $cat_id = $_GET['cid'];

                 }
                      $sql = "SELECT * FROM category WHERE post > 0";
                      $result = mysqli_query($conn,$sql) or die("query failed : category");
                       if(mysqli_num_rows($result) >0){

                               $active= "";
                  ?>
                <ul class='menu'>



                echo "<li><a class='{$active}' href='<?php echo $hostname; ?>'>Home</a></li>";

                  <?php while($row=mysqli_fetch_assoc($result)){
                         if(isset($_GET['cid'])){
                    if($row['category_id'] == $cat_id){

                      $active= "active";
                    }else{
                      $active= "";
                    }
                  }
              echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                  } ?>
                </ul>
                  <?php } ?>

                  <!--/*<i style="font-size:24px" class="fa">&#xf0c9;</i>*/-->
            </div>
            <div class="roshan">
              <span>
          <i class="fa fa-bars"></i>
        </span>
          </div>


                      </div>
                    </div>
                  </div>



<!-- /Menu Bar -->
