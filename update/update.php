<?php
session_start();
require '../dbconnect.php';
if($_SESSION['username'] && $_SESSION['role'] == 'admin'){
$id = $_GET['id'];
$query = "SELECT * FROM `kunstwerken` WHERE id = " . $id;
$result = mysqli_query($db_connect, $query);

$row = mysqli_fetch_array($result);
?>

<form name="updateForm" enctype='multipart/form-data' method="post" action="updateVerwerk.php">
    <table>
        <tr>
            <td>Naam:</td>
            <td>
                <input type="text" name="naamVeld" required value="<?php echo $row["naam"]?>">
                <input type="hidden" name="idVeld"  value="<?php echo $row["id"]?>">
            </td>
        </tr>
        <tr>
            <td>Omschrijving:</td>
            <td><input type="text" name="omschrijvingVeld" required value="<?php echo $row["omschrijving"]?>"></td>
        </tr>
        <tr>
            <td>Jaar:</td>
            <td><input type="number" name="jaarVeld" required value="<?php echo $row["jaar"]?>"/></td>
        </tr>
        <tr>
            <td>Categorie:</td>
            <td><input type="text" name="categorieVeld" required value="<?php echo $row["categorie"]?>"/></td>
        </tr>
        <tr>
            <td>Afbeelding:</td>
            <td><input type="file" name="afbeeldingVeld" required value="<?php echo $row["afbeelding"]?>"/></td>
        </tr>
        <tr>
            <td>Prijs:</td>
            <td><input type="number" name="prijsVeld" required value="<?php echo $row["prijs"]?>"/></td>
        </tr>
        <tr>
            <td class="submitKnop"><input type="submit" name="verzend" value="update"></td>
        </tr>
    </table>
</form> <?php
} else {
    header("Location: ../index.php");
}
