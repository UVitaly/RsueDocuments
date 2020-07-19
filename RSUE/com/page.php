<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;1,700&display=swap" rel="stylesheet"> 
    <title>RSUE Documentation</title>
</head>
<body>
<header>
    <div class="top">
    <img src="/Images/Planet.png" alt="">
    <div class="top_text">
        <p class="first_p">RSUE</p>
        <p class="second_p">Documentation</p>
    </div> 
    <?php
    if($_COOKIE['user']!=''):
    ?>
    <div class="log_reg">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo trim($_COOKIE['user']) ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>  
        <form method="post" action="out.php">
            <input type="button" name="log_out" class="btn btn-secondary " href="#" role="button" id="Exit">       
        </form>        
    </div>  
    <?php
    else:
    ?>
    <div class="log_reg">
        <a href="login.html">Login</a>
        <p>/</p>
        <a href="registration.html">Registration</a>
    </div>  
    <?php
    endif;
    ?>
    </div>
    <div class="nav">
        <ul>
            <li><a href="/index.php">Главная</a></li>
            <li><a href="/docs.php">Документы</a></li>
        </ul>
    </div>
</header>
<div class="container">
</div>
</body>
</html>