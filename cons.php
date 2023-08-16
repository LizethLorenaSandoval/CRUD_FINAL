<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Consulta</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <!--Formulario-->
    <div class="d-flex justify-content-center">
        <div class="card col-md-8 p-3 mt-5">
            <div class="mb-10">
                <div class="p-3">
                    <form method="POST" class="row g-3" action="cons.php">
                        <div class="text-center mb-3">
                            <h3>Digite la cedula de la persona</h3>
                        </div>
                        <div class="mb-3 col-12">
                            <input type="number" class="form-control" name="busqueda">
                        </div>
                        <div class="text-center d-grid gap-5 col-6 mx-auto">
                            <button value="consultar" name="consultar" type="submit" class="btn btn-secondary">Consultar</button>
                        </div>
                        <div class="text-center d-grid gap-2 col-6 mx-auto">
                            <a class="btn btn-dark" href="index.php" role="button">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php //Consultar registro
    if (isset($_POST['consultar'])) {

        include("conexion.php");

        $busqueda = $_POST['busqueda'];

        if ($busqueda == "") {
            echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                    Digita un numero de cedula >:v
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        } else {

            $sql = ("SELECT * FROM persona WHERE cedula = $busqueda");
            $query = $bd->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            foreach ($results as $result) {

                echo "<div class='d-flex justify-content-center'>
                            <div class='card col-md-8 mt-5'>
                                <div class='mb-10'>
                                    <div class='p-2'>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>ID</th>
                                                    <th scope='col'>Nombre</th>
                                                    <th scope='col'>Apellido</th>
                                                    <th scope='col'>Cedula</th>
                                                    <th scope='col'>Email</th>
                                                    <th scope='col'>Sexo</th>
                                                    <th scope='col'>Fecha</th>
                                                    <th scope='col'>Hora</th>
                                                    <th scope='col'>Registro</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>" . $result->id . "</td>
                                                    <td>" . $result->nombre . "</td>
                                                    <td>" . $result->apellido . "</td>
                                                    <td>" . $result->cedula . "</td>
                                                    <td>" . $result->email . "</td>
                                                    <td>" . $result->sexo . "</td>
                                                    <td>" . $result->fecha . "</td>
                                                    <td>" . $result->hora . "</td>
                                                    <td>" . $result->fecha_registro . "</td>
                                                </tr>
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>    
                        </div>   
                            <div class='alert alert-success alert-dismissible fade show fixed-top' role='alert'>
                                Estos son los resultados de tu busqueda :3
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
            }
        }
    } ?>
</body>
<!--JavaScript--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>