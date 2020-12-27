<?php
  $server = mysql_connect('localhost','root',''); 
  $db = mysql_select_db('pract', $server); 
  $query = mysql_query("SELECT * FROM users"); 
  $query2 = mysql_query("SELECT * FROM users"); 
  $pdo = new PDO('mysql:host=localhost;dbname=pract', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">

    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css\admin_style.css" rel="stylesheet">
    <link rel="import" href="question.html">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script type="text/javascript" src="/js/createQuest.js"></script>
    <title>Admin</title>

    </head>

    <body>
   
        <div class="main">    

                <input type="radio" name="inset" value="" id="tab_1" checked>
                <label for="tab_1">Добавление/редактирование пользователя</label>
            
                <input type="radio" name="inset" value="" id="tab_2">
                <label for="tab_2">Добавление/редактирование документа</label>
            
                <input type="radio" name="inset" value="" id="tab_3">
                <label for="tab_3">Создание тестирования</label>

                <input type="radio" name="inset" value="" id="tab_4">
                <label for="tab_4">Сведения о тестировании</label>
                
                <input type="submit" formaction="out.php" name="log-out" value="" id="tab_5">
                <label class="log-out"  for="tab_3"><a href="out.php">Выйти</a></label>

                <div id="txt_1" class="users">

                    <div class="users_reg">

                            <form class="reg" action="check.php" method="post">

                                    <input type= "text" class= "form-control" name = "login"
                                    id = "login" placeholder="Логин:"><br>
                        
                                    <input type= "text" class= "form-control" name = "name"
                                    id = "name" placeholder="Имя:"><br>
            
                                    <input type= "text" class= "form-control" name = "last_name"
                                    id = "last_name" placeholder="Фамилия:"><br>
            
                                    <input type= "text" class= "form-control" name = "middle_name"
                                    id = "middle_name" placeholder="Отчество:"><br>
                        
                                    <select class= "form-control" name = "posts_name" id = "posts_name">

                                        <option disabled>Должности:</option>
                                        <option value = "Зав.кафедрой">Зав.кафедрой</option>
                                        <option value = "Лаборант">Лаборант</option>
                                        <option value = "Доцент">Доцент</option>
                                        <option value = "Преподаватель">Преподаватель</option>
                                        <option value = "Профессор">Профессор</option>
                                        <option value = "Ст.лаборант">Ст.лаборант</option>
                                        <option value = "Ассистент">Ассистент</option>

                                    </select><br>
                        
                                    <div class="create_password">

                                        <input type= "password" class= "form-control" name = "pass"
                                        id = "pass" placeholder="Пароль:">

                                        <button class="pwrd_generate btn btn-success">Сгенерировать пароль</button>

                                    </div>
                        
                                    <input type= "text" class= "form-control" name = "email"
                                    id = "email" placeholder="Почта:"><br>
                        
                                    <button class="btn btn-success" type = "sumbit">Регистрация</button>
                                    
                            </form>

                    </div>
                    
                    <div class="users_db">

                        <form action="admin.php">

                                <table class="table_users" border="1" name="db" width="100%" cellpadding="5">

                                        <tr>
                                            <td>ID</td>
                                            <td>Name</td>
                                            <td>Last Name</td>
                                            <td>Middle Name</td>
                                            <td>Password</td>
                                            <td>Post</td>
                                            <td>Email</td>
                                        </tr>
            
                                        <?php
                                            while ($row = mysql_fetch_array($query)) {
                                                
                                                echo "<tr>";
                                                echo "<td id='userId'>".$row[id]."</td>";
                                                echo "<td>"."<input type='text' id='$row[id]_db\$name' formmethod='get' name='nameInput' placeholder=$row[name]>"."</td>";
                                                echo "<td>"."<input type='text' id='$row[id]_db\$last_name' formmethod='get' name='lnInput'  placeholder=$row[last_name]>"."</td>";
                                                echo "<td>"."<input type='text' id='$row[id]_db\$middle_name' formmethod='get' name='mnInput'   placeholder=$row[middle_name]>"."</td>";
                                                echo "<td>"."<input type='text' id='$row[id]_db\$pass' formmethod='get' name='passInput'    placeholder=$row[pass]>"."</td>";
                                                echo "<td>"."<input type='text' id='$row[id]_db\$posts_name' formmethod='get' name='pnInput'   placeholder=$row[posts_name]>"."</td>";
                                                echo "<td>"."<input type='text' id='$row[id]_db\$email' formmethod='get' name='emailInput'  placeholder=$row[email]>"."</td>";
                                                echo "</tr>";
                                            }                                           
                                        ?>
                                        
                                </table>   
                                
                                <button class="btn btn-success" type="submit">Оправить изменения</button>


                        </form>    

                    </div>

                </div>  

                <div id="txt_2">

                    <div class="current_docs">

                        <table>

                            <tr>

                                <td>Name</td>
                                <td>Format</td>
                                <td>Source</td>

                            </tr>

                            <?php
                            $path='./Docs';
                            $files = scandir($path);      
                            mb_internal_encoding("UTF-8");
                            $i=0;
                            foreach($files as $file)
                            {           
                                if(!is_dir($path . $file))
                                {
                
                                    $info=pathinfo($file);
                                    $fullpath=iconv('windows-1251', 'utf-8',  $path."/".$info[basename]);
                                    echo "<tr>"."<td>".iconv('windows-1251', 'utf-8',$info[filename])."</td>"."<td>".iconv('windows-1251', 'utf-8',$info[extension])."</td>"."<td>"."<a href=$fullpath dowload>"."Download"."</a>"."</tr>";
                                }
                                $i++;
                            }
                            $i=0;
                            ?>     

                        </table>

                    </div>

                    <form enctype='multipart/form-data' action="send.php" method="POST">

                        <div id="upload-container">

                                <img id="upload-image" src="Images/Dowload.png">

                                <div>
        
                                    <input id="file-input" type="file" name="filename" multiple>
        
                                    <label for="file-input">Выберите файл</label>
        
                                    <span>или перетащите его сюда</span>
        
                                </div>

                        </div>

                        <input id="submit-send-input" type="submit"multiple>

                    </form>

                </div> 
                
                <div id="txt_3">                

                    <form method="post" action="sendTest.php">

                            <div class="crt_test">

                                <div class="crt_test__header">

                                        <div class="crt_test__add">

                                            <img id="crt_quest" onclick="createQuestion()" src="/images/add.png" alt="Добавить">
                                            <label>Добавить вопрос</label>

                                        </div>


                                            <div class="crt_test__quest">
                                            </div>  



                                </div>

                                <div class="other_forms">

                                    <h2>Параметры теста</h2>
                                    <div class="inline">

                                    <div class="other_forms__timing"> 

                                        <p><input type="checkbox" name"timing">Тест на время</p>
                                        <p><input type="range" min="1" max="60" name"timing">Время ( в минутах )</p>
                            
                                    </div>
                                    <div class="other_forms__true_answers">
                            
                                        <p><input type="checkbox" name"someTrueAnswers">Несколько правильных ответов</p>
                            
                                    </div>

                                    </div>

                                </div>

                            </div>


                            

                                <select name="doc[]">

                                <?php 
                                    $i=0;
                                    foreach($files as $file)
                                    {           
                                        if(!is_dir($path . $file))
                                        {
                                        
                                            $info=pathinfo($file);
                                            $filename=iconv('windows-1251', 'utf-8',  $info[filename].".".$info[extension]);
                                            echo "<option value=$filename>".iconv('windows-1251', 'utf-8',$info[filename])."</option>";
                                        }
                                        $i++;
                                    }
                                    $i=0;
                                    ?>

                                </select>

                                <input name="send_test" type= "submit" value="Создать тест">

                        </form>   
                                

                </div>

                <div id="txt_4" class="users">

                    <div class="users_db">

                        <form action="admin.php">

                            <table class="table_users" border="1" name="db" width="100%" cellpadding="5">

                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Middle Name</td>
                                    <td>Post</td>
                                    <td>TestResult</td>
                                </tr>

                                <?php
                                
                                    while ($newRow = mysql_fetch_array($query2)) {
                                        echo "<tr>";
                                        echo "<td id='userId'>".$newRow[id]."</td>";
                                        echo "<td>".$newRow[name]."</td>";
                                        echo "<td>".$newRow[middle_name]."</td>";
                                        echo "<td>".$newRow[posts_name]."</td>";
                                        echo "<td>".$newRow[testResult]."</td>";
                                        echo "</tr>";
                                    }                                           
                                ?>

                            </table>   


                        </form>    
                                
                    </div>

                </div>
                   
        </div>

        <script>    
        
        
        var userInput = document.querySelectorAll("table input");
        Array.apply(null, userInput);
        for(val of userInput)
        {

            val.onchange = function(event)
            {

                var userIdElem = event.currentTarget.parentNode.parentNode.firstChild;
                var collumnName = event.currentTarget.parentNode.parentNode.parentNode.firstChild;
                var userIdElemContent = userIdElem.textContent;
                var collumnNameContent = collumnName.textContent;
                var inputName = String(event.currentTarget.id);
                var inputContent = String(event.currentTarget.textContent);
                inputName = inputName.split("$")[1];

                var secretInput = document.createElement("input");
                secretInput.type="hidden";
                secretInput.value=userIdElemContent;
                secretInput.name="tempInput";
                secretInput.formmethod="get";
                switch(collumnNameContent)
                {
                    case 'Name':
                        <?php mysql_query("UPDATE `users` SET `name` = '$_GET(nameInput)' WHERE id='$_GET(tempInput )'") or die (mysqli_error())?>
                        break;
                    
                    case 'Password':
                        <?php mysql_query("UPDATE users SET pass = '$_GET(passInput)' WHERE id='$_GET(tempInput)' ") or die (mysqli_error())?>
                        break;
                    case 'Post':
                        <?php mysql_query("UPDATE users SET posts_name = '$_GET(pnInput)' WHERE id='$_GET(tempInput)' ") or die (mysqli_error())?>
                        break;
                    case 'Email':
                        <?php mysql_query("UPDATE users SET email = '$_GET(emailInput)' WHERE id='$_GET(tempInput)' ") or die (mysqli_error())?>
                        break;
                    default:
                        break;
                }
                
            }

        }
             
        </script>     

    </body>
    
</html>

