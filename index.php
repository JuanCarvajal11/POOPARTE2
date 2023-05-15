<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap v5.0.0 CDNs -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>LOGIN | </title>
</head>

<body class="bg-dark">
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <div class="col-7 d-none d-lg-block">
                <div class="hero">
                    <div class="bubbles">
                        <img src="images/bubble.png">
                        <img src="images/bubble.png">
                        <img src="images/bubble.png">
                        <img src="images/bubble.png">
                        <img src="images/bubble.png">
                        <img src="images/bubble.png">
                        <img src="images/bubble.png">
                    </div>

                </div>
            </div>
            <div class="col-lg-5 bg-dark d-flex flex-column align-items-end min-vh-100">
                <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                    <h1 class="font-weight-bold mb-4 mt-5">Bienvenido de vuelta</h1>
                    <form class="mb-5" action="./config/Process.php" method="post">
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label font-weight-bold">Email</label>
                            <input type="email" class="form-control bg-dark-x border-0" id="exampleInputEmail1" placeholder="Ingresa tu email" aria-describedby="emailHelp" autocomplete="off" name="email">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña</label>
                            <input type="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu contraseña" id="exampleInputPassword1" autocomplete="off" name="pass">
                            <a href="" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
                        </div>
                        <button type="submit" class="btn btn-info w-100" name="login">Iniciar sesión</button>
                    </form>

                    <p class="font-weight-bold text-center text-muted">O inicia sesión con</p>
                    <div class="d-flex justify-content-around mt-5">
                        <button type="button" class="btn btn-outline-light flex-grow-1 mr-2"><i class="fab fa-google lead mr-2"></i> Google</button>
                        <button type="button" class="btn btn-outline-light flex-grow-1 ml-2"><i class="fab fa-facebook-f lead mr-2"></i> Facebook</button>
                    </div>
                </div>
                <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 mt-auto w-100">
                    <p class="d-inline-block mb-0">¿Todavia no tienes una cuenta?</p> <a href="" class="text-light font-weight-bold text-decoration-none">Crea una ahora</a>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>