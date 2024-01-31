<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    include("conexion.php");

    if (!isset($_POST["boton_a"])) {
        $id = $_GET["id"];
        $nombre = $_GET["nom"];
        $apelido = $_GET["ape"];
        $direccion = $_GET["dir"];
    } else {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apelido = $_POST["apellido"];
        $direccion = $_POST["direccion"];

        $sql = "UPDATE visitas_2022_l SET Nombre=:nombreV, Descripcion=:descripcionV, Decanato=:decanatoV WHERE id=:miId";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":nombreV" => $nombre, ":descripcionV" => $descripcion, ":decanatoV" => $direccion, ":miId" => $id));

        header("Location:index.php");
    }


    ?>
    <div id="container">
        <h1>Actualizar</h1>
        <p></p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table>
                <tr>
                    <td><label for="id"></label></td>
                    <td><input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>">
                    </td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td>
                        <input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion ?>">
                    </td>
                </tr>
                <tr>
                    <td>Direccion</td>
                    <td>
                        <input type="text" name="direccion" id="direccion" value="<?php echo $direccion ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Actualizar" name="boton_a"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>