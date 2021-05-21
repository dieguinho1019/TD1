<?php
header('Content-type: application/json');

echo "Here we go <br>";
if($_GET)
{
    // foreach ($_GET as $key => $value) 
    // {
    //     echo "El valor de $key  es $value <br>";
    // }
    if(isset($_GET['id']))
    {
        //if($_GET['v'] && $_GET['ip'] && $_GET['oid'])

        //echo "Vset";
        if(isset($_GET['data']) && isset($_GET['time']) && isset($_GET['seqNumber']) )
        {
            // $myfile = fopen("capturas.txt", "w") or die("Unable to open file!");
            // fwrite($myfile, $txt);
            
            // foreach ($_GET as $clave=>$valor)
            // {
            //     echo "Nueva lectura de de $clave es: $valor <br>";
            //     $txt = "Nueva lectura de $clave es: $valor\n";
            //     fwrite($myfile, $txt);
            // }
            // fclose($myfile);    

            $varFechaHora=0;

            if(isset($_GET['time']))
            {
                //if($_GET['v'] && $_GET['ip'] && $_GET['oid'])

                //echo "Vset";
                date_default_timezone_set('America/Guayaquil');
                $varFechaHora=date("Y-m-d H:i:s", $_GET['time']);
                echo "fecha: ".$fechaHora;
            }



            $servername = "localhost";
            $username = "diego";
            $password = "TesisDiego123";
            $dbname = "dbSigfox";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            else
            {
                echo "Connected successfully2";
                
                $stmt = $conn->prepare("INSERT INTO tblMensajes (numSecuencia, fechaHora, idDispositivo, latitud, longitud, confianza, idUsuario) VALUES (?,?,?,?,?,?,?);");
                $stmt->bind_param("isiddii", $numSecuencia, $fechaHora, $idDispositivo, $latitud, $longitud, $confianza, $idUsuario);


                $numSecuencia=$_GET['seqNumber'];
                $fechaHora=$varFechaHora;
                $idDispositivo=$_GET['id'];

                $subcadena=substr($_GET['data'],0,8);
                //echo $subcadena."\n";
                $latitud = hexfloat($subcadena);

                $subcadena=substr($_GET['data'],8,8);
                
                $longitud = hexfloat($subcadena);

                //$latitud=-0.12246449291706085;
                //$longitud=-78.4659194946289;

                $subcadena=substr($_GET['data'],16,2);
                $confianza = hexdec($subcadena);
                
                $subcadena=substr($_GET['data'],18,2);
                $idUsuario = hexdec($subcadena);
                
                $rc = $stmt->execute();

                $stmt->close();
                $conn->close();

            }    

        }
        

    }

	

    
}

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
