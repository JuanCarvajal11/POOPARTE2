<?php
if (!isset($_GET['user']) && !isset($_GET['pass'])) {
    header("Location: ./index.php");
}

if ($_GET['user'] === "admin@gmail.com" && $_GET['pass'] === "123") {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Home |</title>
    </head>

    <body class="bg-dark">
        <div class="row">
            <nav class="navbar navbar-light bg-light justify-content-between">
                <h2 class="navbar-brand font-weight-bold mx-5" href="#">User:<?php echo $_GET['user'];?></h2>
                <form action="./config/Process.php" method="post" class="">
                    <input type="submit" value="logout" class="btn btn-danger" name="logout">
                    <input type="hidden" name="user" value="<?php echo $_GET['user']; ?>">
                    <input type="hidden" name="pass" value="<?php echo $_GET['pass'] ?>">
                </form>
            </nav>
        </div>
        <div class="row">
            <div class="mx-auto">
                <h1 class="font-weight-bold ml-5 mt-5">Registre su portatil!</h1>
            </div>
            <div class="col-lg-6 bg-dark d-flex flex-column align-items-center min-vh-100">
                <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                    <form class="mb-5" action="./config/Process.php" method="post">
                        <div class="mb-4">
                            <label for="marca" class="form-label font-weight-bold">Marca</label>
                            <input type="text" class="form-control bg-dark-x border-0" maxlength="50" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="marca" placeholder="Ingrese la marca" autocomplete="off" name="marca">
                        </div>
                        <div class="mb-4">
                            <label for="nombre" class="form-label font-weight-bold">Nombre</label>
                            <input type="text" class="form-control bg-dark-x border-0 mb-2" maxlength="50" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Ingresa el nombre" id="nombre" autocomplete="off" name="nombre">
                        </div>
                        <div class="mb-4">
                            <label for="referencia" class="form-label font-weight-bold">Referencia</label>
                            <input type="text" class="form-control bg-dark-x border-0 mb-2" maxlength="50" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Ingresa la referencia" id="referencia" autocomplete="off" name="referencia">
                        </div>
                        <div class="mb-4">
                            <label for="peso" class="form-label font-weight-bold">Peso</label>
                            <input type="number" class="form-control bg-dark-x border-0 mb-2" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Ingresa el precio" id="peso" autocomplete="off" name="peso">
                        </div>
                        <div class="mb-4">
                            <label for="so" class="form-label font-weight-bold">Sistema Operativo</label>
                            <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa el sistema operativo" id="so" autocomplete="off" name="so">
                        </div>
                        <div class="mb-4">
                            <label for="procesador" class="form-label font-weight-bold">Procesador</label>
                            <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa el procesador" id="procesador" autocomplete="off" name="procesador">
                        </div>
                        <div class="mb-4">
                            <label for="grafica" class="form-label font-weight-bold">Tarjeta Grafica</label>
                            <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Tarjeta Grafica" id="grafica" autocomplete="off" name="grafica">
                        </div>
                        <div class="mb-4">
                            <label for="ram" class="form-label font-weight-bold">Memoria Ram</label>
                            <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingrese la Ram" id="ram" autocomplete="off" name="ram">
                        </div>
                </div>
            </div>
            <div class="col-lg-6 bg-dark d-flex flex-column align-items-center min-vh-100">
                <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                    <div class="mb-4">
                        <label for="almacenamiento" class="form-label font-weight-bold">Almacenamiento</label>
                        <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingrese el almacenamiento" id="ram" autocomplete="off" name="almacenamiento">
                    </div>
                    <div class="mb-4">
                        <label for="expacion" class="form-label font-weight-bold">Expancion</label>
                        <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingrese tipo de espacios de expancion" id="expacion" autocomplete="off" name="expacion">
                    </div>
                    <div class="mb-4">
                        <label for="pantalla" class="form-label font-weight-bold">Pantalla</label>
                        <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Caracteristicas Pantalla" id="pantalla" autocomplete="off" name="pantalla">
                    </div>
                    <div class="mb-4">
                        <label for="camara" class="form-label font-weight-bold">Camara</label>
                        <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Caracteristicas Camara" id="Camara" autocomplete="off" name="camara">
                    </div>
                    <div class="mb-4">
                        <label for="color" class="form-label font-weight-bold">Color</label>
                        <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Color" id="Camara" autocomplete="off" name="color">
                    </div>
                    <div class="mb-4">
                        <label for="garantia" class="form-label font-weight-bold">Garantia</label>
                        <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingrese garantia" id="garantia" autocomplete="off" name="garantia">
                    </div>
                    <div class="mb-4">
                        <label for="tecnologias" class="form-label font-weight-bold">Tecnologias</label>
                        <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingrese Tecnologias" id="tecnologias" autocomplete="off" name="tecnologias">
                    </div>
                    <div class="mb-4">
                        <label for="bateria" class="form-label font-weight-bold">Bateria</label>
                        <input type="text" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingrese informacion de la Bateria" id="bateria" autocomplete="off" name="bateria">
                    </div>
                    <button type="submit" class="btn btn-info w-100" name="add">Añadir</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: ./index.php");
}

?>