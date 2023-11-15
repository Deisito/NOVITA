<?php
require 'database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
<<<<<<< HEAD
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $conn = getConnection(); 
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Successfully created a new user';
=======
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Successfully created new user';
>>>>>>> 5999d4de75987fb385caa0db98664cd6ebf6d956
        } else {
            $message = 'Sorry, there must have been an issue creating your account';
        }
    } else {
<<<<<<< HEAD
        $message = 'Please fill in all fields (Username, Email, and Password).';
    }
}

$conn = getConnection();

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
=======
        $message = 'Please fill in both email and password fields.';
    }
}
>>>>>>> 5999d4de75987fb385caa0db98664cd6ebf6d956
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="Sign Up" method="post">
            <h1>Sign Up NOVA</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" name="agreement" required> I agree to the Terms & Conditions</label>
            </div>

            <button type="submit" class="btn">Sign Up</button>

            <div class="message">
                <?php if (!empty($message)) : ?>
                    <div class="success-message">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="register-link">
                <p>Already Have an Account? <a href="http://localhost:3000/NOVA/Login/index.php">Login</a></p>
            </div>

            <div>
                <h2>Usuarios Registrados</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <th><a href="update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>
                            <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete" >Eliminar</a></th>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>             
                </table>
            </div>
        </form>
    </div>
</body>
</html>
