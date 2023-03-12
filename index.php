<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <!--JS AVISO ELIMINAR -->


    <script>
        function eliminar(){
            var respuesta=confirm("Estas seguro que quieres eliminar?")
            return respuesta
        }
    </script>
    <h1 class="text-center p-3">Gestor de personas</h1>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_personas.php";
    ?>

    <!--FORMULARIO -->

    <div class="container-fluid row">

        <?php include("form_registro.php");?>


        <!--TABLA -->

        <div class="col-8 p-4">
            <table class="table">
                <thead  class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Fecha DNI</th>
                        <th scope="col">Fecha nacimiendo</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>

                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $conexion->query(" select * from personas ");
                    while($datos=$sql->fetch_object()){ ?>
                        <tr>                        
                        <td><?= $datos->id_personas ?></td>
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos->apellido ?></td>
                        <td><?= $datos->dni ?></td>
                        <td><?= $datos->fecha_nac ?></td>
                        <td><?= $datos->correo ?></td>


                        <td>
                            <a href="modificar_personas.php?id=<?= $datos->id_personas?>" class="fs-4">📝</a>
                            <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_personas?>" class="fs-4">🗑️</a>
                        </td>
                    </tr>
                    <?php }
                    ?>
                                        
                   
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>