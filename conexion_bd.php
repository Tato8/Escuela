<?
$servidor = 'localhost';
$base_datos = 'tarea_1';
$usuario = 'root';
$password = '';
$pdo = new PDO("mysql:host=$servidor;dbname=$base_datos;",$usuario,$password);