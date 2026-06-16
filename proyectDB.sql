create database mainDatabase;
use mainDatabase;

CREATE TABLE Rol
(
  id_rol INT NOT NULL AUTO_INCREMENT,
  nombre_rol VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_rol)
);



CREATE TABLE Clasificacion_edad
(
  id_clasificacion INT NOT NULL AUTO_INCREMENT,
  sigla VARCHAR(5) NOT NULL,
  descripcion VARCHAR(150) NOT NULL,
  PRIMARY KEY (id_clasificacion)
);

CREATE TABLE Categoria
(
  id_categoria INT NOT NULL AUTO_INCREMENT,
  nombre_categoria VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_categoria)
);

CREATE TABLE Programa
(
  id_programa INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(200) NOT NULL,
  descripcion TEXT NOT NULL,
  es_nacional BOOLEAN NOT NULL,
  es_infantil BOOLEAN NOT NULL,
  id_clasificacion INT NOT NULL,
  id_categoria INT NOT NULL,
  PRIMARY KEY (id_programa),
  FOREIGN KEY (id_clasificacion) REFERENCES Clasificacion_edad(id_clasificacion),
  FOREIGN KEY (id_categoria) REFERENCES Categoria(id_categoria)
);

CREATE TABLE Conductor
(
  id_conductor INT NOT NULL AUTO_INCREMENT,
  nombres VARCHAR(100) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  biografia TEXT NOT NULL,
  PRIMARY KEY (id_conductor)
);

CREATE TABLE Programa_conductor
(
  id_programa INT NOT NULL,
  id_conductor INT NOT NULL,
  PRIMARY KEY (id_programa, id_conductor),
  FOREIGN KEY (id_programa) REFERENCES Programa(id_programa),
  FOREIGN KEY (id_conductor) REFERENCES Conductor(id_conductor)
);

CREATE TABLE Senal
(
  id_senal INT NOT NULL AUTO_INCREMENT,
  nombre_senal VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_senal)
);

CREATE TABLE Horario
(
  id_horario INT NOT NULL AUTO_INCREMENT,
  fecha_emision DATE NOT NULL,
  hora_inicio TIME NOT NULL,
  hora_fin TIME NOT NULL,
  id_programa INT NOT NULL,
  id_senal INT NOT NULL,
  PRIMARY KEY (id_horario),
  FOREIGN KEY (id_programa) REFERENCES Programa(id_programa),
  FOREIGN KEY (id_senal) REFERENCES Senal(id_senal)
);

-- =========================================
-- INSERTS: TABLAS CATÁLOGO
-- =========================================

-- 1. Roles de usuario
INSERT INTO Rol (nombre_rol) VALUES 
('Comun'),
('Super');

-- 2. Clasificaciones de Edad (Basado en la RTC en México)
INSERT INTO Clasificacion_edad (sigla, descripcion) VALUES 
('A', 'Apto para todo público'),
('AA', 'Apto para todo público, comprensible para niños menores de 7 años'),
('B', 'Para adolescentes de 12 años en adelante'),
('B15', 'Para adolescentes de 15 años en adelante'),
('C', 'Para adultos de 18 años en adelante');

-- 3. Categorías de Programación del Canal Once (Optimizadas a 5)
INSERT INTO Categoria (nombre_categoria) VALUES 
('Noticieros, Cultura e Historia'),
('Documental y Ciencia'),
('Cine, Series y Entretenimiento'),
('Deportes'),
('Música y Conciertos');

-- 4. Señales de Transmisión
INSERT INTO Senal (nombre_senal) VALUES 
('Once (Señal Nacional 11.1)'),
('Once Niñas y Niños (Señal 11.2)'),
('Once Internacional');

TRUNCATE TABLE Usuario;

-- =======================================================
-- 2. POBLAR TABLA PROGRAMAS (30 Registros)
-- Combinando Nacionales, Infantiles, Categorías y Clasificación
-- =======================================================
INSERT INTO Programa (titulo, descripcion, es_nacional, es_infantil, id_clasificacion, id_categoria) VALUES 
('Aquí nos tocó vivir', 'Entrevistas que retratan la vida de la sociedad mexicana.', 1, 0, 1, 2),
('Diálogos en confianza', 'Programa de análisis y debate sobre temas cotidianos, salud y psicología.', 1, 0, 3, 3),
('La ruta del sabor', 'Un recorrido gastronómico por los rincones más deliciosos de México.', 1, 0, 1, 3),
('Bizbirije', 'Programa interactivo para niños donde ellos son los reporteros.', 1, 1, 1, 3),
('El diván de Valentina', 'Serie infantil sobre una niña y su familia que reflexiona sobre la vida.', 1, 1, 1, 3),
('Once Noticias Emisión Estelar', 'El resumen informativo más completo del acontecer nacional e internacional.', 1, 0, 3, 1),
('Factor Ciencia', 'Revista científica tecnológica que explica la ciencia de forma sencilla.', 1, 0, 1, 2),
('Itinerario', 'Recomendaciones culturales, exposiciones, teatro y cine en la ciudad.', 1, 0, 1, 1),
('A la cachi cachi porra', 'Concurso de conocimientos entre estudiantes de preparatoria y vocacional.', 1, 0, 1, 3),
('Paramédicos', 'Serie dramática basada en casos reales de la Cruz Roja Mexicana.', 1, 0, 4, 3),
('XY. La revista', 'Serie sobre la redacción de una revista para hombres y sus problemas.', 1, 0, 4, 3),
('Drenaje Profundo', 'Serie de ciencia ficción y misterio en el subsuelo de la CDMX.', 1, 0, 4, 3),
('Crónica de Castas', 'Serie dramática que aborda el racismo y clasismo en Tepito.', 1, 0, 5, 3),
('Mochila al hombro', 'Turismo de aventura explorando los paisajes de México.', 1, 0, 1, 3),
('Leyenda Urbana', 'Investigación sobre los mitos y leyendas de las calles de México.', 1, 0, 3, 2),
('Futbol Americano ONEFA', 'Transmisión en vivo de los partidos de la liga mayor universitaria.', 1, 0, 1, 4),
('Primer Plano', 'Mesa de análisis político y económico con expertos.', 1, 0, 3, 1),
('Dinero y Poder', 'Análisis profundo de la economía global y finanzas de México.', 1, 0, 3, 1),
('Espiral', 'Debate sobre temas de interés nacional dirigido a universitarios.', 1, 0, 3, 1),
('Cuentos de la calle Broca', 'Animación francesa sobre cuentos clásicos y mágicos.', 0, 1, 1, 3),
('31 Minutos', 'Noticiero chileno conducido por títeres, lleno de humor y música.', 0, 1, 1, 3),
('Beakman', 'Programa educativo estadounidense sobre ciencia para jóvenes.', 0, 1, 1, 2),
('Noche, boleros y son', 'Espacio musical dedicado a los géneros románticos tradicionales.', 1, 0, 1, 5),
('Conversando con Cristina Pacheco', 'Entrevistas a fondo con personalidades del arte y la cultura.', 1, 0, 1, 1),
('Once Niñas y Niños Noticias', 'Noticiero conducido por niños para mantenerlos informados.', 1, 1, 1, 1),
('Mi gran amigo Jorge', 'Serie animada sobre la amistad entre un niño y un perro gigante.', 0, 1, 1, 3),
('Artes', 'Revista televisiva que cubre la escena artística contemporánea.', 1, 0, 1, 1),
('La Aventura del Saber', 'Programa documental sobre la flora y fauna de México.', 1, 0, 1, 2),
('Mundo de Beakman', 'Aventuras científicas en un laboratorio alocado.', 0, 1, 1, 2),
('Cine del Once', 'Emisión de películas de arte nacionales e internacionales.', 0, 0, 4, 3);

-- =======================================================
-- 3. POBLAR TABLA CONDUCTORES (30 Registros)
-- Talentos icónicos de la televisión pública y el Canal Once
-- =======================================================
INSERT INTO Conductor (nombres, apellidos, biografia) VALUES 
('Cristina', 'Pacheco', 'Legendaria periodista, escritora y entrevistadora mexicana.'),
('Miguel', 'Conde', 'Actor y conductor, famoso por recorrer México probando su gastronomía.'),
('Javier', 'Solórzano', 'Reconocido periodista y analista político.'),
('Adriana', 'Pérez Cañedo', 'Conductora titular de noticieros con décadas de experiencia.'),
('Ezra', 'Shabot', 'Analista político y experto en temas de economía y sociedad.'),
('Fernanda', 'Tapia', 'Locutora, productora y conductora de estilo irreverente.'),
('Plutarco', 'Haza', 'Actor de cine y televisión, conductor en Bizbirije.'),
('Mario', 'Carballido', 'Actor y conductor de la primera generación de Bizbirije.'),
('Max', 'Espejel', 'Conductor y reportero del segmento infantil.'),
('Silvia', 'Lomelí', 'Actriz y presentadora de programas infantiles y revistas.'),
('Julio', 'Patán', 'Escritor, periodista y conductor cultural.'),
('Irma', 'Pérez Lince', 'Conductora y periodista de Canal Once.'),
('Irene', 'Azuela', 'Actriz de teatro, cine y televisión (Paramédicos).'),
('Rubén', 'Zamora', 'Actor español radicado en México (Paramédicos).'),
('Luis', 'Arrieta', 'Actor y productor de cine mexicano (Paramédicos).'),
('Juan', 'Manuel Bernal', 'Primer actor de la televisión mexicana (XY).'),
('Tulio', 'Triviño', 'Conductor estrella de 31 Minutos, el noticiero más veraz.'),
('Juan Carlos', 'Bodoque', 'Reportero estrella y ludópata rehabilitado de 31 Minutos.'),
('Paul', 'Zaloom', 'Actor estadounidense famoso por interpretar a Beakman.'),
('Rodrigo', 'Murray', 'Actor y conductor, frecuente en mesas de debate.'),
('Lorenzo', 'Meyer', 'Historiador y académico, analista en Primer Plano.'),
('José', 'Antonio Crespo', 'Analista político y columnista en Primer Plano.'),
('Sergio', 'Aguayo', 'Investigador y promotor de los derechos humanos.'),
('Gaby', 'Pérez Islas', 'Tanatóloga y conductora habitual en Diálogos en confianza.'),
('Macario', 'Schettino', 'Analista económico en Dinero y Poder.'),
('Ilan', 'Katz', 'Músico y presentador de espacios de Son y Bolero.'),
('Alan', 'Estrada', 'Viajero, actor y creador de contenido turístico.'),
('Leticia', 'Huijara', 'Actriz y directora de cine.'),
('Tenoch', 'Huerta', 'Actor internacional y talento de Crónica de Castas.'),
('Naian', 'González Norvind', 'Actriz joven destacada en producciones del Once.');

-- =======================================================
-- 4. POBLAR TABLA PROGRAMA_CONDUCTOR (30 Registros)
-- Asignación lógica de los conductores a sus programas
-- =======================================================
INSERT INTO Programa_Conductor (id_programa, id_conductor) VALUES 
(1, 1),   -- Cristina Pacheco en Aquí nos tocó vivir
(2, 6),   -- Fernanda Tapia en Diálogos en confianza
(2, 24),  -- Gaby Pérez en Diálogos en confianza
(3, 2),   -- Miguel Conde en La ruta del sabor
(4, 7),   -- Plutarco Haza en Bizbirije
(4, 8),   -- Mario Carballido en Bizbirije
(4, 9),   -- Max Espejel en Bizbirije
(6, 4),   -- Adriana Pérez Cañedo en Once Noticias
(6, 3),   -- Javier Solórzano en Once Noticias
(8, 11),  -- Julio Patán en Itinerario
(10, 13), -- Irene Azuela en Paramédicos
(10, 14), -- Rubén Zamora en Paramédicos
(10, 15), -- Luis Arrieta en Paramédicos
(11, 16), -- Juan Manuel Bernal en XY
(13, 29), -- Tenoch Huerta en Crónica de Castas
(17, 21), -- Lorenzo Meyer en Primer Plano
(17, 22), -- José Antonio Crespo en Primer Plano
(17, 23), -- Sergio Aguayo en Primer Plano
(18, 25), -- Macario Schettino en Dinero y Poder
(19, 5),  -- Ezra Shabot en Espiral
(21, 17), -- Tulio Triviño en 31 Minutos
(21, 18), -- Juan Carlos Bodoque en 31 Minutos
(22, 19), -- Paul Zaloom en Beakman
(23, 26), -- Ilan Katz en Noche, Boleros y Son
(24, 1),  -- Cristina Pacheco en Conversando con...
(27, 20), -- Rodrigo Murray en Artes
(12, 28), -- Leticia Huijara en Drenaje Profundo
(9, 10),  -- Silvia Lomelí en A la cachi cachi porra
(14, 27), -- Alan Estrada en Mochila al hombro
(25, 30); -- Naian González en Noticias Niños

-- =======================================================
-- 5. POBLAR TABLA HORARIO (30 Registros)
-- Emulando una programación de 3 días para las distintas señales
-- =======================================================
INSERT INTO Horario (id_programa, id_senal, fecha_emision, hora_inicio, hora_fin) VALUES 
-- Día 1: 2026-06-07 (Domingo) - Señal Nacional (1)
(6, 1, '2026-06-07', '07:00:00', '08:00:00'), -- Once Noticias Matutino
(2, 1, '2026-06-07', '09:00:00', '11:00:00'), -- Diálogos en confianza
(3, 1, '2026-06-07', '13:00:00', '13:30:00'), -- La ruta del sabor
(1, 1, '2026-06-07', '20:00:00', '21:00:00'), -- Aquí nos tocó vivir
(17, 1, '2026-06-07', '21:00:00', '22:30:00'), -- Primer Plano
(30, 1, '2026-06-07', '22:30:00', '00:30:00'), -- Cine del Once
(10, 1, '2026-06-07', '00:30:00', '01:30:00'), -- Paramédicos (Repetición)

-- Día 1: 2026-06-07 (Domingo) - Señal Niñas y Niños (2)
(25, 2, '2026-06-07', '08:00:00', '08:30:00'), -- Noticias Niños
(21, 2, '2026-06-07', '10:00:00', '10:30:00'), -- 31 Minutos
(22, 2, '2026-06-07', '11:00:00', '11:30:00'), -- Beakman
(4, 2, '2026-06-07', '14:00:00', '15:00:00'), -- Bizbirije
(5, 2, '2026-06-07', '16:00:00', '16:30:00'), -- El diván de Valentina
(20, 2, '2026-06-07', '18:00:00', '18:30:00'), -- Cuentos de la calle Broca

-- Día 2: 2026-06-08 (Lunes) - Señal Nacional (1)
(6, 1, '2026-06-08', '07:00:00', '08:00:00'), -- Once Noticias Matutino
(8, 1, '2026-06-08', '11:30:00', '12:00:00'), -- Itinerario
(7, 1, '2026-06-08', '16:30:00', '17:00:00'), -- Factor Ciencia
(23, 1, '2026-06-08', '21:00:00', '22:00:00'), -- Noche, boleros y son
(24, 1, '2026-06-08', '22:00:00', '23:00:00'), -- Conversando con Cristina

-- Día 2: 2026-06-08 (Lunes) - Señal Internacional (3)
(6, 3, '2026-06-08', '12:00:00', '13:00:00'), -- Once Noticias (Horario EU)
(3, 3, '2026-06-08', '15:00:00', '15:30:00'), -- La Ruta del Sabor
(1, 3, '2026-06-08', '18:00:00', '19:00:00'), -- Aquí nos tocó vivir
(14, 3, '2026-06-08', '20:00:00', '21:00:00'), -- Mochila al hombro

-- Día 3: 2026-06-09 (Martes) - Señal Nacional (1)
(6, 1, '2026-06-09', '07:00:00', '08:00:00'), -- Once Noticias
(27, 1, '2026-06-09', '14:00:00', '14:30:00'), -- Artes
(28, 1, '2026-06-09', '16:00:00', '17:00:00'), -- La aventura del saber
(15, 1, '2026-06-09', '20:00:00', '21:00:00'), -- Leyenda Urbana
(11, 1, '2026-06-09', '21:00:00', '22:00:00'), -- XY. La revista
(12, 1, '2026-06-09', '22:00:00', '23:00:00'), -- Drenaje Profundo
(18, 1, '2026-06-09', '23:00:00', '00:00:00'), -- Dinero y Poder
(19, 1, '2026-06-09', '00:00:00', '01:00:00'); -- Espiral

select * from Rol;

select * from Clasificacion_edad;

select * from Categoria;

select * from Senal;

select * from Usuario;

select * from Programa;

select * from Conductor;

select * from Programa_Conductor;

select * from Horario;

-- ============================================================================================
-- sp_CalcularDuracionBloque:
-- Este procedimiento recibe el ID de un bloque de horario específico y calcula 
-- automáticamente cuántos minutos exactos dura la transmisión restando la hora de inicio a la 
-- hora de fin.
-- ============================================================================================

DELIMITER //
CREATE PROCEDURE sp_CalcularDuracionBloque(IN p_id_horario INT)
BEGIN
    SELECT 
        h.id_horario, 
        p.titulo, 
        h.hora_inicio, 
        h.hora_fin, 
        TIMESTAMPDIFF(MINUTE, h.hora_inicio, h.hora_fin) AS duracion_minutos
    FROM Horario h
    JOIN Programa p ON h.id_programa = p.id_programa
    WHERE h.id_horario = p_id_horario;
END //
DELIMITER ;

CALL sp_CalcularDuracionBloque(1);

-- =============================================================================================
-- sp_MinutosAireConductor:
-- Calcula el tiempo total acumulado (en minutos) que un conductor específico estará al aire en
-- toda la programación registrada, además de contar en cuántas emisiones participará. Excelente 
-- para calcular honorarios o exposición en pantalla.
-- =============================================================================================

DELIMITER //
CREATE PROCEDURE sp_MinutosAireConductor(IN p_id_conductor INT)
BEGIN
    SELECT 
        c.nombres, 
        c.apellidos, 
        COUNT(h.id_horario) AS total_emisiones,
        SUM(TIMESTAMPDIFF(MINUTE, h.hora_inicio, h.hora_fin)) AS total_minutos_aire
    FROM Conductor c
    JOIN Programa_Conductor pc ON c.id_conductor = pc.id_conductor
    JOIN Horario h ON pc.id_programa = h.id_programa
    WHERE c.id_conductor = p_id_conductor
    GROUP BY c.id_conductor;
END //
DELIMITER ;

-- Ejecuta esto buscando al conductor 1 (Cristina Pacheco):
CALL sp_MinutosAireConductor(1);

-- =============================================================================================
-- sp_ResumenDiarioSenal:
-- Recibe una fecha y una señal en específico, y calcula un resumen gerencial: cuántos programas
-- se van a emitir en ese día y la suma total de horas de transmisión programadas.
-- =============================================================================================

DELIMITER //
CREATE PROCEDURE sp_ResumenDiarioSenal(IN p_fecha DATE, IN p_id_senal INT)
BEGIN
    SELECT 
        s.nombre_senal, 
        h.fecha_emision,
        COUNT(h.id_programa) AS cantidad_programas,
        SUM(
            IF(h.hora_fin < h.hora_inicio, 
               TIMESTAMPDIFF(MINUTE, h.hora_inicio, h.hora_fin) + 1440, 
               TIMESTAMPDIFF(MINUTE, h.hora_inicio, h.hora_fin))
        ) / 60 AS horas_totales_transmision
    FROM Horario h
    JOIN Senal s ON h.id_senal = s.id_senal
    WHERE h.fecha_emision = p_fecha AND h.id_senal = p_id_senal
    GROUP BY s.id_senal, h.fecha_emision;
END //
DELIMITER ;

-- Buscando el primer día de programación para la Señal Nacional (1):
CALL sp_ResumenDiarioSenal('2026-06-07', 1);

-- =============================================================================================
-- vw_CarteleraPublico:
-- Esta vista está pensada directamente para el "Usuario Común" que visita la página web. Oculta
-- todos los identificadores (IDs) que no le sirven al usuario y muestra una cartelera limpia, 
-- uniendo la información del horario, el nombre del programa, la señal por la que se transmite 
-- y la clasificación de edad.
-- =============================================================================================

drop view vw_cartelerapublico;

CREATE OR REPLACE VIEW vw_CarteleraPublico AS
SELECT 
    p.id_programa,
    p.titulo,
    TIME_FORMAT(h.hora_inicio, '%H:%i') AS hora_inicio,
    TIME_FORMAT(h.hora_fin, '%H:%i') AS hora_fin,
    s.nombre_senal
FROM Horario h
JOIN Programa p ON h.id_programa = p.id_programa
JOIN Senal s ON h.id_senal = s.id_senal
JOIN Clasificacion_edad c ON p.id_clasificacion = c.id_clasificacion;

-- ================================================================================================
-- vw_CatalogoProgramas:
-- Esta vista está pensada para el "Súper Usuario" o administrador. Le permite ver de un solo 
-- vistazo todo el catálogo de producciones del canal, traduciendo las llaves foráneas a texto 
-- legible (mostrando el nombre de la categoría en lugar del número) y transformando los campos 
-- booleanos (0 y 1) en un "Sí" o "No" para saber rápidamente si es producción nacional o infantil.
-- ================================================================================================

CREATE VIEW vw_CatalogoProgramas AS
SELECT 
    p.titulo AS Nombre_Programa,
    cat.nombre_categoria AS Categoria,
    ce.sigla AS Clasificacion,
    IF(p.es_nacional = 1, 'Sí', 'No') AS Es_Nacional,
    IF(p.es_infantil = 1, 'Sí', 'No') AS Es_Infantil
FROM Programa p
JOIN Categoria cat ON p.id_categoria = cat.id_categoria
JOIN Clasificacion_edad ce ON p.id_clasificacion = ce.id_clasificacion;

SELECT * FROM vw_CatalogoProgramas;

-- ================================================================================================
-- vw_ElencoProgramas:
-- Esta vista resuelve visualmente el problema de la relación de Muchos a Muchos. Toma la tabla 
-- puente (Programa_Conductor) y la cruza con las tablas principales para mostrar de forma directa 
-- el título del programa junto al nombre completo de su presentador o presentadores, facilitando 
-- la búsqueda de talentos en el canal.
-- ================================================================================================

CREATE VIEW vw_ElencoProgramas AS
SELECT 
    p.titulo AS Programa,
    CONCAT(c.nombres, ' ', c.apellidos) AS Conductor_Asignado
FROM Programa p
JOIN Programa_Conductor pc ON p.id_programa = pc.id_programa
JOIN Conductor c ON pc.id_conductor = c.id_conductor;

SELECT * FROM vw_ElencoProgramas;

-- ================================================================================================
-- Agregación (COUNT y GROUP BY):
-- Esta consulta cuenta cuántos programas televisivos están registrados dentro de cada categoría 
-- del canal. Nos ayuda a saber qué género domina la parrilla.
-- ================================================================================================

SELECT 
    c.nombre_categoria, 
    COUNT(p.id_programa) AS total_programas 
FROM Categoria c
JOIN Programa p ON c.id_categoria = p.id_categoria
GROUP BY c.nombre_categoria;

-- ================================================================================================
-- Agregación (SUM, COUNT y GROUP BY):
-- Agrupa los programas según su clasificación de edad. Cuenta el total de programas por 
-- clasificación y, usando SUM, suma la bandera lógica es_nacional (que vale 1 o 0) para decirnos 
-- cuántos de esos programas son mexicanos.
-- ================================================================================================

SELECT 
    ce.sigla AS Clasificacion, 
    COUNT(p.id_programa) AS total_programas,
    SUM(p.es_nacional) AS producciones_nacionales
FROM Clasificacion_edad ce
JOIN Programa p ON ce.id_clasificacion = p.id_clasificacion
GROUP BY ce.sigla;

-- ================================================================================================
-- Multitabla (3 tablas) - Filtro de Nacionales:
-- Une las tablas de Programa, Categoria y Clasificacion_edad para mostrar un reporte legible con 
-- el título, género y clasificación, filtrando únicamente los programas que son producción
-- nacional.
-- ================================================================================================

SELECT 
    p.titulo, 
    c.nombre_categoria, 
    ce.sigla 
FROM Programa p
JOIN Categoria c ON p.id_categoria = c.id_categoria
JOIN Clasificacion_edad ce ON p.id_clasificacion = ce.id_clasificacion
WHERE p.es_nacional = 1;

-- ================================================================================================
-- Multitabla (3 tablas) - Cartelera por Fecha:
-- Consulta la tabla transaccional Horario y la cruza con Programa y Senal para extraer la 
-- programación exacta que se emitirá en una fecha específica (el 7 de junio de 2026), ordenando 
-- por hora de inicio.
-- ================================================================================================

SELECT 
    s.nombre_senal, 
    p.titulo, 
    h.hora_inicio 
FROM Horario h
JOIN Programa p ON h.id_programa = p.id_programa
JOIN Senal s ON h.id_senal = s.id_senal
WHERE h.fecha_emision = '2026-06-07'
ORDER BY h.hora_inicio;


-- ================================================================================================
-- Multitabla (3 tablas) - Elenco de Conductores:
-- Extrae el título del programa y los nombres y apellidos de sus respectivos 
-- presentadores. Como es una relación de muchos a muchos, requiere pasar forzosamente por la tabla 
-- puente Programa_Conductor.
-- ================================================================================================

SELECT 
    p.titulo, 
    c.nombres, 
    c.apellidos 
FROM Programa p
JOIN Programa_Conductor pc ON p.id_programa = pc.id_programa
JOIN Conductor c ON pc.id_conductor = c.id_conductor;

-- ================================================================================================
-- BEFORE: Validación de Horarios:
-- Este disparador se ejecutará ANTES (BEFORE) de que un usuario (o el sistema) intente registrar 
-- un nuevo programa en la tabla Horario. Su función es validar la lógica de tiempo: evitará que 
-- alguien por error asigne la misma hora de inicio y de fin a un programa. Si detecta este error, 
-- abortará la inserción y lanzará un mensaje de alerta, protegiendo la integridad de la cartelera.
-- ================================================================================================

DELIMITER //
CREATE TRIGGER trg_BeforeInsertHorario
BEFORE INSERT ON Horario
FOR EACH ROW
BEGIN
    -- Validamos si la hora de inicio y fin son exactamente iguales
    IF NEW.hora_inicio = NEW.hora_fin THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error de validación: La hora de inicio y la hora de fin no pueden ser iguales. Revisa la cartelera.';
    END IF;
END //
DELIMITER ;

-- Resultado erróneo para comprobar que el trigger funciona:
INSERT INTO Horario (id_programa, id_senal, fecha_emision, hora_inicio, hora_fin) 
VALUES (1, 1, '2026-06-10', '14:00:00', '14:00:00');

-- ================================================================================================
-- AFTER: Bitácora de Auditoría:
-- Este disparador se ejecutará DESPUÉS (AFTER) de que el "Súper Usuario" modifique (UPDATE) algún 
-- horario existente en la parrilla. Lo que hará será guardar automáticamente un registro 
-- silencioso en una "Bitácora de Auditoría", anotando qué número de horario se cambió, en qué 
-- fecha y hora exacta se hizo el cambio, y qué usuario de la base de datos lo hizo.
-- ================================================================================================

-- 1. Creamos la tabla que guardará el registro de los cambios
CREATE TABLE Auditoria_Horario (
    id_auditoria INT AUTO_INCREMENT PRIMARY KEY,
    id_horario_modificado INT,
    accion_realizada VARCHAR(100),
    fecha_del_cambio DATETIME,
    usuario_sistema VARCHAR(50)
);

-- 2. Creamos el disparador
DELIMITER //
CREATE TRIGGER trg_AfterUpdateHorario
AFTER UPDATE ON Horario
FOR EACH ROW
BEGIN
    -- Insertamos el registro en la bitácora después de una actualización
    INSERT INTO Auditoria_Horario (id_horario_modificado, accion_realizada, fecha_del_cambio, usuario_sistema)
    VALUES (OLD.id_horario, 'Se modificó la franja de horario', NOW(), CURRENT_USER());
END //
DELIMITER ;

-- 1. El súper usuario actualiza un horario por cambio de programación
UPDATE Horario SET hora_inicio = '06:30:00' WHERE id_horario = 1;

-- 2. Consultamos la bitácora para ver el resultado de nuestro Trigger
SELECT * FROM Auditoria_Horario;

select * from vw_CarteleraPublico;

drop table Usuario;

show tables;

CREATE TABLE usuario_admin
(
  id_usuario INT NOT NULL AUTO_INCREMENT,
  nombre_usuario VARCHAR(100) NOT NULL,
  contrasena_hash VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_usuario),
  UNIQUE (nombre_usuario)
);

truncate usuario_admin;

select * from usuario_admin;

show tables;

select * from conductor;

select * from programa;

SELECT p.id_programa, p.titulo, TIME_FORMAT(h.hora_inicio, '%H:%i') AS hora_inicio, TIME_FORMAT(h.hora_fin, '%H:%i') AS hora_fin
                FROM horario h JOIN programa p ON h.id_programa = p.id_programa 
                WHERE p.id_categoria = 1;
                
SELECT id_programa, titulo, hora_inicio, hora_fin
                FROM vw_CarteleraPublico 
                WHERE Senal = "Once (Señal Nacional 11.1)";
                
select * from vw_cartelerapublico;

select * from senal;

SELECT id_programa, titulo, hora_inicio, hora_fin
FROM vw_CarteleraPublico 
WHERE nombre_senal = "Once (Señal Nacional 11.1)";

select * from conductor;

SELECT p.id_programa, p.titulo, TIME_FORMAT(h.hora_inicio, '%H:%i') AS hora_inicio, TIME_FORMAT(h.hora_fin, '%H:%i') AS hora_fin
                FROM programa_conductor pc
                JOIN conductor c ON pc.id_conductor = c.id_conductor 
                JOIN programa p ON pc.id_programa = p.id_programa 
                JOIN horario h ON h.id_programa = p.id_programa
                WHERE c.id_conductor = 1;

SELECT p.id_programa, p.titulo, TIME_FORMAT(h.hora_inicio, '%H:%i') AS hora_inicio, TIME_FORMAT(h.hora_fin, '%H:%i') AS hora_fin
                FROM horario h JOIN programa p ON h.id_programa = p.id_programa 
                WHERE p.id_categoria = 1;
                
SELECT id_programa, titulo, hora_inicio, hora_fin
                FROM vw_CarteleraPublico 
                WHERE nombre_senal = "Once Niñas y Niños (Señal 11.2)";
                
SELECT p.id_programa, p.titulo, TIME_FORMAT(h.hora_inicio, '%H:%i') AS hora_inicio, TIME_FORMAT(h.hora_fin, '%H:%i') AS hora_fin
                FROM programa_conductor pc
                JOIN conductor c ON pc.id_conductor = c.id_conductor 
                JOIN programa p ON pc.id_programa = p.id_programa 
                JOIN horario h ON h.id_programa = p.id_programa
                WHERE c.id_conductor = 1;
                
SELECT titulo, descripcion FROM programa WHERE id_programa = 1;