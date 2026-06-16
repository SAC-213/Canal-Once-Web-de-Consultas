<?php

header('Content-Type: application/json; charset=utf-8');
$pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=maindatabase;charset=utf8mb4", "root", "");
$accion = $_GET['accion'] ?? '';
$id = $_GET['id'] ?? '';

switch ($accion) {
    case 'categoria':
        $sql = "SELECT p.id_programa, p.titulo, TIME_FORMAT(h.hora_inicio, '%H:%i') AS hora_inicio, TIME_FORMAT(h.hora_fin, '%H:%i') AS hora_fin
                FROM horario h JOIN programa p ON h.id_programa = p.id_programa 
                WHERE p.id_categoria = :busqueda";
        break;

    case 'programacion':
        $sql = "SELECT id_programa, titulo, hora_inicio, hora_fin
                FROM vw_CarteleraPublico 
                WHERE nombre_senal = :busqueda";
        break;

    case 'conductor':
        $sql = "SELECT p.id_programa, p.titulo, TIME_FORMAT(h.hora_inicio, '%H:%i') AS hora_inicio, TIME_FORMAT(h.hora_fin, '%H:%i') AS hora_fin
                FROM programa_conductor pc
                JOIN conductor c ON pc.id_conductor = c.id_conductor 
                JOIN programa p ON pc.id_programa = p.id_programa 
                JOIN horario h ON h.id_programa = p.id_programa
                WHERE c.id_conductor = :busqueda";
        break;

    default:
        header('Content-Type: application/json');
        echo json_encode(["error" => "Acción no válida"]);
        exit;
}

$stmt = $pdo->prepare($sql);
$stmt->execute([':busqueda' => $id]);
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultados);
exit();
?>