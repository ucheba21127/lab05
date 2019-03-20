<?php ini_set('display_errors','Off'); require_once("includes/connection.php"); ?>
<?php
	
	if(isset($_POST["register"])){
	
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  $full_name= htmlspecialchars($_POST['full_name']);
	$email=htmlspecialchars($_POST['email']);
 $username=htmlspecialchars($_POST['username']);
 $password=htmlspecialchars($_POST['password']);
 $query=mysql_query("SELECT * FROM usertbl WHEREusername='".$username."'");
  $numrows=mysql_num_rows($query);
if($numrows==0)
   {
	$sql="INSERT INTO usertbl
  (full_name, email, username,password)
	VALUES('$full_name','$email', '$username', '$password')";
  $result=mysql_query($sql);
 if($result){
	$message = "Успешно создана учетная запись";
} else {
 $message = "Не удалось вставить данные!";
  }
	} else {
	$message = "Это имя пользователя уже существует! Попробуйте другой!";
   }
	} else {
	$message = "Все поля обязательны для заполнения!";
	}
	}
	?>

<?php if (!empty($message)) {
	echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";
} ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8"> 
 <title> Как с помощью PHP и MySQL создать систему регистрации и авторизации пользователей</title>
<link href="css/style.css" media="screen" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
	</head>
	<body>
<div class="container mregister">
<div id="login">
 <h1>Регистрация</h1>
<form action="register.php" id="registerform" method="post"name="registerform">
 <p><label for="user_login">Полное имя<br>
 <input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
<p><label for="user_pass">E-mail<br>
<input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
<p><label for="user_pass">Имя пользователя<br>
<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
<p><label for="user_pass">Пароль<br>
<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
	  <p class="regtext">Уже зарегистрированы? <a href= "index.php">Введите имя пользователя</a>!</p>
 </form>
</div>
</div>
<footer>
© 2018 Все права защищены.
 </footer>
</body>
</html>