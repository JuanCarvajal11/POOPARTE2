<?php


include_once('db.php');


class DatabaseProcess extends DatabasePDO
{

    private $user;
    private $pass;

    public function __construct($email, $pass){
        $this->user = $email;
        $this->pass = $pass;
    }

     public function unsetData(){
        unset($this->user);
        unset($this->pass);
        echo '<script>alert("Se han eliminado todos los registros")</script>';
    }

    public function __destruct(){
        unset($this->user);
        unset($this->pass);
        echo '<script>alert("Se han eliminado todos las clases")</script>';
    }

    /*public function recibir(){
        return 'El user es: ' . $this->user . ' Con una contraseña ' . $this->pass;
    }*/


    public function login()
    {
        try {
            # Conexión a MySQL
            // Instantiate database.
            $cnn = $this->conn();

            //Preparamos la consulta sql
            $stmt = $cnn->prepare("SELECT * FROM user WHERE email=:usernameEmail  AND pass=:hash_password");
            $stmt->bindParam("usernameEmail", $this->user, PDO::PARAM_STR);
            $stmt->bindParam("hash_password", $this->pass, PDO::PARAM_STR);
            //Ejecutamos la consulta
            $stmt->execute();
            $count = $stmt->rowCount();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            $mesage = "";
            if ($count) {

                $mesage = "verdadero";
            } else {
                $mesage = "Falso";
            }
        } catch (PDOException $e) {
            echo '<script>';
            echo 'Error()';
            echo '</script>';
        }
        return $mesage;
    }
}
