<?php
session_start();
if ($_SESSION['username'] && $_SESSION['role'] == "admin"){
        require '../dbconnect.php';
?>
        <html>
        <head>
            <title>Toevoegen</title>
        </head>
        <body>

        <div class="header">
            <nav class="nav-bar">
                <ul class="nav-ul">
                    <li class="nav-li"><a href="../index.php">Home</a></li>
                </ul>
            </nav>
        </div>
        <div class="login-box">
            <form name="coinFormulier" id="main" enctype='multipart/form-data' method="post" action="toevoegVerwerk.php">
                <table background-color="greenyellow">
                    <tr>
                        <td>Naam:</td>
                        <td><input type="text" name="naamVeld" required></td>
                    </tr>
                    <tr>
                        <td>Omschrijving:</td>
                        <td><input type="text" name="omschrijvingVeld" required></td>
                    </tr>
                    <tr>
                        <td>Jaar:</td>
                        <td><input type="number" name="jaarVeld" required/></td>
                    </tr>
                    <tr>
                        <td>Categorie:</td>
                        <td><input type="text" name="categorieVeld" required/></td>
                    </tr>
                    <tr>
                        <td>Afbeelding:</td>
                        <td><input type="file" name="afbeeldingVeld" required/></td>
                    </tr>
                    <tr>
                        <td>Prijs:</td>
                        <td><input type="number" name="prijsVeld" required/></td>
                    </tr>
                    <tr>
                        <td class="submitKnop"><input type="submit" name="verzend" value="Voeg toe aan het overzicht"></td>
                    </tr>
                </table>
            </form>
        </body>
        </html>
        <?php
} else {
    header("Location: ../index.php");
}
?>
