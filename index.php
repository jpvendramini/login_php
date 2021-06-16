<?php
    session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
</head>
<body>
    <style>
        *{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            color: white;    
            box-sizing: border-box;       
        }
        body{
            background-color: lightgrey;
        }
        #container{            
            width: 900px;
            height: 100px;
            margin: auto;          
            background-color: darkgrey;     
            border-radius: 10px;       
        }
        #barraPrincipal > h1{
            position: relative;
            top: 25px;
            padding-left: 30px;            
        }
        .elementosBarra{            
            position: relative;
            padding-right: 20px;
            padding-top: 10px;
            right: -750px;
            top: -50px;
        }
        .artigo{      
            position: relative;   
            top: -10px;   
            width: 300px;
            height: 300px;
            background-color: darkgrey;
            float: left;            
            border-radius: 20px;
        }
        .containerArtigos{
            position: absolute;
        }
    </style>
    <div id="container">
        <div id="barraPrincipal">
            <h1>My PHP page ;)</h1>
            <div class="elementosBarra">
                <a href="logout.php">Logout</a>
                <br>
                <p>Hello, <?php echo $user_data['user_name'];?>!</p>
            </div>

        </div>
        <div class="containerArtigos">
            <div class="artigo"></div>
            <div class="artigo"></div>
            <div class="artigo"></div>
        </div>
    </div>
    <footer>

    </footer>
</body>
</html>