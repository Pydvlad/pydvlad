<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/Oform.css">
<title>Обработка покупки</title>
</head>
<body>

<?php
$idComp = $_POST['idComp']; // Обработка заказа, Внесение заказа и клиента в бд
$Lastname = $_POST['Lastname'];
$Firstname = $_POST['Firstname'];
$Fathername = $_POST['Fathername'];
$number = $_POST['number'];
$email = $_POST['email'];
$address = $_POST['address'];
$date = date("Y-m-d");

include("db.php");
$query = "INSERT INTO `client` (idComp,lastname,firstname,fathername,number,email,address,data) VALUES ('$idComp', '$Lastname', '$Firstname', '$Fathername','$number', '$email','$address', '$date')";
$result = mysqli_query($db, $query);

if($result == TRUE){
echo "
<div class='oformCont'>
<h1>Ваш заказ принят в обработку</h1>
<p>
В ближайшее время наши менеджеры оформят вашу покупку, после чего на ваш номер поступит звонок, с дальнейшим обсуждением всех деталей.
</p>
<p>
Спасибо, что выбирайте именно нас!
</p>
</div>
";
}
else{

}
?>

</body>
</html>
