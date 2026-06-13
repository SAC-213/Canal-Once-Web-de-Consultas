<?php
$pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=maindatabase;charset=utf8mb4", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['nombre_usuario'];
    $password_plano = $_POST['contrasena'];
    $hash = password_hash($password_plano, PASSWORD_DEFAULT);

    try
    {
        $sql = "INSERT INTO usuario_admin (nombre_usuario, contrasena_hash) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuario, $hash]);
        header("Location: sign-in.html");
        exit();
        
    } catch (PDOException $e)
    {
        if ($e->getCode() == 23000)
        {
            echo "Error: El nombre de usuario ya está en uso. <a href='javascript:history.back()'>Volver</a>";
        } 
        else
        {
            echo "Error inesperado: " . $e->getMessage();
        }
    }
}
?>