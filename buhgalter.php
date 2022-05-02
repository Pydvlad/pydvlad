<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<title>Pydshop:Личный кабинет бухгалтера</title>
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
        <a class="nav-link" href="buhgalter.php">Управление товарами<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="otchet.php">Отчеты<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
<a class="nav-link" href="index.html">Главная</a>
</li>
    </ul>
  </div>
</nav>
<table class='table'>
    <thead>
      <tr>
      <th scope='col'>Номер компьютера</th>
     
        <th scope='col'>Название</th>
        <th scope='col'>Фото</th>
        <th scope='col'>Процессор</th>
        <th scope='col'>Количество ядер</th>
        <th scope='col'>Частота процессора</th>
        
        <th scope='col'>Оперативная память</th>
        <th scope='col'>Видеокарта</th>
        <th scope='col'>Память</th>
        <th scope='col'>Количетство памяти</th>
        <th scope='col'>Операционная система</th>
        <th scope='col'>Цена</th>
        <th scope='col'></th>
        <th scope='col'></th>

        
      </tr>
    </thead>
    <tbody>
<?php 
include("db.php");

$sql = "SELECT * FROM `computers`;"; // вывод всех компов для бухгалтера
 $result = mysqli_query($db, $sql);
 while($myrow= mysqli_fetch_array($result)){
    $id = $myrow["idComp"];
    $name = $myrow["Name"];
    $img = $myrow["img"];
    $processor = $myrow["processor"];
    $pr_yadro = $myrow["pr_yadro"];
    $chastot = $myrow["chastot"];
    $operativ = $myrow["operativ"];
    $videocard = $myrow["videocard"];
    $store = $myrow["store"];
    $kol_store = $myrow["kol_store"];
    $OS = $myrow["OS"];
    $price = $myrow["price"];
    echo"
      <tr>
        <td> $id</td>
        <td> $name</td>
        <td> $img</td>
        <td> $processor</td>
        <td> $pr_yadro</td>
        <td> $chastot</td>
        <td> $operativ</td>
        <td> $videocard</td>
        <td> $store</td>
        <td> $kol_store</td>
        <td> $OS</td>
        <td> $price</td>
        <td><form action='' method='POST'>
        <input type='hidden' name='idComp' value='$id'>
        <button type='submit' name='delComp'>Удалить</button>
    </form>  </td>
        ";
        $query = "SELECT * FROM `computers` WHERE idComp = '$idComp'";
        $res = mysqli_query($db, $query);
         
 }
 echo"<td>  ";
    ?>
    </tr>
     </tbody>
     <form  method="post">
     <tfoot>
     <td> <input type="text" name="id" id=""></td>
    <td> <input type="text" name="name" id=""></td>
    <td> <input type="text" name="img" id=""></td>
    <td> <input type="text" name="processor" id=""></td>
    <td> <input type="text" name="pr_yadro" id=""></td>
    <td> <input type="text" name="chastot" id=""></td>
    <td> <input type="text" name="operativ" id=""></td>
    <td> <input type="text" name="videocard" id=""></td>
    <td> <input type="text" name="store" id=""></td>
    <td> <input type="text" name="kol_store" id=""></td>
    <td> <input type="text" name="OS" id=""></td>
    <td> <input type="text" name="price" id=""></td>
    
    <td><button type="submit" name="sub" class="btn bn-primary">Добавить</button></td>
     </tfoot>
</form>
  </table>
<?php
if(ISSET($_POST['sub'])){ 
    include("db.php");
    $id = $_POST["id"];
    $name = $_POST["name"];
    $img = $_POST["img"];
    $processor = $_POST["processor"];
    $pr_yadro = $_POST["pr_yadro"];
    $chastot = $_POST["chastot"];
    $operativ = $_POST["operativ"];
    $videocard = $_POST["videocard"];
    $store = $_POST["store"];
    $kol_store = $_POST["kol_store"];
    $OS = $_POST["OS"];
    $price = $_POST["price"];

    $query = "INSERT INTO `computers`(`idComp`, `Name`,`img`, `processor`, `pr_yadro`, `chastot`, `operativ`, `videocard`, `store`, `kol_store`, `OS`, `price`) VALUES ('$id', '$name','$img', '$processor', '$pr_yadro', '$chastot', '$operativ', '$videocard','$store', '$kol_store', '$OS', '$price')"; 
    $result = mysqli_query($db, $query);
    if($result == TRUE){
        echo"<script> document.location.href = 'buhgalter.php'</script>";
    }
}
  
?>
<?php
if(ISSET($_POST['delComp'])){ 
    include("db.php");
    $id = $_POST["idComp"];
    $quer = "DELETE FROM `computers` WHERE idComp = '$id'";
    $res=mysqli_query($db, $quer);
}
  
?>

</body>
</html>