<!DOCTYPE html>
<html>

<head>
    <title>Datos del usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php
      // Iniciar sesión
      session_start();

      // Verificar si el usuario ha iniciado sesión
      if (!isset($_SESSION["usuario"])) {
        header("Location: index.php");
      }

      // Conexión a la base de datos
      $conexion = mysqli_connect("localhost", "root", "", "loguin");

      // Obtener los datos del usuario logueado
      $usuario = $_SESSION["usuario"];
      $query = "SELECT * FROM usuarios WHERE nombre='$usuario'";
      $resultado = mysqli_query($conexion, $query);
      $datos = mysqli_fetch_assoc($resultado);

      // Mostrar los datos del usuario en una tabla de Bootstrap
      echo '
        <table class="table table-bordered">
          <thead class="thead-light">
            <tr>
              <th colspan="2">Datos del usuario</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nombre:</td>
              <td>' . $datos["nombre"] . '</td>
            </tr>
            <tr>
              <td>Correo electrónico:</td>
              <td>' . $datos["correo"] . '</td>
            </tr>
            <tr>
              <td>Fecha de alta:</td>
              <td>' . $datos["fecha_alta"] . '</td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td>' . $datos["estado"] . '</td>
            </tr>
          </tbody>
        </table>
      ';

      // Cerrar la conexión a la base de datos
      mysqli_close($conexion);
    ?>

        <!-- Botón de Cerrar sesión -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#confirmarCerrarSesionModal">
            Cerrar sesión
        </button>

        <!-- Modal de confirmación de Cerrar sesión -->
        <div class="modal fade" id="confirmarCerrarSesionModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmarCerrarSesionModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmarCerrarSesionModalLabel">Confirmar cierre de sesión</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas cerrar sesión?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a href="cerrar_sesion.php" class="btn btn-info">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>