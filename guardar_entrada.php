<?php
$pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=maindatabase;charset=utf8mb4", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $hora_inicio = $_POST['hora_inicio'] ?? 0;
    $minuto_inicio = $_POST['minuto_inicio'] ?? 0;
    $hora_fin = $_POST['hora_fin'] ?? 0;
    $minuto_fin = $_POST['minuto_fin'] ?? 0;
    $clasificacion = $_POST['id_clasificacion'] ?? null;
    $categoria = $_POST['id_categoria'] ?? null;
    $es_nacional = isset($_POST['es_nacional']) ? 1 : 0;
    $es_infantil = isset($_POST['es_infantil']) ? 1 : 0;
    $tiene_cond = isset($_POST['conductor_checkbox']) ? 1 : 0;
    $conductor = $_POST['conductor'] ?? '';

    $horaInicio_sql = sprintf("%02d:%02d:00", $hora_inicio, $minuto_inicio);
    $horaFin_sql = sprintf("%02d:%02d:00", $hora_fin, $minuto_fin);

    try {
        $pdo->beginTransaction();
        $sql = "INSERT INTO Programa (titulo, descripcion, es_nacional, es_infantil, id_clasificacion, id_categoria) 
            VALUES (:titulo, :descr, :nac, :inf, :clas, :cat)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':titulo' => $titulo, ':descr' => $descripcion, ':nac' => $es_nacional, ':inf' => $es_infantil, ':clas' => $clasificacion, ':cat' => $categoria]);

        $idPrograma = $pdo->lastInsertId();

        if ($es_nacional) {
            $senal = 1;
        } else if ($es_infantil) {
            $senal = 2;
        } else {
            $senal = 3;
        }

        $sqlHorario = "INSERT INTO horario (id_programa, hora_inicio, hora_fin, id_senal) VALUES (:id, :hora_inicio, :hora_fin, :senal)";
        $stmtH = $pdo->prepare($sqlHorario);
        $stmtH->execute([
            ':id' => $idPrograma,
            ':hora_inicio' => $horaInicio_sql,
            ':hora_fin' => $horaFin_sql,
            ':senal' => $senal
        ]);

        if ($tiene_cond && !empty($conductor)) {
            $sqlCond = "INSERT INTO programa_conductor (id_programa, id_conductor) VALUES (:id_programa, :id_conductor)";
            $stmtH = $pdo->prepare($sqlCond);
            $stmtH->execute([':id_programa' => $idPrograma,':id_conductor' => $conductor]);
        }
        $pdo->commit();
        header("Location: main.php?mensaje=exito");
        exit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error al guardar: " . $e->getMessage();
    }

}
?>