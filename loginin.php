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
            $query = "select * from users where user_name = '$user_name' limit 1";
            
            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['user_password'] === $password){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;            
                    }
                }                
            }
            echo "Wrong username or password!";
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
    <title>Login</title>
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
            <div id="titulo">Login</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>
            <a href="signup.php">Click to SignUp</a><br><br>
        </form>
    </div>
</body>
</html>