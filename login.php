<?php
session_start();
$db_host ="localhost";
$db_name ="hyrabil";
$db_user ="root";
$db_pass="test";
try{
    $connect=new PDO("mysql:host=$db_host;dbname=$db_name",$db_user, $db_pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $query= "SELECT * from tblUser WHERE username=:username AND password=:password";

    $statement=$connect->prepare($query);
    $statement->bindValue(':username',$_POST['username']);
    $statement->bindValue(':password',$_POST['password']);

    $statement->execute();
    $count=$statement->rowCount();

    
    
    if($count>0){
        session_regenerate_id();
        $_SESSION["username"] = $_POST["username"];
        header('Location:visaBil.php');
    }
    else{
        echo "Felaktig inloggning";
    }

}
catch(PDOException $error){
    echo $error->getMessage();
}

?>