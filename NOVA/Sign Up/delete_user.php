<?php
include("database.php");
$conn = getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error al eliminar el usuario.";
    }
} else {

    header("Location: index.php");
    exit(); 
}
?>
