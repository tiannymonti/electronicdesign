<?php
/*
 * leebasededatos.php
 * 
 * Copyright 2016 Tianny Monti <Tianny Monti@DESKTOP-4POKJ0O>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */
	
function connectDB(){
   $conexion = mysqli_connect("localhost", "root", "1234", "labase");
    if($conexion){
        echo 'La conexión de la base de datos se ha hecho satisfactoriamente';
    }else{
          die("La conexion fallo: " . $conexion->connect_error);
    }   
    return $conexion;
}
function disconnectDB($conexion){
    $close = mysqli_close($conexion);
    if($close){
        echo 'La desconexión de la base de datos se ha hecho satisfactoriamente';
    }else{
        echo 'Ha sucedido un error inesperado en la desconexión de la base de datos';
    }   
    return $close;
}
function getArraySQL($sql){
    //Creamos la conexión con la función anterior
    $conexion = connectDB();
    //generamos la consulta
    mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa
    $rawdata = array(); //creamos un array
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;
    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }
    disconnectDB($conexion); //desconectamos la base de datos
    return $rawdata; //devolvemos el array
}

$sql = "SELECT id, latitud, longitud, time FROM labase.tabla ORDER BY id DESC"
$myArray = getArraySQL($sql);
echo json_encode($myArray);

?>


