<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script language="JavaScript">
    function validate() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-center',
            showConfirmButton: false,
            timer: 3000,
            color: '#000000',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Datos Validados Correctamente'
        })
    }

    function deteteService() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-center',
            showConfirmButton: false,
            timer: 3000,
            color: '#000000',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Servicio eliminado corrrectamente'
        })
    }

    function Error() {
        Swal.fire({
            icon: 'error',
            title: 'Lo siento...',
            text: 'No es posible generar este servicio, puede ser que ya sea uno existente',
            showConfirmButton: false
        })
    }

    function ErrorUSer() {
        Swal.fire({
            icon: 'error',
            title: 'Lo siento...',
            text: 'No es posible ingresar al sistema',
            showConfirmButton: false
        })
    }

    function errorService() {
        Swal.fire({
            icon: 'error',
            title: 'Lo siento...',
            text: 'No es posible eliminar este servicio',
            showConfirmButton: false
        })
    }

    function go() {


        setTimeout("window.location='../Home.php';", 3000);
    }

    function goBackUser() {
        setTimeout("window.location='../index.php';", 3000);
    }
</script>

<?php

if (isset($_POST['login'])) {
    include_once('DatabaseProces.php');
    $user = $_POST['email'];
    $pass = $_POST['pass'];

    $users = new DatabaseProcess($user, $pass);
    //echo $users->recibir()
    $users->login();

    $response = $users->login();

    if ($response === "verdadero") {
        header("Location: ../Home.php?user=" . urlencode($user) . "&pass=" . urldecode($pass));
    } else {
        echo "<font color=\"white\">b</font>";
        echo "<script>";
        echo "ErrorUSer();";
        echo "goBackUser();";
        echo "</script>";
        unset($users);
    }

    /*    $users->unsetData($users,$response); */
}


if (isset($_POST['logout'])) {
    include_once('DatabaseProces.php');
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $userr = new DatabaseProcess($user, $pass);
    $userr->unsetData();

    $userr->setDestruct();
    unset($userr);

    $url = "../index.php"; // aqui pones la url
    $tiempo_espera = 1; // Aquí se configura cuántos segundos hasta la actualización.
    // Declaramos la funcion apra la redirección
    header("refresh: $tiempo_espera; url=$url");
}

if (isset($_POST['add'])) {
    include_once('DatabaseProces.php');

    $data = array(

        'marca' => $_POST['marca'],
        'nombre' => $_POST['nombre'],
        'referencia' => $_POST['referencia'],
        'peso' => $_POST['peso'],
        'so' => $_POST['so'],
        'procesador' => $_POST['procesador'],
        'tar_grafica' => $_POST['grafica'],
        'ram' => $_POST['ram'],
        'almacenamiento' => $_POST['almacenamiento'],
        'expancion' => $_POST['expacion'],
        'pantalla' => $_POST['pantalla'],
        'camara' => $_POST['camara'],
        'color' => $_POST['color'],
        'garantia' => $_POST['garantia'],
        'tecnologias' => $_POST['tecnologias'],
        'bateria' => $_POST['bateria']
    );

    $product = new DatabaseProcess("", "");
    $product->getProduct($data);
    $result = $product->getProduct($data);

    if (array_key_exists('mesage', $result)) {
        $product->insertData($data);

        $product->getAll();
        $allproducts = $product->getAll();
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>

        <body class="m-0 vh-100 row justify-content-center align-items-center">
            <div class="col-auto bg-danger-p-5-text-center">
                <button type="button" class="btn btn-primary position-relative" data-bs-toggle="modal" data-bs-target="#InsertData">
                    Verificar
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="InsertData" tabindex="-1" aria-labelledby="exampleModalLabel" style="overflow-y: auto;" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-sm-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hemos decidido agregar este producto!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Consultatlo aqui:</h6>
                            <table class="table">
                                <thead class="ttable table-dark table-striped-columns">
                                    <tr>
                                        <th>ID</th>
                                        <th>Marca</th>
                                        <th>Nombre</th>
                                        <th>Referencia</th>
                                        <th>Peso</th>
                                        <th>OS</th>
                                        <th>Procesador</th>
                                        <th>TarGrafica</th>
                                        <th>Ram</th>
                                        <th>Almacenamiento</th>
                                        <th>Expancion</th>
                                        <th>Pantalla</th>
                                        <th>Camara</th>
                                        <th>Color</th>
                                        <th>Garantia</th>
                                        <th>Tecnologias</th>
                                        <th>Bateria</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allproducts as $value => $key) { ?>
                                        <tr>

                                            <th><?php echo $key['id']; ?></th>
                                            <th><?php echo $key['marca']; ?></th>
                                            <th><?php echo $key['nombre']; ?></th>
                                            <th><?php echo $key['referencia']; ?></th>
                                            <th><?php echo $key['peso']; ?></th>
                                            <th><?php echo $key['so']; ?></th>
                                            <th><?php echo $key['procesador']; ?></th>
                                            <th><?php echo $key['tar_grafica']; ?></th>
                                            <th><?php echo $key['ram']; ?></th>
                                            <th><?php echo $key['almacenamiento']; ?></th>
                                            <th><?php echo $key['expancion']; ?></th>
                                            <th><?php echo $key['pantalla']; ?></th>
                                            <th><?php echo $key['camara']; ?></th>
                                            <th><?php echo $key['color']; ?></th>
                                            <th><?php echo $key['garantia']; ?></th>
                                            <th><?php echo $key['tecnologias']; ?></th>
                                            <th><?php echo $key['bateria']; ?></th>
                                            <th><?php echo $key['estado']; ?></th>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-primary" onclick="history.back()" name="volver atrás" value="Cerrar">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        </body>

        </html>

    <?php
    } else {
    ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>

        <body class="m-0 vh-100 row justify-content-center align-items-center">
            <div class="col-auto bg-danger-p-5-text-center">
                <button type="button" class="btn btn-primary position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Verificar
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Se detecto una referencia ya ingresada!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6></h6>
                            <table class="table">
                                <thead class="ttable table-dark table-striped-columns">
                                    <tr>
                                        <th>ID</th>
                                        <th>Marca</th>
                                        <th>Nombre</th>
                                        <th>Referencia</th>
                                        <th>Peso</th>
                                        <th>OS</th>
                                        <th>Procesador</th>
                                        <th>TarGrafica</th>
                                        <th>Ram</th>
                                        <th>Almacenamiento</th>
                                        <th>Expancion</th>
                                        <th>Pantalla</th>
                                        <th>Camara</th>
                                        <th>Color</th>
                                        <th>Garantia</th>
                                        <th>Tecnologias</th>
                                        <th>Bateria</th>
                                        <th>Estado</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $value => $key) { ?>
                                        <tr>

                                            <th><?php echo $key['id']; ?></th>
                                            <th><?php echo $key['marca']; ?></th>
                                            <th><?php echo $key['nombre']; ?></th>
                                            <th><?php echo $key['referencia']; ?></th>
                                            <th><?php echo $key['peso']; ?></th>
                                            <th><?php echo $key['so']; ?></th>
                                            <th><?php echo $key['procesador']; ?></th>
                                            <th><?php echo $key['tar_grafica']; ?></th>
                                            <th><?php echo $key['ram']; ?></th>
                                            <th><?php echo $key['almacenamiento']; ?></th>
                                            <th><?php echo $key['expancion']; ?></th>
                                            <th><?php echo $key['pantalla']; ?></th>
                                            <th><?php echo $key['camara']; ?></th>
                                            <th><?php echo $key['color']; ?></th>
                                            <th><?php echo $key['garantia']; ?></th>
                                            <th><?php echo $key['tecnologias']; ?></th>
                                            <th><?php echo $key['bateria']; ?></th>
                                            <th><?php echo $key['estado']; ?></th>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-primary" onclick="history.back()" name="volver atrás" value="Cerrar">
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
    }
}
