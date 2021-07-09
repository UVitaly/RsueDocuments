<?php
$login = $_POST['question'];

$answers = $_POST['answer'];

$doc = filter_var(trim($_POST['doc'][0]),FILTER_SANITIZE_STRING);;

echo $answers[4];
$trueAnswer = $_POST['trueAnswer'];

$mysql = new mysqli('localhost', 'root', '', 'pract');
$mysql->query("INSERT INTO `tests` ( `Doc_Name`) VALUES('$doc')");
$id= $mysql->query("SELECT `Id` FROM `tests` WHERE `Doc_Name` = '$doc'")->fetch_assoc() or die(mysqli_error($mysql));
$j=0;
for($i=0;$i<count($login);$i++)
{    
    echo $login[$i];
    $mysql->query("INSERT INTO `question` ( `name`,`Id_test`) VALUES('$login[$i]','$id[Id]')");

    $idQuestion = $mysql->insert_id;     
    while(true)
    {        
        if($answers[$j]=="endAnswers")
        {
            $j++;  
            break;
        }
        $mysql->query("INSERT INTO `answer` ( `idQuestion`,`name`,`trueAnswer`) VALUES('$idQuestion','$answers[$j]','$trueAnswer[$j]')") or die(mysqli_error($mysql));
        $j++;              
    }
        
}
?>