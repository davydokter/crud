<?php
session_start();
require "../dbconnect.php";
if($_SESSION['username'] && $_SESSION['role'] == 'admin'){
    $id = $_GET['id'];

    if ($id != "")
    {
        echo "Verwijder item met ID: " . $id . "<br/>";

        echo "<p>Weet je het zeker? </p>";
        echo "<a href='verwijderVerwerk.php?id={$id}'> JA </a> <br/><br/>";
    }

    else
    {
        echo"Geen ID gevonden... <br/>";
    }
} else {
    header("Location: ../index.php");
}