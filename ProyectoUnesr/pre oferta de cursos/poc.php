<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preoferta de cursos</title>
    <link rel="stylesheet" href="css/diseño-p.css">
    <link rel="stylesheet" type="text/css" href="css/responsive--editado--tablas.css">
</head>

<body>
    <header>
        <div class="container">
            <img src="IMG\Logo_unesr_valera-removebg-preview.png" alt="Imagen de la pantalla del curso" class="logo">
        </div>
        <h1>Preoferta de cursos</h1>
    </header>
    <main>
        <form action="participantes.php" method="POST">
            <div class="container">
                <section class="form-container">
                    <h2>Selecciona un período:</h2>
                    <select class="opcion-periodo" id="carreraSelect">
                        <option value="informatica">Informatica</option>
                        <option value="administracion">administracion</option>
                    </select>
                </section>
                <footer>
                    <div class="container">
                        <a href="agregar_curso.php" target="_blank" class="btn-agregar-curso">Agregar Curso</a>
                    </div>
                </footer>
                <section class="course-list">
                    <h2>Cursos disponibles:</h2>
                    <table class="table-crud" id="cursoTable">
                        <thead>
                            <tr>
                                <th>Código<img src="IMG/icon_creditos.png" class="icon_tabla"></th>
                                <th>Curso<img src="IMG/icon_curso.png" class="icon_tabla"></th>
                                <th>Descripción<img src="IMG/icon_creditos.png" class="icon_tabla"></th>
                                <th>Créditos<img src="IMG/icon_seccion.png" class="icon_tabla"></th>
                                <th>Participantes<img src="IMG/icon_participantes.png" class="icon_tabla"></th>
                            </tr>
                        </thead>

                        <?php
                        // Conectar a la base de datos y obtener los cursos
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "simon_bd";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM cursos";
                        $result = $conn->query($sql);
                        $conn->close();
                        ?>

                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["codigo"] . "</td>";
                                    echo "<td>" . $row["curso"] . "</td>";
                                    echo "<td>" . $row["descripcion"] . "</td>";
                                    echo "<td>" . $row["creditos"] . "</td>";
                                    echo "<td><button type='submit' name='curso' value='" . $row["codigo"] . "' class='icono-tabla'><img src='IMG/klipartz.com.png' alt=''></button></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No se encontraron cursos.</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tbody>
                            <!-- Los cursos se cargarán dinámicamente aquí -->
                        </tbody>
                    </table>
                </section>
            </div>
        </form>
    </main>
    <footer>
        <div class="container">
            <p>Todos los derechos reservados. &copy; 2024</p>
        </div>
    </footer>

    <script>
        document.getElementById("carreraSelect").addEventListener("change", function() {
            var selectedCarrera = this.value;
            getCursos(selectedCarrera);
        });

        function getCursos(carrera) {
            // Realizar una petición AJAX para obtener los cursos de la carrera seleccionada
            // Aquí puedes utilizar el framework o librería de tu elección (por ejemplo, jQuery o fetch)

            // Ejemplo utilizando fetch:
            fetch("obtener_cursos.php?carrera=" + carrera)
                .then(response => response.json())
                .then(data => {
                    // Limpiar la tabla de cursos
                    var cursoTableBody = document.getElementById("cursoTable").getElementsByTagName("tbody")[0];
                    cursoTableBody.innerHTML = "";

                    // Agregar los cursos a la tabla
                    data.forEach(curso => {
                        var row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${curso.codigo}</td>
                            <td>${curso.curso}</td>
                            <td>${curso.descripcion}</td>
                            <td>${curso.creditos}</td>
                            <td><button type="submit" name="curso" value="${curso.codigo}" class="icono-tabla"><img src="IMG/klipartz.com.png" alt=""></button></td>
                        `;
                        cursoTableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error("Error al obtener los cursos:", error);
                });
        }
    </script>
</body>

</html>