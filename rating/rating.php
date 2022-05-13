<?php
session_start();
require "../dbconnect.php";

if($_SESSION['username']){
    $id = $_REQUEST['id'];
    ?>
    <html>
        <head>
            <title>Rating</title>
        </head>
        <body>
        <div class="login-box">
            <form name="coinFormulier" id="main" method="post" action="ratingVerwerk.php">
                <table background-color="greenyellow">
                    <tr>
                        <td>Rating:</td>
                        <td><input type="number" name="ratingVeld" required min="1" max="5"></td>
                        <input type="hidden" id="idVeld" name="idVeld" value="<?php echo $id ?>">
                    </tr>
                    <tr>
                        <td class="submitKnop"><input type="submit" name="verzend" value="rating"></td>
                    </tr>
                </table>
            </form>
        </body>
        </html> <?php
}
?>


