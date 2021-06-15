<?php 
    session_start();
    include("connection.php");
    include("functions.php");
    

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
            //save to database
            $user_id = random_num(20);
            $query = "insert into users(user_id, user_name, user_password) VALUES ('$user_id', '$user_name', '$password')";
            
            mysqli_query($con, $query);
            
            header("Location: loginin.php");
            die;
        }else{
            echo "Please enter some valid information!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>
<body>
    <style type="text/css">
#text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 95%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color: black;
            border: none;
            border-radius: 10px;
            position: relative;
            left: 100px;
        }
        #box{
            background-color: Lightgrey;
            margin: auto;
            width: 300px;
            padding: 20px;
            margin-top: 150px;
            border-radius: 20px;
        }
        #titulo{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;            
            font-size: large;
            color: grey;
            padding-bottom: 15px;
        }
    </style>
    <div id="box">
        <form method="post">
            <div id="titulo">SignUp</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Signup"><br><br>
            <a href="loginin.php">Click to Login</a><br><br>
        </form>
    </div>
</body>
</html>