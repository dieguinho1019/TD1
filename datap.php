<?php
header('Content-type: application/json');

echo "where we go <br>";
if($_GET)
{
    // foreach ($_GET as $key => $value) 
    // {
    //     echo "El valor de $key  es $value <br>";
    // }
    if(isset($_GET['time']))
    {
        //if($_GET['v'] && $_GET['ip'] && $_GET['oid'])

        //echo "Vset";
        date_default_timezone_set('America/Guayaquil');
        $fechaHora=date("Y-m-d H:i:s", $_GET['time']);
        echo "fecha: ".$fechaHora;
    }

    if(isset($_GET['entero']))
    {
        //if($_GET['v'] && $_GET['ip'] && $_GET['oid'])

        //echo "Vset";
        $salida = hexdec($_GET['entero']). "\n";
        echo "salida: ".$salida;
        
    }

    
	

    
}
