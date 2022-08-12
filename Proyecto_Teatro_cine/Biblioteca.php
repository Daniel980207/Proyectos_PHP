
<?php
/**
 * Crea una matriz de 5x5 de la letra L.
 * 
 * return Se devuelve el arreglo .
 */
function TeatroInicializacion()
{
    for ($fil = 0; $fil <= 4; $fil++) {
        for ($col = 0; $col < 5; $col++) {
            $Sillas[$fil][$col] = "L";
        }
    }
    return $Sillas;
}
/**
 * Si el asiento está disponible y la operación es comprar o reservar, entonces haga la operación.
 * Si el asiento es reservado, y la operación es comprar o liberar, entonces haz la operación.
 * Si el asiento es comprado, y la operación es reservar o liberar, entonces no hagas la operación.
 * Si ninguno de los anteriores, entonces no haga la operación.
 * 
 * return la matriz modificada.
 */
function ModificacionSillas()
{
    $SillasModificar = json_decode($_POST['SillasActules']);

    $Filas = $_POST['Filas'] - 1;
    $Columnas = $_POST['Columnas'] - 1;
    $Operacion = $_POST['Operacion'];

    $ValidacionSillas = $SillasModificar[$Filas][$Columnas];
    if ($ValidacionSillas == "L" and ($Operacion == "comprar" or $Operacion == "reservar")) {
        if ($Operacion == "comprar") {
            $SillasModificar[$Filas][$Columnas] = "V";
        } else {
            $SillasModificar[$Filas][$Columnas] = "R";
        }
        echo '<script> alert("La operacion ha sido exitosa"); </script>';
    } elseif ($ValidacionSillas == "R" and ($Operacion == "comprar" or $Operacion == "liberar")) {
        if ($Operacion == "comprar") {
            $SillasModificar[$Filas][$Columnas] = "V";
        } else {
            $SillasModificar[$Filas][$Columnas] = "L";
        }
        echo '<script> alert("La operacion ha sido exitosa"); </script>';
    } elseif ($ValidacionSillas == "V" and ($Operacion == "reservar" or $Operacion == "liberar")) {
        echo '<script> alert("La operacion no puede ser realizada"); </script>';
    } else {
        echo '<script> alert("No se realizo ninguna operacion"); </script>';
    }
    return $SillasModificar;
}
/**
 * Si el asiento es libre y el usuario desea comprarlo o reservarlo, cambie el asiento a reservado o
 * comprado.
 * Si el asiento está reservado y el usuario desea comprarlo o liberarlo, cambie el asiento a comprado
 * o libre.
 * De lo contrario, no hagas nada.
 * 
 * return la matriz con el valor modificado.
 */
function ObtenerPuestos()
{
    $SillasModificar = json_decode($_POST['SillasActules']);

    $Filas = $_POST['Filas'] - 1;
    $Columnas = $_POST['Columnas'] - 1;
    $Operacion = $_POST['Operacion'];

    $ValidacionSillas = $SillasModificar[$Filas][$Columnas];
    if ($ValidacionSillas == "L" and ($Operacion == "comprar" or $Operacion == "reservar")) {
        if ($Operacion == "comprar") {
            $SillasModificar[$Filas][$Columnas] = "V";
        } else {
            $SillasModificar[$Filas][$Columnas] = "R";
        }
    } elseif ($ValidacionSillas == "R" and ($Operacion == "comprar" or $Operacion == "liberar")) {
        if ($Operacion == "comprar") {
            $SillasModificar[$Filas][$Columnas] = "V";
        } else {
            $SillasModificar[$Filas][$Columnas] = "L";
        }
    } else {
    }
    return $SillasModificar;
}
?>  
