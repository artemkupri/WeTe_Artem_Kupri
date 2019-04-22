<?php

function is_odd($number) {
    if (($number%2)==0)
        print "<p>Number $number is even.</p>";
    else
        print "<p>Number $number is odd.</p>";
}

is_odd(rand(0, 50));
/*
$checked_number=rand(0, 50); # random number generator
if (is_odd($checked_number)==TRUE)
    print "<p>Number $checked_number is odd.</p>";
else
    print "<p>Number $checked_number is even.</p>";
*/


?>
