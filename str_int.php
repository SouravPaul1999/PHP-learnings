<?php
$n1= 5000+"250";
$n2= 2.53;
$n3= 1.9e411;
$n4= acos(7);
$word="hi have a nice day";
echo strlen("Hello ") . " <br>";
print str_word_count("hi sourav"). "<br>";
echo strrev(" hi Monkey"). "<br>";
print strpos($word,"day")."<br>";
echo str_replace("hi", "hello", $word)."<br>";
echo($n1) . "<br>" ;

var_dump(is_string($word));
var_dump(is_float($n2));
var_dump(is_integer($n3));
var_dump(is_finite($n3));
var_dump(is_numeric($word));
var_dump(is_nan($n4));  //NaN stands for Not a Number.NaN is used for impossible mathematical operations.
var_dump($n4);
echo "<br>";
$word.=$n1; // (.=) this operator will concatinate the value of $n1 into $word.

echo $word;
?>