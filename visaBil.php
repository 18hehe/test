<!doctype html>
<html lang="sv">
  <head>
      <div id="färg">
         <header>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <title>Bilar</title>
            <h1>Alla bilar</h1>
            <link rel="stylesheet" href="bil.css">
    </header>
  </head>
  
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
<body>
    <?php
        session_start();
        if(isset($_SESSION["username"]))
        {
            $db_host ="localhost";
            $db_name ="hyrabil";
            $db_user ="root";
            $db_pass ="test";
            try{
                $connect= new PDO("mysql:host=$db_host;dbname=$db_name",$db_user, $db_pass);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = "SELECT * FROM tblbil";
                $data=$connect->query($sql);
        ?>
        <table>
        <tr style="background-color:#5bc6f0;">
            <td>Registreringsnummer</td>
            <td>Märke</td>
            <td>Årsmodell</td>
            <td>Timpris</td>
        </tr>
            <?php foreach ($data as $car): ?>
                <tr id="tr1">
                    <td> <?= iconv('UTF-8','UTF-8//IGNORE',htmlspecialchars($car['regnr']))?></td>
                    <td><?=utf8_encode($car['marke']);?> </td>
                    <td><?=utf8_encode($car['arsmodell']);?> </td>
                    <td><?=utf8_encode($car['timpris']);?> </td>
                    <br>
                    <div id="redigera">
            <a href="redigeraBil">
            <img src="edit.png" alt="logo"></a>
            
        </div>
                </tr>
            <?php endforeach;?>
        </table>
   
<?php
    }
    catch(PDOException $error){
         $error->getMessage();
    }
}
else{
    header('Location: index.php');
}
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>


</html>