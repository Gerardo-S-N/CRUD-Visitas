<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    include("conexion.php");
    ///Paginación-------------------------------------
    $tam_pag = 6;
    if (isset($_GET["pagina"])) {
        if ($_GET["pagina"] == 1) {
            header("Location:index.php");
        } else {
            $pagina = $_GET["pagina"];
        }

    } else {
        $pagina = 1;
    }

    $empezarDesde = ($pagina - 1) * $tam_pag;
    $sql = "SELECT * FROM VISITAS_2023";

    $resultados = $base->prepare($sql);
    $resultados->execute(array());
    $numReg = $resultados->rowCount();
    $totalPaginas = ceil($numReg / $tam_pag);

    $resultados->closeCursor();
    //-----------------------------------------------
    

    //Consulta
    $registros = $base->query("SELECT * FROM VISITAS_2023 ORDER BY ID LIMIT $empezarDesde, $tam_pag")->fetchAll(PDO::FETCH_OBJ);
    //Si el Submit con nombre B_enviar fue presionado:
    if (isset($_POST["B_enviar"])) {
        //Recuperar Datos pasados por metodo Post
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $decanato = $_POST["decanato"];
        $direccion = $_POST["direccion"];
        //Generar Consulta
        $sql = "INSERT INTO Visitas_2023 (NOMBRE, DESCRIPCION, DECANATO, DIRECCION) VALUES (:nombre, :descripcion, :decanato, :direc)";
        //Preparar consulta
        $resultados = $base->prepare($sql);
        //Ejecutar consulta y al mismo tiempo indicar valores
        $resultados->execute(array(":nombre" => $nombre, ":descripcion" => $descripcion, ":decanato" => $decanato, ":direc" => $direccion));
        //Refrescar la pagina
        header("Location:index.php");

    }
    ?>

    <div id="container">
        <h1>CRUD</h1>
        <p>Create Read Update Delete</p>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <table>
                <tr>
                    <th class="encabezados">Id</th>
                    <th class="encabezados">Nombre</th>
                    <th class="encabezados">Descripcion</th>
                    <th class="encabezados">Decanato</th>
                    <th class="encabezados">Dirección</th>
                    <th class="encabezados">Imágen</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php

                foreach ($registros as $visita):
                    $imagenVisita = '/intranet/uploads/Visitas_2023/' . $visita->IMAGEN;

                    ?>

                    <tr>
                        <td class="celda">
                            <?php echo $visita->ID ?>
                        </td>
                        <td class="celda">
                            <?php echo $visita->NOMBRE ?>
                        </td>
                        <td class="celda">
                            <?php echo $visita->DESCRIPCION ?>
                        </td>
                        <td class="celda">
                            <?php echo $visita->DECANATO ?>
                        </td>
                        <td class="celda">
                            <?php echo $visita->DIRECCION ?>
                        </td>
                        <td class="celda">
                            <img src="<?php echo $imagenVisita ?>" width="100px" alt="">
                        </td>
                        <td><a href="borrar.php?id=<?php echo $visita->ID ?>"><input type="button" value="Borrar"
                                    name="del"></a>
                        </td>
                        <td><a
                                href="editar.php?id=<?php echo $visita->ID ?>&nom=<?php echo $visita->NOMBRE ?>&desc=<?php echo $visita->DESCRIPCION ?>&dir=<?php echo $visita->DIRECCION ?>">
                                <input type="button" value="Actualizar" name="up" id="up"></a></td>
                    </tr>
                    <?php
                endforeach;
                ?>
                <tr>
                    <td></td>
                    <td class="celda"><input type="text" name="nombre" id=""></td>
                    <td class="celda"><input type="text" name="descripcion" id=""></td>
                    <td class="celda"><input type="text" name="decanato" id=""></td>
                    <td class="celda"><input type="text" name="direccion" id=""></td>
                    <td class="celda"><input type="text" name="imagen" id=""></td>
                    <td colspan="" align="center"><input type="submit" value="Enviar" name="B_enviar"></td>
                </tr>
                <tr>
                    <td colspan="6">
                        Página: 
                        <?php
                        //-----------------------Paginación-----------------------
                        
                        for ($x = 1; $x <= $totalPaginas; $x++) {
                            if($x == $pagina){
                                echo " <a href='?pagina=" . $x . "' class='pActual'>" . $x . "</a>";    
                            } else{
                                echo " <a href='?pagina=" . $x . "'>" . $x . "</a>";
                            }
                            
                        }
                        echo "</div>"
                            ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>