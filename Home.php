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
        <title>Home |</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <form action="./config/Process.php" method="post" class="">
                                <h2 class="navbar-brand" href="#"><?php echo $_GET['user']; ?></h2>
                                <input type="submit" value="logout" class="btn btn-danger" name="logout">
                                <input type="hidden" name="user" value="<?php echo $_GET['user']; ?>">
                                <input type="hidden" name="pass" value="<?php echo $_GET['pass'] ?>">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: ./index.php");
}

?>