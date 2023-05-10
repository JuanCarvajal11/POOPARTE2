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
        setTimeout("window.location='../Login.php';", 3000);
    }
</script>

<?php
if(isset($_POST['login'])){
    include_once('DatabaseProces.php');
    $user = $_POST['email'];
    $pass = $_POST['pass'];

    $users = new DatabaseProcess($user,$pass);
    //echo $users->recibir()
    $users->login();

    $response = $users->login();

    if ($response==="verdadero") {
    echo "<font color=\"white\">b</font>";
    echo "<script>";
    echo "validate();";
    echo "go();";
    echo "</script>";
    }

    else{
    echo "<font color=\"white\">b</font>";
    echo "<script>";
    echo "ErrorUSer();";
    echo "goBackUser();";
    echo "</script>";
    }
}