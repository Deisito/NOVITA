<?php 
include("database.php");
$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST["id"];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET username=:username, password=:password, email=:email WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    

    if ($stmt->execute()) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error al actualizar los datos.";
    }
} else {

    header("Location: index.php");
    exit(); 
}
?>
