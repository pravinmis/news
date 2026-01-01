<?php

if(isset($_POST['submit'])){
 $str=$_POST['str'];

 function getrevers($str){
$revers="";
$count=strlen($str)-1;
for($i=$count;$i>=0;$i--){
     $revers.=$str[$i];

}
  return $revers;
}
echo getrevers($str);
}

 ?>
<form class="" action="" method="post">
  <input type="text" name="str" value="">
  <input type="submit" name="submit" value="submit">

</form>
