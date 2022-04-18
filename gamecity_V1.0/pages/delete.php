<?php 

if (!empty($_GET['id'])) {
    include_once("../connection/connection.php");
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE id = $id";
    $result = $con->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM produtos WHERE id =$id";
        $resultDelete = $con->query($sqlDelete);
    }
}
    header("Location: ../pages/produtos.php");
?>