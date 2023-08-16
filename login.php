<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Registrate para asisitir al evento</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>

    <!--Formulario-->
    <div class="d-flex justify-content-center">
        <div class="col-md-5 p-3" style="width:100%">
            <div class="mb-10">
                <div class="p-5">
                    <form method="POST" class="row g-3" action="login.php">
                        <div class="text-center">
                            <h1>Registro</h1>
                        </div>
                        <div class="mb-5 col-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-5 col-4">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido">
                        </div>
                        <div class="mb-5 col-4">
                            <label for="cedula">Cedula</label>
                            <input type="number" class="form-control" name="cedula">
                        </div>
                        <div class="mb-5 col-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="mb-5 col-4">
                            <select class="form-select" aria-label="Default select example" name="sexo">
                                <option selected value="Femenino">Femenino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="mb-5 col-4">
                            <select class="form-select" aria-label="Default select example" name="fecha">
                                <option selected value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                            </select>
                        </div>
                        <div class="mb-5 col-4">
                            <select class="form-select" aria-label="Default select example" name="hora">
                                <option selected value="8 AM">8 AM</option>
                                <option value="2 PM">2 PM</option>
                            </select>
                            <input type="hidden" value="<?php echo date("Y-m-d\TH-i"); ?>" name="fecha_registro">
                        </div>
                        <div class="d-grid gap-2 d-md-block">
                            <div class="text-center d-grid gap-2 col-12 mx-auto">
                                <button value="enviar" name="enviar" type="submit" class="btn btn-secondary">Enviar</button>
                            </div>
                        </div>
                        <div class="d-grid gap-2 ">
                            <div class="text-center d-grid gap-2 col-12 mx-auto">
                                <a class="btn btn-dark" href="index.php" role="button">Volver</a>
                            </div>
                        </div>
                    </form>
                    <?php
                    //Validaciones
                    include("conexion.php");
                    if (isset($_POST['enviar'])) {
                        if (
                            empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['cedula'])
                            || empty($_POST['email']) || empty($_POST['sexo']) || empty($_POST['fecha'])
                            || empty($_POST['hora'])
                        ) {

                            echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                            Faltan campos por llenar >:v
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        } else {
                            if ($o - $contadorO > 0 || $d - $contadorD > 0) {
                                //Guardar en la base de datos
                                $nombre = $_POST["nombre"];
                                $apellido = $_POST["apellido"];
                                $cedula = $_POST["cedula"];
                                $email = $_POST["email"];
                                $sexo = $_POST["sexo"];
                                $fecha = $_POST["fecha"];
                                $hora = $_POST["hora"];
                                $fecha_registro = $_POST['fecha_registro'];

                                if ($o - $contadorO <= 0 && $hora === "8 AM") {
                                    echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                                Ya no te puedes registrar para las ocho :'c
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                                } else if ($d - $contadorD <= 0 && $hora === "2 PM") {
                                    echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                                Ya no te puedes registrar para las dos :'c
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                                } else {

                                    $sql = ("SELECT cedula FROM persona WHERE cedula = $cedula");
                                    $query = $bd->prepare($sql);
                                    $query->execute();

                                    if ($query->fetchColumn() > 0) {
                                        echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                                    Esta persona ya se encuentra registrada :'c
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    } else {
                                        $sentencia = $bd->prepare("INSERT INTO persona(nombre,apellido,cedula,
                                        email,sexo,fecha,hora,fecha_registro) VALUES(?,?,?,?,?,?,?,?);");
                                        $resultado = $sentencia->execute([
                                            $nombre, $apellido, $cedula, $email, $sexo,
                                            $fecha, $hora, $fecha_registro
                                        ]);

                                        echo "<div class='alert alert-success alert-dismissible fade show fixed-top' role='alert'>
                                        Te has registrado correctamente :3
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<!--JavaScript--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>