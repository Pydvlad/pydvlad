<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<title>Pydshop:Личный кабинет менеджера</title>
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Панель администрирования</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Заказы<span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>

<form action="" method="post">
<input type="text" name="lastnameSearch" value="">
<button type="submit" name="search" class="btn btn-primary">Поиск</button>
<button type="submit" name="all" class="btn btn-primary"> Показать все</button>
</form>
<table class='table'>
    <thead>
      <tr>
        <th scope='col'>Номер заказа</th>
        <th scope='col'>Название компьютера</th>
        <th scope='col'>Стоимость заказа</th>
        <th scope='col'>Фамилия</th>
        <th scope='col'>Имя</th>
        <th scope='col'>Отчество</th>
        <th scope='col'>Дата покупки</th>
        <th scope='col'>Адресс</th>
        <th scope='col'>Телефон</th>
        <th scope='col'>Email</th>
        <th scope='col'>Обработка заказа</th>

        <th></th>
      
      </tr>
    </thead>
    <tbody>
<?php 

if(ISSET($_POST['all'])){
include("db.php");

 $sql = "SELECT * FROM `client`"; // Вывод всех договоров
 $result = mysqli_query($db, $sql);
 while($myrow= mysqli_fetch_array($result)){
    $idclient = $myrow['ID_client'];
    $idComp = $myrow['idComp']; // Обработка заказа, Внесение заказа и клиента в бд
$Lastname = $myrow['lastname'];
$Firstname = $myrow['firstname'];
$Fathername = $myrow['fathername'];
$number = $myrow['number'];
$email = $myrow['email'];
$address = $myrow['address'];
$date = $myrow['data'];
$status = $myrow['status'];

    echo"
      <tr>
        <td>$idclient</td>";
        $query = "SELECT * FROM `computers` WHERE idComp = '$idComp'"; // Вывод всех договоров
        $res = mysqli_query($db, $query);
        while($myrowTwo= mysqli_fetch_array($res)){
            $name = $myrowTwo['Name'];
            $price = $myrowTwo['price'];
            echo"
        <td>$name</td>
        <td>$price</td>";
    }

        echo"
        <td>$Lastname</td>
        <td>$Firstname</td>
        <td>$Fathername</td>
        <td>$date</td>
        <td>$address</td>
        <td>$number </td>
        <td>$email</td>
        <td>";
        if ($status == '1'){
            echo"Заказ отправлен";
        }
        else{
            echo"<form action='' method='POST'>
            <input type='hidden' name='idComp' value='$idComp'>
            <button type='submit' name='otpravTovar'>Отправить товар</button>
        </form> 
           ";
        }
        echo"
        
        </td>
        </tr>
        ";
 };
}

if(ISSET($_POST['search'])){ //Вывод людей по фамилии
    include("db.php");
    $lastSearch = $_POST['lastnameSearch'];
    
 $sqlName = "SELECT * FROM `client` WHERE lastname = '$lastSearch'";
 $resultSearch = mysqli_query($db, $sqlName);
 while($myrow = mysqli_fetch_array($resultSearch)){
    $idclient = $myrow['ID_client'];
    $idComp = $myrow['idComp']; // Обработка заказа, Внесение заказа и клиента в бд
$Lastname = $myrow['lastname'];
$Firstname = $myrow['firstname'];
$Fathername = $myrow['fathername'];
$number = $myrow['number'];
$email = $myrow['email'];
$address = $myrow['address'];
$date = $myrow['data'];

    echo"
      <tr>
        <td>$idclient</td>";
        $q = "SELECT * FROM `computers` WHERE idComp = '$idComp'"; // Вывод всех договоров
        $r = mysqli_query($db, $q);
        while($myrowt= mysqli_fetch_array($r)){
            $name = $myrowt['Name'];
            $price = $myrowt['price'];
            echo"
        <td>$name</td>
        <td>$price</td>";
    }

        echo"
        <td>$Lastname</td>
        <td>$Firstname</td>
        <td>$Fathername</td>
        <td>$date</td>
        <td>$address</td>
        <td>$number </td>
        <td>$email</td>
        <td> </td>
        </tr>
        ";
           
         
 }
 }


  
 
    ?>

<?php
if(ISSET($_POST['otpravTovar'])){
    include('db.php');
    $idCompZak = $_POST['idComp'];
    $quer = "UPDATE `client` SET `status` = '1' WHERE `idComp` = '$idCompZak';";
    $resquer = mysqli_query($db, $quer);
    var_dump($resquer);


}
?>
    
     </tbody>
  </table>
</body>
</html>