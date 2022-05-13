<?php
session_start();
if($_SESSION['username'] && $_SESSION['role'] == 'admin'){
    require ('../dbconnect.php');
    $id = $_GET['id'];
    echo "Item met ID " . $id . " wordt verwijderd....<br/>";

    $query = "DELETE FROM kunstwerken WHERE id = " . $id;

    $result = mysqli_query($db_connect, $query);

    if (mysqli_num_rows($result) > 0)
    {
        $item = mysqli_fetch_assoc($result);

        echo $item['naam'];
        echo $item['omschrijving'];
        echo $item['jaar'];
        echo $item['categorie'];
        echo $item['prijs'];

        if ($result)
        {
            echo "Het item is verwijderd<br/>";
            echo "<th>Naam</th> ";
            echo "<th>Omschrijving</th>";
            echo "<th>Jaar</th>";
            echo "<th>Categorie</th>";
            echo "<th>Prijs</th>";
        }

        else
        {
            echo "FOUT bij verwijderen<br/>";
            echo $query . "<br/>";
            echo mysqli_error($db_connect);
        }
    }
    echo "<a href='../index.php'>OVERZICHT</a>";
} else {
    header("Location: ../index.php");
}

?>