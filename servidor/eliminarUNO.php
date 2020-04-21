<?php

require 'conexionBDbaloncesto.php';
require 'funcionesAuxiliares.php';


if(datosCorrectos()){
  $miId=$_POST['id'];


  $miQuery  = "DELETE FROM elementos where id = $miId";

  if ($conn->query($miQuery) === TRUE) {

      $arrayMensaje = array(
        "estado" =>  "OK",
        "mensaje" => "borrado correctamente el id: $miId",
      );

  }else{

      $arrayMensaje = array(
        "estado" =>  "KO",
        "mensaje" => "Error al borrar",
        "error" =>  $conn->error


      );
  }

}else{
  $arrayMensaje = array(
    "estado" =>  "KO",
    "mensaje" => "no se ha borrado correctamente"
  );
}


$mensajeJSON = json_encode($arrayMensaje,JSON_PRETTY_PRINT);

//echo "<pre>";

echo $mensajeJSON;


 ?>