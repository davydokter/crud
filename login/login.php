<?php
    require '../dbconnect.php';
    session_start();
    $message="";
    if(count($_POST)>0) {
        $query = "SELECT * FROM `users` WHERE `username` = '".$_POST["username"]."' AND `password` = '".$_POST["password"]."'";
        $result = mysqli_query($db_connect, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            echo $row["username"];
            $_SESSION["username"] = $row['username'];
            echo $row["role"];
            $_SESSION["role"] = $row['role'];
            echo $row["id"];
            $_SESSION["id"] = $row['id'];
        } else {
            $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["username"])) {
        header("Location:../index.php");
    }
?>
<html>
<head>
<title>User Login</title>
</head>
    <body>
        <form name="frmUser" method="post" action="" align="center" id="main">
            <div class="message"><?php if($message!="") { echo $message; } ?></div>
                <div class ="input-parent">
                    <h3 align="center">Enter Login Details</h3>
                     Username:<br>
                     <input type="text" name="username">
                     <br>

                     Password:<br>
                    <input type="password" name="password">
                    <br><br>
                    <input type="submit" name="submit" value="Submit">
                </div>
        </form>
    </body>
</html>

<style>

    #main {
        width: max-content;
        margin: 40px auto;
        font-family: "Segoe UI", sans-serif;
        padding: 25px 28px;
        background: greenyellow;
        border-radius: 4px;
        border: 1px solid #302d2d;
        animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    }

    .input-parent {
        display: block;
        margin-bottom: 20px;
    }

    .input-parent input {
        padding: 10px 8px;
        width: 100%;
        font-size: 16px;
        background: #323131;
        border: none;
        color: #c7c7c7;
        border-radius: 4px;
        outline: none;
        transition: all 0.2s ease;
    }

    .input-parent input:hover {
        background: white;
    }
    .input-parent input:focus {
        box-shadow: 0px 0px 0px 1px #0087ff;
    }

    button {
        padding: 10px 18px;
        font-size: 15px;
        background: #1a3969;
        width: 100%;
        border: none;
        border-radius: 4px;
        color: green;
        transition: all 0.2s ease;
    }
    button:hover {
        opacity: 0.9;
    }
    button:focus {
        box-shadow: 0px 0px 0px 3px black;
    }
</style>