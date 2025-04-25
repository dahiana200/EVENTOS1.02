<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
</head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="dibujo.png" id="icon" alt="USUARIO" />
            </div>
            <h2>Iniciar sesión</h2>
            <form method="POST" action="loguin.php">
                <label>Nombre de usuario:</label><br>
                <input class="fadeIn second type=" text" name="usuario"><br>
                <label>Contraseña:</label><br>
                <input class="fadeIn third" type="password" name="contrasena"><br><br>
                <input class="fadeIn fourth" type="submit" value="Iniciar sesión">
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Olvido su Contraseña</a>
            </div>

        </div>
    </div>
</body>

</html>