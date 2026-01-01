<?php



$st="renu";





  function rev($st){


       $rev=strrev($st);

   return $rev;

}
echo rev($st);






/*
if(isset($_POST['submit'])){

  echo getrevers($_POST['str']);

}
function getrevers($str){
  $revers="";
  //$str ="dhoni";
  $count=strlen($str)-1;
  for($i=$count;$i>=0;$i--){

    $revers.=$str[$i];

  }

return $revers;
}*/
?>
<form   method="post">
  <input type="text" name="str" value="">
  <input type="submit" name="submit">
</form>
