<?php 
require "com/page.php";
$mysql = new mysqli('localhost','root','','pract');
$result = $mysql->query("SELECT `Doc` FROM `docs` WHERE `posts_name` = '$_COOKIE[work]'")->fetch_assoc();
 ?>
<div class="container wrapper">
<?php
if($_COOKIE['user']!='')
{
    echo "<iframe src='Docs/$result[Doc]' width='100%' height='1000px' frameborder='1'>"."</iframe>";
    echo "<form class='center'action='testing.php' method='post'>"."<input class='btn btn-primary startTestButton' name='startTest' value='Начать тестирование'  type = 'submit'>"."</form>";
}  
else
{
    echo "<p class='ta-c'>"."Для доступа к персональным документам необходимо "."<a href='login.html'>"."авторизоваться"."</a>"."</p>";
}  
?>