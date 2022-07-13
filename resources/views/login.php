<?php
 
 define('USER', 'root');
 define('PASSWORD', '');
 define('HOST', 'localhost');
 define('DATABASE', 'dulceria_online');
  
 try {
     $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
 } catch (PDOException $e) {
     exit("Error: " . $e->getMessage());
 }
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<script type="text/javascript">
            alert("Correo y contraseña incorrecto");
          </script>';
           include "l.html";
    } else {
        if (password_verify($password , $result['password'])) {
            $_SESSION['user_id'] = $result['username'];
            header("Location: index.php");
        } else {
            echo '<script type="text/javascript">
            alert("Contraseña Incorrecta");
          </script>';
           include "l.html";
            
        }
    }
}
 
?>