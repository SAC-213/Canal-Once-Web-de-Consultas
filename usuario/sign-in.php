<?php
$pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=maindatabase;charset=utf8mb4", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $usuario = $_POST['nombre_usuario'];
    $password_plano = $_POST['contrasena'];

    $sql = "SELECT id_usuario, contrasena_hash FROM usuario_admin WHERE nombre_usuario = :usuario";
    $stmt = $pdo->prepare($sql);

    $stmt->execute(['usuario' => $usuario]);
    $correct_user = $stmt->fetch();

    if ($correct_user && password_verify($password_plano, $correct_user['contrasena_hash']))
    {
        session_start();
        $_SESSION['usuario_id'] = $correct_user['id_usuario'];
        header("Location: ../main.php");
    } 
    else
    {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>