<?php
session_start();
$login = isset($_SESSION['usuario_id']);
$id = $_GET['id'] ?? '';


$pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=maindatabase;charset=utf8mb4", "root", "");
$stmt = $pdo->prepare("SELECT titulo, descripcion FROM programa WHERE id_programa = :id");
$stmt->execute([':id' => $id]);
$programa = $stmt->fetch(PDO::FETCH_ASSOC);

$titulo = $programa ? $programa['titulo'] : "Programa no encontrado";
$descripcion = $programa ? $programa['descripcion'] : "";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="vh-100">
        <div class="p-4 mb-2 text-white cabecera">
            <div class="d-flex align-items-center">

                <a href="main.php" class="text-decoration-none p-1">
                    <button
                        class="bg-transparent border-0 text-white p-2 d-flex justify-content-center align-items-center"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-house-door" viewBox="0 0 16 16">
                            <path
                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                        </svg>
                    </button>
                </a>

                <nav class="ms-auto">
                    <?php if ($login): ?>
                        <button class="p-1 text-white rounded-3 btn-login" type="button"
                            onclick="window.location.href='usuario/log-out.php';">
                            Cerrar Sesión
                        </button>
                    <?php else: ?>
                        <button class="p-1 text-white rounded-3 btn-login" type="button"
                            onclick="window.location.href='usuario/sign-in.html';">
                            Iniciar Sesión
                        </button>
                    <?php endif; ?>
                </nav>
            </div>
        </div>

        <div class="card bg-dark text-white shadow-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <img src="https://images-ext-1.discordapp.net/external/SvUQI8DiC-vGAWxo80Y36VHlFTyNnwBbsDh4xcQzZRY/https/i.pinimg.com/736x/f4/9c/5e/f49c5e39c4c1137ed38429b6d8957c1e.jpg?format=webp"
                            class="img-fluid rounded">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-end">
                            <?php if ($login): ?>
                                <a href="#" class="text-white me-2" data-bs-toggle="modal" data-bs-target="#popup">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <h1 class="h3 mb-0 text-white"><?php echo htmlspecialchars($titulo); ?></h1>
                        </div>
                        <p class="mb-0 text-white-50 text-end"><?php echo htmlspecialchars($descripcion); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Editar Programa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="actualizar_entrada.php" method="POST">
                        <input type="hidden" name="id_programa" value="<?php echo htmlspecialchars($id); ?>">

                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" name="titulo" class="form-control" id="titulo"
                                    value="<?php echo htmlspecialchars($titulo); ?>" required>
                                <label for="titulo">Título</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="descripcion" class="form-control" id="descripcion"
                                    value="<?php echo htmlspecialchars($descripcion); ?>" required>
                                <label for="descripcion">Descripción</label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>