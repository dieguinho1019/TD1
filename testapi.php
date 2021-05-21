<?php

function hexfloat(string $hex): float
{
    $aux=$hex[6];
    $hex[6]=$hex[0];
    $hex[0]=$aux;

    $aux=$hex[7];
    $hex[7]=$hex[1];
    $hex[1]=$aux;

    $aux=$hex[4];
    $hex[4]=$hex[2];
    $hex[2]=$aux;

    $aux=$hex[5];
    $hex[5]=$hex[3];
    $hex[3]=$aux;


    $dec = hexdec($hex);

    if ($dec === 0) {
        return 0;
    }
    $sup = 1 << 23;
    $x = ($dec & ($sup - 1)) + $sup * ($dec >> 31 | 1);
    $exp = ($dec >> 23 & 0xFF) - 127;
    $sign = ($dec & 0x80000000) ? -1 : 1;

    return $sign * $x * pow(2, $exp - 23);
}



if($_GET)
{
    if(isset($_GET['hexstr']))
    {
        $subcadena=substr($_GET['hexstr'],8,8);
        echo $subcadena."\n";
        $float = hexfloat($subcadena);
        echo "HexFloat16<br>";
        var_dump($float);
    }
    
}

?>
 
