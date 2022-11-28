<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php

        $username = "";
        $password = "";

        $conn = new mysqli('localhost','root','','employee');
        $sql = "SELECT * FROM customer";    
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();

        $check_username = "";
        $check_password = "";

        if(isset($_POST["sign_up"])){
            echo '
                <script>
                window.location.href = "user_sign_up.php";
                </script>';
        }

        if(isset($_POST["log_in"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $check_username = $row["username"];
            $check_password = $row["password"];
            if($check_username == $username){
                if($check_password == $password){
                    echo '
                    <script>
                    alert("Login Successfully");
                    window.location.href = "ordering_application.php";
                    </script>';
                }
                else
                    echo '
                    <script>
                    alert("Password doesnt match with the username");
                    window.location.href = "Login.php";
                    </script>';
            }
            else
            echo '
            <script>
            alert("Username Doesnt Exist");
            window.location.href = "Login.php";
            </script>';
        }

        ?>
        <div class="center_form">
            <img src="https://i.imgur.com/ZamKnxw.png" alt="Casan's Footwear Logo" width="400">
            <div class="subform">
                <form action="" method="post">
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php $username = readline() ;?>"><br>

                    <label for="password">Password:</label>
                    <input type="password" name="password" value="<?php $password = readline();?>"><br>
                    <br>
                    <input name="log_in" type="submit" value="Log In" id="big_button">
                    <hr>
                    <div>
                        <label for="sign_up">Don't have an account?</label>
                        <input name="sign_up" type="submit" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
