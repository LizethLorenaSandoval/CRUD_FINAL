<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <?php
    function nav()
    { ?>
        <!--Navbar-->
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="list.php">Lista</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">Registo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="cons.php">Consultar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="sing.php">Iniciar sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

</body>
<footer class="container-fluid bg-dark fixed-bottom">
    <div class="row">
        <div class="col-md text-light text-center py-2">
            <p>YoSoyMeraTesaXD</p>
        </div>
    </div>
</footer>
<?php }
    echo nav(); ?>

</html>