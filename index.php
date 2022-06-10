<?php
require "dbconnect.php";
session_start();
?>
<!-- Test Commit -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunstwerken</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <ul class="topnav">
        <li>
            <?php if(!$_SESSION['username']){
            ?> <a href="login/login.php">Login</a> <?php
            } else {
            ?> <a href="login/out.php">Log out</a> <?php
            } ?>
        </li>
    </ul>
    <div class="container">
        <div>
            <?php

            $query = "SELECT kw.id, kw.naam, kw.omschrijving, kw.jaar, kw.categorie, kw.afbeelding, kw.prijs, AVG(r.rating) AS gemiddelde FROM `kunstwerken` kw LEFT JOIN ratings r ON kw.id = r.id GROUP BY kw.id, kw.naam, kw.omschrijving, kw.jaar, kw.categorie, kw.afbeelding, kw.prijs";
            $result = mysqli_query($db_connect, $query);


            if(mysqli_num_rows($result) > 0){
             echo "<table border='2px'>";
             echo "<tr class='active'>";
             echo "<th>Naam</th><th>Omschrijving</th><th>Jaar</th><th>Categorie</th><th>Afbeelding</th><th>Prijs</th><th>Gemiddeld Rating</th>";
             if($_SESSION['role'] == "admin"){
                 echo "<th>Pas aan</th><th>Verwijder</th><th>Toevoegen</th>";
             }
             if($_SESSION['username']){
                echo "<th>Ratings</th>";
             }
             echo "</tr>";

                while ($item = mysqli_fetch_assoc($result)) {
                    $number =  $item['gemiddelde'];
                    $format_number = number_format($number, 1, '.', '');

                    echo "<tr>";
                    echo "<td>" . $item['naam'] . "</td>";
                    echo "<td>" . $item['omschrijving'] . "</td>";
                    echo "<td>" . $item['jaar'] . "</td>";
                    echo "<td>" . $item['categorie'] . "</td>";
                    echo "<td>"; ?> <img src="img/<?php echo $item['afbeelding']; ?>" height="100" width="100"> <?php echo "</td>";
                    echo "<td>" . $item['prijs'] . "</td>";
                    echo "<td>" . $format_number . "</td>";
                    if($_SESSION['role'] == "admin"){
                        echo "<td>" . "<a href='update/update.php?id=" . $item['id'] . "'>pas aan</a>" . "</td>";
                        echo "<td>" . "<a href='verwijder/verwijder.php?id=" . $item['id'] . "'>verwijder</a>" . "</td>";
                        echo "<td>" . "<a href='toevoegen/toevoegForm.php'>toevoegen</a>" . "</td>";
                    }
                    if($_SESSION['username']){
                        echo "<td><a href='rating/rating.php?id=". $item['id']."'>Geef een cijfer</a></td>";
                    }
                    echo "</tr>";
                }
             echo "</table> <br>";
            }
            ?>
        </div>
    </div>


    <style>
        table, th, td {
            border:1px solid black;
        }

        table {
            width: 75%;
        }
    </style>
</body>
</html>