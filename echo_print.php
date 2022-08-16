<?php
$txt1 = "PHP";
$txt2 = "Hypertext Preprocessor or personal home page";
$x = 5;
$y = 4;

// The differences are small: echo has no return value while print has a return value of 1 so it can be used in expressions. echo can take multiple parameters (although such usage is rare) while print can take one argument. echo is marginally faster than print.

print "<h2>" . $txt1 . "</h2>";
echo "refers to " . $txt2 . "<br>";
print "sum ". $x + $y;
?> 