<?php

require 'conexionBDbaloncesto.php';
require 'funcionesAuxiliares.php';

if(datosCorrectos()){
  $miNombre=$_POST['nombre'];
  $miDescripcion = $_POST['descripcion'];
  $miCaracteristica = $_POST['caracteristica'];
  $miEdad = $_POST['edad'];
  $miId = $_POST['id'];

  $miQuery  = "UPDATE elementos SET nombre ='$miNombre',descripcion = '$miDescripcion',caracteristica = '$miCaracteristica',edad = '$miEdad' WHERE id = $miId";

  if ($conn->query($miQuery) === TRUE) {

      $arrayMensaje = array(
        "estado" =>  "OK",
        "mensaje" => "Modificado correctamente",

      );

  }else{

      $arrayMensaje = array(
        "estado" =>  "KO",
        "mensaje" => "Error al modificar"
      );
  }

}else{
  $arrayMensaje = array(
    "estado" =>  "KO",
    "mensaje" => "Envio de información incorrecto"
  );
}


$mensajeJSON = json_encode($arrayMensaje,JSON_PRETTY_PRINT);



echo $mensajeJSON;


 ?>