<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    die("Acceso denegado");
}

$pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=maindatabase;charset=utf8mb4", "root", "");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_programa'];
    $nuevo_titulo = $_POST['titulo'];
    $nueva_descripcion = $_POST['descripcion'];
    $stmt = $pdo->prepare("UPDATE programa SET titulo = :titulo, descripcion = :descr WHERE id_programa = :id");
    $stmt->execute([
        ':titulo' => $nuevo_titulo,
        ':descr' => $nueva_descripcion,
        ':id' => $id
    ]);
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
?>