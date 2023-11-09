<?php
require 'database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Successfully created new user';
        } else {
            $message = 'Sorry, there must have been an issue creating your account';
        }
    } else {
        $message = 'Please fill in both email and password fields.';
    }
}
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
        </form>
    </div>
</body>
</html>
