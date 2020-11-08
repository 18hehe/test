<meta charset="utf-8">
<div id="färg">
<link rel="stylesheet" href="bil.css">
<header>
    <h1>Uppdatering av bils pris</h1>
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
    $db_pass ="test";
    try{
        $connect=new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query="UPDATE tblbil set timpris=:timpris WHERE regnr=:regnr";
        $statement=$connect->prepare($query);
        $statement->bindValue(':regnr'  ,$_POST['regnr']);
        $statement->bindValue(':timpris',$_POST['timpris']);
        $statement->execute();
        echo $statement->rowCount(). ' bils pris har uppdaterats';
    }
    catch(PDOException $error){
        $error->getMessage();
    }



?>