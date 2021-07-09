<?php 

$post = $_COOKIE["work"];

$mysql = new mysqli('localhost', 'root', '', 'pract');

$docQuery = $mysql->query("SELECT * FROM `docs` WHERE `posts_name` = '$post' ")->fetch_assoc();
$doc = $docQuery['Doc'];

$testQuery = $mysql->query("SELECT * FROM `tests` WHERE `Doc_Name` = '$doc' ")->fetch_all(MYSQLI_ASSOC) or die("Вам еще не выдан тест! Ожидайте или обратитесь к администрации!");
$idTest = $testQuery[0]['Id'];

$questionsQuery = $mysql->query("SELECT * FROM `question` WHERE `Id_test` = '$idTest'")->fetch_all(MYSQLI_ASSOC) or die("Вопросы не готовы! Обратитесь к администрации");

$quest=Array();
for($i=0;$i< count($questionsQuery);$i++)
{ 
	$nameQuestion = $questionsQuery[$i]['name'];	
	$idQuestion = $questionsQuery[$i]['id'];
	$quest[$i][0] = $nameQuestion;
	$answersQuery = $mysql->query ("SELECT * FROM `answer` WHERE `idQuestion` = '$idQuestion'")->fetch_all(MYSQLI_ASSOC) or die("Не вижу ответов!") ;
	for($j=0;$j< count($answersQuery);$j++)
	{
		$answerForQuestion["name"]=$answersQuery[$j]["name"];
		$answerForQuestion["true"]=$answersQuery[$j]["trueAnswer"];
		$quest[$i][1][] = $answerForQuestion;
	}
}
;
?>
<!DOCTYPE html>
<html>

	<head>

		<title>Test</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/test.css">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />

        
    </head>
    
	<body>
		<div class="wrapper">

			<main class="main">

				<div class="main__header">

                    <div class="main__header_content" id="head"></div>
                    
                </div>
                
				<div class="main__body">
       
					<div class="buttons">

						<div class="buttons__content" id="buttons">

							<button class="button">Начальная кнопка/button><br>
							<button class="button button_wrong">Неправильный ответ</button><br>
							<button class="button button_correct">Правильный ответ</button><br>
                            <button class="button button_passive">Обьчная кнопка</button><br>
                            
                        </div>
                        
					</div>

					<div class="main__footer">

                        <div class="main__footer_content" id="pages">0 / 0</div>
                        
                    </div>
                    
				</div>
				
            </main>
            
        </div>
		<script type="text/javascript">
			var quest = <?php echo json_encode($quest);?>;
		</script>
		<script type="text/javascript" src="js/test.js"></script>
		<script>
		</script>
    </body>
    
</html>