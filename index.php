<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio - Cursos de Formación</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Explora Nuestros Cursos y Transforma Tu Futuro</h1>
        <!-- Menú de navegación -->
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="inscripcion.php">Inscripción</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="bienvenida">
            <p>Bienvenido a los cursos de formación, donde podrás adquirir nuevos conocimientos y habilidades en diversas áreas. ¡Comienza tu aprendizaje y da el siguiente paso hacia tu desarrollo profesional!</p>
        </section>
        <section class="cursos">
    <h2>Cursos Disponibles</h2>
    <ul>
        <li>
            <h3>Desarrollo Web</h3>
            <p>Aprende a crear sitios web interactivos y modernos con HTML, CSS y JavaScript.</p>
            <a href="descripcion_curso.php?id=1" class="btn-ver-mas">Ver Más</a>
        </li>
        <li>
            <h3>Ingeniería de Software</h3>
            <p>Domina el diseño y desarrollo de software, con enfoques ágiles y metodologías modernas.</p>
            <a href="descripcion_curso.php?id=2" class="btn-ver-mas">Ver Más</a>
        </li>
        <li>
            <h3>Administración de Base de Datos</h3>
            <p>Adquiere habilidades en gestión de bases de datos, SQL y administración de sistemas de información.</p>
            <a href="descripcion_curso.php?id=3" class="btn-ver-mas">Ver Más</a>
        </li>
        <li>
            <h3>Modelado de Sistemas</h3>
            <p>Aprende a modelar sistemas informáticos y soluciones tecnológicas con UML y otras herramientas.</p>
            <a href="descripcion_curso.php?id=4" class="btn-ver-mas">Ver Más</a>
        </li>
    </ul>
</section>
        <section class="inscripcion">
            <a href="inscripcion.php" class="btn-inscribirse">Inscríbete Ahora</a>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cursos de Formación. Todos los derechos reservados.</p>
    </footer>
</body>
</html>