<?php

if(!isset($_GET['mode'])){
    highlight_file(__file__);
}else if($_GET['mode' ] == "eval"){
    $shell = $_GET['shell'];
    echo strlen($shell);
    if(strlen($shell) > 15 | filter($shell) | checkNums($shell)) exit("hacker");
    eval($shell);
}

function filter($var): bool{
    $banned = ["while", "for", "\$_", "include", "env", "require", "?", ":", "^", "+", "-", "%", "*", "`",hex2bin('c1'),hex2bin('92')];

    foreach($banned as $ban){
        if(strstr($var, $ban)) return True;
    }

    return False;
}

function checkNums($var): bool{
    $alphanum = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $cnt = 0;
    for($i = 0; $i < strlen($alphanum); $i++){
        for($j = 0; $j < strlen($var); $j++){
            if($var[$j] == $alphanum[$i]){
                $cnt += 1;
                if($cnt > 6) return True;
            }
        }
    }
    return False;
}

?>