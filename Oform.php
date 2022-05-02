<?php
session_start();
?>
<!DOCTYPE html>
<html lang='en'>

<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='icon' type='img/png' sizes='32x32' href='./img/profile/favicon-32x32.png'>
<link rel='stylesheet' href='css/reset.css'>
<link rel='stylesheet' href='assets/css/teams.css'>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    
.activity-tracker__owner {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
    margin-left: 40px;
    padding-bottom: 30px;
    padding-top: 30px;
    margin-top: 50px;
    margin-bottom: 50px;
    
}
.activity-tracker__owner1 {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 110%;
    margin-left: 40px;
    padding-bottom: 30px;
    padding-top: 30px;
    margin-top: 50px;
    margin-bottom: 50px;
}

.activity-tracker__owner:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
    padding: 2px 16px;
   
}
.img {
    width: 80%;
    height: 80%;
    padding-left :60px;
   
}
.body{
     background-color: #808080;
}

.activity-tracker__option {
   
	display: inline-block;	
	box-sizing: border-box;
	padding: 0px 70px;
	margin: 0 15px 15px 190px;
    margin-top: 20px;
	outline: none;
	border: 1px solid #fff;
	border-radius: 50px;
	height: 46px;
	line-height: 46px;
	font-size: 14px;
	font-weight: 600;
	text-decoration: none;
	color: #fff;
	background-color: #c5322d;
	box-shadow: 0 4px 6px rgb(65 132 144 / 10%), 0 1px 3px rgb(0 0 0 / 8%);
	cursor: pointer;
	user-select: none;
	appearance: none;
	touch-action: manipulation;  
	vertical-align: top;
	transition: box-shadow 0.2s;
}
.activity-tracker__option:focus-visible {
	border: 1px solid #4c51f9;
	outline: none;
}
.activity-tracker__option:hover {
	transition: all 0.2s;
	box-shadow: 0 7px 14px rgb(65 132 144 / 10%), 0 3px 6px rgb(0 0 0 / 8%);
}
.activity-tracker__option:active {
	background-color: #808080;
}
.activity-tracker__option:disabled {
	background-color: #eee;
	border-color: #eee;
	color: #444;
	cursor: not-allowed;
}
hr {
    border: none; /* Убираем границу */
    background-color: red; /* Цвет линии */
    color: red; /* Цвет линии  */
    height: 2px; /* Толщина линии */
   }
   .activity-tracker__owner-for
   {
       padding-left: 30px;
   }
   .activity-tracker__owner-name
   {
    padding-left: 27px;
   }
   .activity-tracker__owner-name1
   {
    padding-left: 90px;
    margin-bottom: 40px;
   }
   .lab1
   {
padding-left: 33px;
    
   }
   .lab2
   {
padding-left: 31px;
    
   }
   .lab3
   {
padding-left: 61px;
    
   }
   .lab4
   {
padding-left: 31px;
    
   }
   .lab5
   {
padding-left: 11px;
    
   }
   .activity-tracker__men
   {
margin-top: 220px;

   }
</style>
<title>Pydshop:Оформление покупки</title>
    <link rel="icon" href="img/logo.png" type="image/png">
</head>

<body>

<div class='container'>
<div class='row'>



<?php //вывод из бд инфы о состовляющих компьютера
include("db.php"); 
$idComp = $_POST['idComp'];
$sql = "SELECT * FROM `computers` WHERE idComp = '$idComp';";
$result = mysqli_query($db, $sql);
while($myrow= mysqli_fetch_array($result)){
    $id = $myrow["idComp"];
    $img = $myrow["img"];
    $name = $myrow["Name"];
    $processor = $myrow["processor"];
    $pr_yadro = $myrow["pr_yadro"];
    $chastot = $myrow["chastot"];
    $operativ = $myrow["operativ"];
    $videocard = $myrow["videocard"];
    $store = $myrow["store"];
    $kol_store = $myrow["kol_store"];
    $OS = $myrow["OS"];
    $price = $myrow["price"];
    
    echo"<div class = 'col-sm-12 col-md-4 col-lg-4' >
<section class='activity-tracker__menu'>
<div class='activity-tracker__owner'>
<div class='activity-tracker__owner-container'>
<img src='img/home/$img' class='img' alt='' srcset=''>
<h1 class='activity-tracker__owner-name'>Название: $name</h1>
<p class='activity-tracker__owner-for'>Процессор: $processor</p>
<p class='activity-tracker__owner-for'>Количество ядер: $pr_yadro</p>
<p class='activity-tracker__owner-for'>Частота процессора: $chastot</p>
<p class='activity-tracker__owner-for'>Оперативная память: $operativ</p>
<p class='activity-tracker__owner-for'>Видеокарта: $videocard</p>
<p class='activity-tracker__owner-for'>Память: $store</p>
<p class='activity-tracker__owner-for'>Количество памяти: $kol_store</p>
<p class='activity-tracker__owner-for'>Цена: $price руб</p>
<form method='post'>

</div>
</div>
<div class='activity-tracker__options'>

<input type='hidden' name='idComp' value='".$id."'></form>
</div>
</section>
</section>
</div>
";
};
?>
<div class = 'col-sm-12 col-md-6 col-lg-6' >
<?php //заполнение инфы о клиенте
echo"
<form method='POST'>
<section class='activity-tracker__men'>
<div class='activity-tracker__owner1'>
<img src='./img/profile/image-jeremy.png' alt='' class='activity-tracker__owner-img'>
<div class='activity-tracker__owner-container'>
<h1 class='activity-tracker__owner-name1'>Оформление покупки</h1>
<label for='' class='lab1'>Фамилия</label>
<input type='text' class='labinpt' name='Lastname'/>
<label for='' class='lab4'>Имя</label>
<input type='text' class='labinpt' name='Firstname'/>
<label for='' class='lab2'>Отчество</label>
<input type='text' class='labinpt' name='Fathername'/>
<label for='' class='lab'>Телефон</label>
<input type='text' class='labinpt' name='number'/>
<label for='' class='lab3' >email</label>
<input type='text' class='labinpt' name='email'/>
<label for='' class='lab5'>Адресс</label>
<input type='text' class='labinpt' name='address'/>
</div>
<div class='activity-tracker__options'>
<input type='hidden' name='idComp' value='$id'/>
<button type='submit' formaction='processing.php' class='activity-tracker__option' data-option='monthly'>
Оформить
</button>
</div>
</div>
</section>
</form>";
?>
</div>

</div>
</div>




</div>
</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>