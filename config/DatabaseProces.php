<?php


include_once('db.php');


class DatabaseProcess extends DatabasePDO
{

    private $llamardestruct = false;
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

    public function setDestruct(){
        $this->llamardestruct = true;
    }

    public function __destruct(){
        if($this->llamardestruct){
            echo '<script>alert("Se han eliminado todos las clases")</script>';
        }    
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
            $mesage = "";
            if ($count) {
                $mesage = "verdadero";
            } else {
                $mesage = "Falso";
            }
        } catch (PDOException $e) {
            echo '<script>alert("Error en base de datos")</scrip>';
        }
        return $mesage;
    }

    public function getProduct($data)
    {
        try {
            # Conexión a MySQL
            // Instantiate database.
            $cnn = $this->conn();

            //Preparamos la consulta sql
            $stmt = $cnn->prepare("SELECT * FROM productos WHERE referencia=:modelSet");
            $stmt->bindParam("modelSet", $data['referencia'], PDO::PARAM_STR);
            //Ejecutamos la consulta
            $stmt->execute();
            $product = [];
            $count = $stmt->rowCount();
            if ($count) {
                //Recorremos la data obtenida
                foreach($stmt as $pro){
                    //Llenamos la data en el array
                    $product[]=$pro;
                }
            } else {
                $product = [
                    'mesage'=> "falso"
                ];
            }
        } catch (PDOException $e) {
            echo '<script>';
            echo 'Error()';
            echo '</script>';
        }
        return $product;
    }

    public function getAll()
        {
            try {
                
                # Conexión a MySQL
                // Instantiate database.
                $cnn = $this->conn();
                //Preparamos la consulta sql
                $respuesta = $cnn->prepare("select * from productos");
                //Ejecutamos la consulta
                $respuesta->execute();
                //Creamos un array donde almacenaremos la data obtenida
                $allProducts = [];
                //Recorremos la data obtenida
                foreach($respuesta as $res){
                    //Llenamos la data en el array
                    $allProducts[]=$res;
                }
            }
            catch(PDOException $e) {
                echo '<script>';
                echo 'Error()';
                echo'</script>';
            }
            return $allProducts;
        }


    public function insertData($data)
    {
        try {
            $true = true;
            $cnn = $this->conn();

            // set the PDO error mode to exception
            $stmt = $cnn->prepare(
                    "INSERT INTO productos(marca,nombre,referencia,peso,so,procesador,tar_grafica,ram,almacenamiento,expancion,pantalla,camara,color,garantia,tecnologias,bateria,estado)
                    VALUES (:marca,:nombre,:referencia,:peso,:so,:procesador,:tar_grafica,:ram,:almacenamiento,:expancion,:pantalla,:camara,:color,:garantia,:tecnologias,:bateria,:estado)");
            $stmt->bindParam(':marca', $data['marca']);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':referencia', $data['referencia']);
            $stmt->bindParam(':peso', $data['peso']);
            $stmt->bindParam(':so', $data['so']);
            $stmt->bindParam(':procesador', $data['procesador']);
            $stmt->bindParam(':tar_grafica', $data['tar_grafica']);
            $stmt->bindParam(':ram', $data['ram']);
            $stmt->bindParam(':almacenamiento', $data['almacenamiento']);
            $stmt->bindParam(':expancion', $data['expancion']);
            $stmt->bindParam(':pantalla', $data['pantalla']);
            $stmt->bindParam(':camara', $data['camara']);
            $stmt->bindParam(':color', $data['color']);
            $stmt->bindParam(':garantia', $data['garantia']);
            $stmt->bindParam(':tecnologias', $data['tecnologias']);
            $stmt->bindParam(':bateria', $data['bateria']);
            $stmt->bindParam(':estado',$true);
            // use exec() because no results are returned
            $stmt->execute();
        }
        catch(PDOException $e) {
            echo '<script>';
            echo 'Error()';
            echo'</script>';
        }
        $cnn = null;
    }
}
