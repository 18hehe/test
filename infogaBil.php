<meta charset="utf-8">
<link rel="stylesheet" href="bil.css">
<div id="färg">
<header>
    <h1>Bilregistrering</h1>
</header>

<div id="navbar"> 
  <ul> 
      <li><a href=index.php>Hem</a></li> 
      <li><a href="visaBil.php">Visa bilar</a></li> 
      <li><a href=infogaBil.html>Registrera bil</a></li> 
      <li><a href="uppdateraBil.html">Uppdatera bil</a></li> 
      <li><a href="http://github.com">Link 4</a></li> 
  </ul> 
</div> 
</div>
<?php
    
$db_host ="localhost";
$db_name ="hyrabil";
$db_user ="root";
$db_pass="test";
try{
    $connect=new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO tblBil(regnr,marke,arsmodell,timpris)
                    VALUES (:regnr, :marke, :arsmodell, :timpris)";

    $statement=$connect->prepare($query);
    $statement->bindValue(':regnr',$_POST['regnr']);
    $statement->bindValue(':marke',$_POST['marke']);
    $statement->bindValue(':arsmodell',$_POST['arsmodell']);
    $statement->bindValue('timpris',$_POST['timpris']);
    $statement->execute();
    echo '<h1>En bil har nu registrerats</h1>';
}
catch(PDOException $error){
    echo $error->getMessage();
}
?>