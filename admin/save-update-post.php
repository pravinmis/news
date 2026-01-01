<?php

include "config.php";

if(empty($_FILES['new-image']['name'])){
  $file_name = $_POST['old_image'];

}else{

  $errors = array();

  $file_name = $_FILES['new-image']['name'];
  $file_size = $_FILES['new-image']['size'];
  $file_tmp = $_FILES['new-image']['tmp_name'];
  $file_type = $_FILES['new-image']['type'];
  $exp=explode('.',$file_name);
  $file_ext = end($exp);
  $extensions=array("jpeg","jpg","png");

  if(in_array($file_ext,$extensions) === false){
    $errors[]="This extension file not allowed ,pleae choose a JPG or PNG file";
  }
     if($file_size > 2097152){
       $error[]="file size must be 2mb or lower.";
     }
       if(empty($errors)==true){
         move_uploaded_file($file_tmp,"upload/".$file_name);
       }else{
         print_r($errors);
         die();
       }
}

 $post_id=$_POST['post_id'];

   $sql ="UPDATE post SET title ='{$_POST["post_title"]}',description ='{$_POST["postdesc"]}',category='{$_POST["category"]}',post_img='{$file_name}'
 WHERE post_id = {$post_id}";


//  $sql. = "UPDATE category SET post = post-1 WHERE category_id = {$_post['old_category']};";
//  $sql.  = "UPDATE category SET post = post+1 WHERE category_id = {$_post["category"]};";





    $result=mysqli_multi_query($conn,$sql);

    if($result){

      header("location: http://localhost/news-site/admin/post.php");

    }
 ?>
