<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
require_once('conexion_bd.php');
try {
    	$consulta = $pdo->prepare("SELECT * FROM comentarios ;");
    	$consulta->execute();
    	$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    	if(count($resultados) > 0){
    	    $lecturas = array();
    	    $respuesta["conexion"] = true;
            $respuesta["mensaje"] = "Lecturas";
            $respuesta["num_lecturas"] = count($resultados);
            foreach ($resultados as $fila) {
                $lectura['id'] = $fila['id_lectura'];
                $lectura['titulo'] = ($fila['titulo']);
                $lectura['lenguaje'] = ($fila['lenguaje']);
                $lectura['uri'] = $fila['uri'];
                $lectura['descripcion'] = ($fila['descripcion']);
                $lectura['favorita'] = $fila['id_usuario'];
                array_push($lecturas, $lectura);
            }
            $respuesta["lecturas"] = $lecturas;
    	} else {
        	$respuesta["conexion"] = false;
        	$respuesta["error"] = "0006";
    	}   
} catch (Exception $e) {
	$respuesta["conexion"] = false;
	$respuesta["error"] = "0001";
}
echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);