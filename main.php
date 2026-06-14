<?php
    session_start();
    $login = isset($_SESSION['usuario_id']);
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
            <div class="input-group p4 mb-2">
                <button class="bg-transparent border-0 text-white p-2 d-flex justify-content-center align-items-center btn-home" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                </svg>
            </button>
            <nav>
                <?php
                    if($login):
                ?>
                <a>
                    <button class="p-1 d-flex justify-content-center align-content-center text-white rounded-3 btn-login"
                    type="button" onclick="window.location.href='usuario/log-out.php';">
                    Cerrar Sesión
                    </button>
                </a>
                <?php
                    else:
                ?>
                <a>
                    <button class="p-1 d-flex justify-content-center align-content-center text-white rounded-3 btn-login"
                    type="button" onclick="window.location.href='usuario/sign-in.html';">
                    Iniciar Sesión
                    </button>
                </a>
                <?php
                    endif;
                ?>
            </nav>
            
            </div>
            
        </div>

        <div class="contenido">
            <div class="input-group p-4 mb-2">
                <div class="dropdown">
                    <button class="text-white p-1 d-flex justify-content-center align-items-center btn-dropdown"
                        data-bs-toggle="dropdown">
                        --------
                    </button>

                    <ul class="dropdown-menu menu-fondo">
                        <li class="dropdown-submenu categoria">
                            <a class="dropdown-item text-white menu-fondo" href="#">Categoría</a>
                            <ul class="dropdown-menu menu-fondo">
                                <li><a class="dropdown-item text-white"
                                        href="#" data-categoria="4">Series</a></li>
                                <li><a class="dropdown-item text-white"
                                        href="#" data-categoria="6">Deportes</a></li>
                                <li><a class="dropdown-item text-white"
                                        href="#" data-categoria="7">Música</a></li>
                                <li><a class="dropdown-item text-white"
                                        href="#" data-categoria="2">Ciencia</a></li>
                                <li><a class="dropdown-item text-white"
                                        href="#" data-categoria="1">Cultura</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu conductor">
                            <a class="dropdown-item text-white menu-fondo" href="#">Conductor</a>
                            <ul class="dropdown-menu menu-fondo">
                                <li><a class="dropdown-item text-white" href="#" data-conductor="1">Cristina	Pacheco</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="2">Miguel	Conde</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="3">Javier	Solórzano</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="4">Adriana	Pérez Cañedo</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="5">Ezra	Shabot</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="6">Fernanda	Tapia</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="7">Plutarco	Haza</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="8">Mario	Carballido</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="9">Max	Espejel</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="10">Silvia	Lomelí</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="11">Julio	Patán</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="12">Irma	Pérez Lince</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="13">Irene	Azuela</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="14">Rubén	Zamora</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="15">Luis	Arrieta</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="16">Juan	Manuel Bernal</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="17">Tulio	Triviño</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="18">Juan Carlos	Bodoque</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="19">Paul	Zaloom</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="20">Rodrigo	Murray</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="21">Lorenzo	Meyer</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="22">José	Antonio Crespo</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="23">Sergio	Aguayo</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="24">Gaby	Pérez Islas</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="25">Macario	Schettino</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="26">Ilan	Katz</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="27">Alan	Estrada</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="28">Leticia	Huijara</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="29">Tenoch	Huerta</a></li>
                                <li><a class="dropdown-item text-white" href="#" data-conductor="30">Naian	González Norvind</a></li>
                            </ul>
                        </li>
                        <a class="dropdown-item text-white menu-fondo" href="#" data-programacion="Once (Señal Nacional 11.1)">Prog. Nacional</a>
                        <a class="dropdown-item text-white menu-fondo" href="#" data-programacion="Once Niñas y Niños (Señal 11.2)">Prog. Infantil</a>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="container py-4">
            <div id="grilla" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="grilla.js"></script>
</body>

</html>