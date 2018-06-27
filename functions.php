<?php

/**
* Fonction equivalente à $.now() en jquery
*/
function microtime_int()
{
    list($usec, $sec) = explode(" ", microtime());
    $sum = (float)$usec + (float)$sec;
    return (int)($sum*1000);
}
