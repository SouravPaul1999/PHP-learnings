

<?php
function grade_card($input){
  if (strlen($input) > 3) {

    $arr_newline = explode("\n", $input);
    $sub=array();
    $marks=array();
    $arr=array();
    for ($i=0; $i < count($arr_newline) ; $i++)
    {
      $arr=explode("|",$arr_newline[$i]);
      $arr[0] = ltrim(rtrim($arr[0]));
      $arr[1] = ltrim(rtrim($arr[1]));
      array_push($sub,$arr[0]);
      array_push($marks,$arr[1]);
      
    }

    var_dump($sub);
    var_dump($marks);
  } else {
    return "you didn't put your marks <br>";
  }
}

$input = "ghj|89
fgh|89
ghjk|78"

?>