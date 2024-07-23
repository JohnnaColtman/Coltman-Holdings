<?php 
function redirect($url) {
    header('Location: '.$url);
    die();
}

function redirectwithtime($url, $displaytime, $message = "Please implement the pseudo-code.") {
    (session_status() === PHP_SESSION_ACTIVE) ? session_destroy() : '';
    header("Refresh: ".$displaytime."; url=".$url);
    echo $message;
}
?>