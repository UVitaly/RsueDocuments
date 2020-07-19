<?php
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$link = mysqli_connect("localhost", "root", "");

if ($link == false){
  echo "Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error();
}

if (mb_strlen($login)<5 || mb_strlen($login)>90)
  {
  echo "Недопустимая длина логина";
  exit;
  }
else if (mb_strlen($name)<3 || mb_strlen($name)>50)
  {
  echo "Недопустимая длина имени";
  exit;
  }
  else if (mb_strlen($pass)<2 || mb_strlen($pass)>6)
    {
    echo "Недопустимая длина пароля(от 2 до 6 символов)";
    exit;
    }
      else if (mb_strlen($email)<2 || mb_strlen($email)>30)
    {
    echo "Недопустимая длина почты(от 2 до 30 символов)";
    exit;
    }

    $pass = md5($pass."glhfalrd34");

$mysql = new mysqli('localhost','root','','pract');
$mysql->query("INSERT INTO `users` ( `login`, `pass`, `name`, `email`) VALUES('$login', '$pass', '$name', '$email')");
header('Location: /');
$mysql->close();
?>
