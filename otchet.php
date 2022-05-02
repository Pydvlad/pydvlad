<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Отчеты</title>
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="buhgalter.php#">Панель администрирования</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
<li class="nav-item ">
<a class="nav-link" href="buhgalter.php">Управление товарами</a>
</li>
<li class="nav-item active">
<a class="nav-link" href="otchet.php">Отчеты</a>
</li>
<li class="nav-item active">
<a class="nav-link" href="index.html">Главная</a>
</li>

</ul>
</div>
</nav>


<?php
include("db.php");
echo"<div class='row about'>
<div class='col-lg-4 col-md-4 col-sm-12'>
<form action='' method='post'>
<label for='rb1'>Выбор отчета:</label>
<div class='form-check'>
<input type='radio' class='form-check-input' value='1' id='rb1' name='rb1'>
<label class='form-check-label' for='rb1'>
Рейтинг заказов
</label>
</div>
<button class='btn btn-primary' name='submit' type='submit'> Просмотр</button>
</form>
</div>
</div>";
?>
<?php //Вывод
if(ISSET($_POST['submit'])){ // Отчет по количеству машин(Стоимость количество заказчиков, общая сумма
$n=$_POST['rb1'];
if($n==1){
$sum=0;
$count=0;
$sql = "SELECT computers.Name, computers.price, COUNT(client.ID_client) AS kol, SUM(computers.price) AS summ FROM computers INNER JOIN client ON computers.idComp=client.idComp GROUP by computers.Name, computers.price ORDER BY COUNT(client.ID_client) DESC";
$result = mysqli_query($db,$sql);
echo "<h4> Рейтинг компьютеров</h4>";
echo"<table class='table table-bordered table-sm'>
<tr class='table-primary'><th>Название</th>
<th>Стоимость</th><th>Общее</th><th>На сумму</th>";
while($myrow=mysqli_fetch_array($result)){
$sum+=$myrow["summ"];
$count+=$myrow['kol'];
echo"<tr>";
echo"<td>".$myrow['Name']."</td>";
echo"<td>".$myrow['price']."</td>";
echo"<td>".$myrow['kol']."</td>";
echo"<td>".$myrow['summ']."</td>";
echo"<tr>";
}
echo"<tr>";
echo"<td><td><b>Итог:</b></td><td><b>$count</b></td><td><b>$sum</b></td>";
echo"</tr>";
echo "</table>";
}

}
?>
</body>
</html>