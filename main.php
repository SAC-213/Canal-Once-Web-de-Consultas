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
                        <div class="d-flex align-items-center">
                                <a href="main.php" class="text-decoration-none p-1">
                                        <button class="bg-transparent border-0 text-white p-2 d-flex justify-content-center align-items-center"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-house-door"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                                                </svg>
                                        </button>
                                </a>
                                <nav class="ms-auto d-flex align-items-center gap-2">
                                        <?php if ($login): ?>
                                                <button class="btn-add bg-transparent border-0 text-white p-2 d-flex justify-content-center align-items-center"
                                                        type="button" data-bs-toggle="modal" data-bs-target="#popup">
                                                        Agregar Entrada +
                                                </button>

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


                <div class="modal fade" id="popup" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title">Nueva Entrada</h5>
                                        </div>
                                        <form action="guardar_entrada.php" method="POST">
                                                <div class="modal-body">
                                                        <div class="form-floating">
                                                                <input type="text" name="titulo" class="form-control"
                                                                        id="titulo" placeholder="User" required>
                                                                <label for="floatingInput">Título</label>
                                                        </div>
                                                        <div class="form-floating">
                                                                <input type="text" name="descripcion"
                                                                        class="form-control" id="descripcion"
                                                                        placeholder="User">
                                                                <label for="floatingInput">Decripción</label>
                                                        </div>

                                                        Hora de inicio:
                                                        <div class="row g-2">
                                                                <div class="col-6">
                                                                        <div class="form-floating">
                                                                                <input type="number" name="hora_inicio"
                                                                                        class="form-control"
                                                                                        id="hora_inicio"
                                                                                        placeholder="Hora" min="0"
                                                                                        max="23" required>
                                                                                <label for="floatingHora">Hora
                                                                                        (00-23)</label>
                                                                        </div>
                                                                </div>
                                                                <div class="col-6">
                                                                        <div class="form-floating">
                                                                                <input type="number"
                                                                                        name="minuto_inicio"
                                                                                        class="form-control"
                                                                                        id="minuto_inicio"
                                                                                        placeholder="Minuto" min="0"
                                                                                        max="59" required>
                                                                                <label
                                                                                        for="floatingMinuto">Minuto</label>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        Hora de fin:
                                                        <div class="row g-2">
                                                                <div class="col-6">
                                                                        <div class="form-floating">
                                                                                <input type="number" name="hora_fin"
                                                                                        class="form-control"
                                                                                        id="hora_fin"
                                                                                        placeholder="Hora" min="0"
                                                                                        max="23" required>
                                                                                <label for="floatingHora">Hora
                                                                                        (00-23)</label>
                                                                        </div>
                                                                </div>
                                                                <div class="col-6">
                                                                        <div class="form-floating">
                                                                                <input type="number" name="minuto_fin"
                                                                                        class="form-control"
                                                                                        id="minuto_fin"
                                                                                        placeholder="Minuto" min="0"
                                                                                        max="59" required>
                                                                                <label
                                                                                        for="floatingMinuto">Minuto</label>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="d-flex flex-wrap gap-2 p-3">
                                                                <input type="checkbox" class="btn-check" id="check1"
                                                                        name="es_nacional" value="1">
                                                                <label class="btn btn-outline-primary"
                                                                        for="check1">Programación
                                                                        Nacional</label>

                                                                <input type="checkbox" class="btn-check" id="infantil"
                                                                        name="es_infantil" value="1">
                                                                <label class="btn btn-outline-primary"
                                                                        for="infantil">Programación Infantil</label>
                                                        </div>
                                                        <div class="d-flex flex-wrap gap-2 p-3" id="radio-clas">
                                                                Clasificación por edad:
                                                                <input type="radio" class="btn-check" id="clas1"
                                                                        name="id_clasificacion" value="1" required>
                                                                <label class="btn btn-outline-primary"
                                                                        for="clas1">AA</label>

                                                                <input type="radio" class="btn-check" id="clas2"
                                                                        name="id_clasificacion" value="2" required>
                                                                <label class="btn btn-outline-primary"
                                                                        for="clas2">A</label>

                                                                <input type="radio" class="btn-check" id="clas3"
                                                                        name="id_clasificacion" value="3" required>
                                                                <label class="btn btn-outline-primary"
                                                                        for="clas3">B</label>

                                                                <input type="radio" class="btn-check" id="clas4"
                                                                        name="id_clasificacion" value="4" required>
                                                                <label class="btn btn-outline-primary"
                                                                        for="clas4">B-15</label>

                                                                <input type="radio" class="btn-check" id="clas5"
                                                                        name="id_clasificacion" value="5" required>
                                                                <label class="btn btn-outline-primary"
                                                                        for="clas5">C</label>
                                                        </div>
                                                        <div class="d-flex flex-wrap gap-2 p-3" id="radio-cat">
                                                                Categoría:
                                                                <input type="radio" class="btn-check" id="cat1"
                                                                        name="id_categoria" value="4">
                                                                <label class="btn btn-outline-primary"
                                                                        for="cat1">Series y Películas</label>

                                                                <input type="radio" class="btn-check" id="cat2"
                                                                        name="id_categoria" value="6">
                                                                <label class="btn btn-outline-primary"
                                                                        for="cat2">Deportes</label>

                                                                <input type="radio" class="btn-check" id="cat3"
                                                                        name="id_categoria" value="7">
                                                                <label class="btn btn-outline-primary"
                                                                        for="cat3">Música</label>

                                                                <input type="radio" class="btn-check" id="cat4"
                                                                        name="id_categoria" value="2">
                                                                <label class="btn btn-outline-primary"
                                                                        for="cat4">Ciencia</label>

                                                                <input type="radio" class="btn-check" id="cat5"
                                                                        name="id_categoria" value="1">
                                                                <label class="btn btn-outline-primary"
                                                                        for="cat5">Cultura</label>


                                                        </div>
                                                        <div class="row g-2">
                                                                <div class="col-3">
                                                                        <input type="checkbox" class="btn-check"
                                                                                id="check8" name="conductor_checkbox"
                                                                                value="1">
                                                                        <label class="btn btn-outline-primary"
                                                                                for="check8">Conductor</label>
                                                                </div>
                                                                <div class="col-9">
                                                                        <div class="form-floating">
                                                                                <select name="id_conductor"
                                                                                        class="form-select"
                                                                                        id="conductorSelect" disabled>
                                                                                        <option value="" selected
                                                                                                disabled>
                                                                                        </option>
                                                                                        <option value="1">Cristina
                                                                                                Pacheco
                                                                                        </option>
                                                                                        <option value="2">Miguel Conde
                                                                                        </option>
                                                                                        <option value="3">Javier
                                                                                                Solórzano
                                                                                        </option>
                                                                                        <option value="4">Adriana Pérez
                                                                                                Cañedo
                                                                                        </option>
                                                                                        <option value="5">Ezra Shabot
                                                                                        </option>
                                                                                        <option value="6">Fernanda Tapia
                                                                                        </option>
                                                                                        <option value="7">Plutarco Haza
                                                                                        </option>
                                                                                        <option value="8">Mario
                                                                                                Carballido
                                                                                        </option>
                                                                                        <option value="9">Max Espejel
                                                                                        </option>
                                                                                        <option value="10">Silvia Lomelí
                                                                                        </option>
                                                                                        <option value="11">Julio Patán
                                                                                        </option>
                                                                                        <option value="12">Irma Pérez
                                                                                                Lince
                                                                                        </option>
                                                                                        <option value="13">Irene Azuela
                                                                                        </option>
                                                                                        <option value="14">Rubén Zamora
                                                                                        </option>
                                                                                        <option value="15">Luis Arrieta
                                                                                        </option>
                                                                                        <option value="16">Juan Manuel
                                                                                                Bernal
                                                                                        </option>
                                                                                        <option value="17">Tulio Triviño
                                                                                        </option>
                                                                                        <option value="18">Juan Carlos
                                                                                                Bodoque
                                                                                        </option>
                                                                                        <option value="19">Paul Zaloom
                                                                                        </option>
                                                                                        <option value="20">Rodrigo
                                                                                                Murray
                                                                                        </option>
                                                                                        <option value="21">Lorenzo Meyer
                                                                                        </option>
                                                                                        <option value="22">José Antonio
                                                                                                Crespo
                                                                                        </option>
                                                                                        <option value="23">Sergio Aguayo
                                                                                        </option>
                                                                                        <option value="24">Gaby Pérez
                                                                                                Islas
                                                                                        </option>
                                                                                        <option value="25">Macario
                                                                                                Schettino
                                                                                        </option>
                                                                                        <option value="26">Ilan Katz
                                                                                        </option>
                                                                                        <option value="27">Alan Estrada
                                                                                        </option>
                                                                                        <option value="28">Leticia
                                                                                                Huijara
                                                                                        </option>
                                                                                        <option value="29">Tenoch Huerta
                                                                                        </option>
                                                                                        <option value="30">Naian
                                                                                                González
                                                                                                Norvind</option>
                                                                                </select>
                                                                                <label for="conductorSelect">Selecciona
                                                                                        el
                                                                                        Conductor</label>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>

                <div class="contenido">
                        <div class="input-group p-4 mb-2">
                                <div class="dropdown">
                                        <button id="btn-selector"
                                                class="text-white p-1 d-flex justify-content-center align-items-center btn-dropdown"
                                                data-bs-toggle="dropdown">
                                                --------
                                        </button>

                                        <ul class="dropdown-menu menu-fondo">
                                                <li class="dropdown-submenu categoria">
                                                        <a class="dropdown-item text-white menu-fondo"
                                                                href="#">Categoría</a>
                                                        <ul class="dropdown-menu menu-fondo">
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Series y peliculas"
                                                                                data-categoria="4">Series y películas</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Deportes"
                                                                                data-categoria="6">Deportes</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Música"
                                                                                data-categoria="7">Música</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Ciencia"
                                                                                data-categoria="2">Ciencia</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Cultura"
                                                                                data-categoria="1">Cultura</a></li>
                                                        </ul>
                                                </li>
                                                <li class="dropdown-submenu conductor">
                                                        <a class="dropdown-item text-white menu-fondo"
                                                                href="#">Conductor</a>
                                                        <ul class="dropdown-menu menu-fondo">
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Cristina Pacheco"
                                                                                data-conductor="1">Cristina Pacheco</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Miguel Conde"
                                                                                data-conductor="2">Miguel Conde</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Javier Solórzano"
                                                                                data-conductor="3">Javier Solórzano</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Adriana Pérez Cañedo"
                                                                                data-conductor="4">Adriana Pérez
                                                                                Cañedo</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Ezra Shabot"
                                                                                data-conductor="5">Ezra Shabot</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Fernanda Tapia"
                                                                                data-conductor="6">Fernanda Tapia</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Plutarco Haza"
                                                                                data-conductor="7">Plutarco Haza</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Mario Carballido"
                                                                                data-conductor="8">Mario Carballido</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Max Espejel"
                                                                                data-conductor="9">Max Espejel</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Silvia Lomelí"
                                                                                data-conductor="10">Silvia Lomelí</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Julio Patán"
                                                                                data-conductor="11">Julio Patán</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Irma Pérez Lince"
                                                                                data-conductor="12">Irma Pérez Lince</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Irene Azuela"
                                                                                data-conductor="13">Irene Azuela</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Rubén Zamora"
                                                                                data-conductor="14">Rubén Zamora</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Luis Arrieta"
                                                                                data-conductor="15">Luis Arrieta</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Juan Manuel Bernal"
                                                                                data-conductor="16">Juan Manuel
                                                                                Bernal</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Tulio Triviño"
                                                                                data-conductor="17">Tulio Triviño</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Juan Carlos Bodoque"
                                                                                data-conductor="18">Juan Carlos
                                                                                Bodoque</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Paul Zaloom"
                                                                                data-conductor="19">Paul Zaloom</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Rodrigo Murray"
                                                                                data-conductor="20">Rodrigo Murray</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Lorenzo Meyer"
                                                                                data-conductor="21">Lorenzo Meyer</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="José Antonio Crespo"
                                                                                data-conductor="22">José Antonio
                                                                                Crespo</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Sergio Aguayo"
                                                                                data-conductor="23">Sergio Aguayo</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Gaby Pérez Islas"
                                                                                data-conductor="24">Gaby Pérez Islas</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Macario Schettino"
                                                                                data-conductor="25">Macario
                                                                                Schettino</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Ilan Katz"
                                                                                data-conductor="26">Ilan Katz</a></li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Alan Estrada"
                                                                                data-conductor="27">Alan Estrada</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Leticia Huijara"
                                                                                data-conductor="28">Leticia Huijara</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Tenoch Huerta"
                                                                                data-conductor="29">Tenoch Huerta</a>
                                                                </li>
                                                                <li><a class="dropdown-item text-white" href="#"
                                                                                name="Naian González Norvind"
                                                                                data-conductor="30">Naian González
                                                                                Norvind</a></li>
                                                        </ul>
                                                </li>
                                                <a class="dropdown-item text-white menu-fondo" href="#"
                                                        name="Prog. Nacional"
                                                        data-programacion="Once (Señal Nacional 11.1)">Prog.
                                                        Nacional</a>
                                                <a class="dropdown-item text-white menu-fondo" href="#"
                                                        name="Prog. Infantil"
                                                        data-programacion="Once Niñas y Niños (Señal 11.2)">Prog.
                                                        Infantil</a>
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