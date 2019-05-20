<?php
header('Content-Type: application/json');
require_once('conexion_bd.php');
try {
	if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['telefono']) && !empty($_POST['comentario'])){
    	$nombre =  html_entity_decode( $_POST['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8");
    	$correo = html_entity_decode( $_POST['correo'], ENT_QUOTES | ENT_HTML401, "UTF-8");
    	$comentario = html_entity_decode( $_POST['comentario'], ENT_QUOTES | ENT_HTML401, "UTF-8");
        $telefono = $_POST['telefono'];    
    	
        	$insercion = $pdo->prepare("INSERT INTO comentarios (correo, telefono, nombre, mensaje) VALUES ('$correo', '$telefono', '$nombre', '$comentario');");
        	$insercion->execute();
        	$respuesta["conexion"] = true;
            $respuesta["mensaje"] = "Comentario guardado";

    } else {
    	$respuesta["conexion"] = false;
    	$respuesta["error"] = "0002";
    }
} catch (Exception $e) {
	$respuesta["conexion"] = false;
	$respuesta["error"] = "0001";
}
echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);