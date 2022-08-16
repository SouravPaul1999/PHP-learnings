<!DOCTYPE html>
<html>
<body>

<?php
$str = "color red is more visible than \n color blue in daylight.";
$pattern = "/^color/im";
echo preg_match($pattern, $str); 
?>

</body>
</html>
