<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Inicio</title>
</head>

<body>
    <?php
    include("nav.php");
    include("conexion.php");
    ?>
    <h1 class="text-center">Registrate para asistir al mejor evento de tu vida</h1>
    <h5 class="text-center">Registrate ahora antes de que lo boletos lleguen a 0</h5>
    <div class='d-flex justify-content-center p-5'>
        <table class="table">
            <thead>
                <tr>
                    <th>Boletos disponibles para las 8AM</th>
                    <th>Boletos disponibles para las 2PM</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-active">
                    <td><?php echo $o-$contadorO; ?></td>
                    <td><?php echo $d-$contadorD; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <h5 class="text-center">Si tienes problemas con tu registro, comunicate con
        nuestro administrador cel 1234567890
    </h5>

</body>
<!--JavaScript--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>