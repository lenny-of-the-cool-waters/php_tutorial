<?php 

function randomString($length){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomStr = '';

    for($i=0; $i<=$length; $i++){
        $index = rand(0, strlen($characters));
        $randomStr .= $characters[$index];
    }

    return $randomStr;
}

function randomHashString() {
    $str = rand();
    $hashedStr_md5 = md5($str); 
    $hashedStr_sha1 = sha1($str);
    $hashedStr_hash = hash('sha256', $str);
    // Php hashing algorithms include  “sha1”, “sha256”, “md5”, “haval160, 4”

    return $hashedStr_md5;
}
?>