<?php
session_start();
require_once "config.php"; // Sertakan file konfigurasi koneksi ke database

// Proses form jika ada pengiriman data POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai yang dikirimkan dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validasi sederhana
    if ($password !== $confirm_password) {
        $error = "Passwords do not match";
    } else {
        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk memasukkan data pengguna baru ke database
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            // Jika registrasi berhasil, redirect ke halaman login
            header('Location: login.php');
            exit;
        } else {
            $error = "Oops! Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <a href="login.php" class="back-arrow">&larr;</a>
            <h1>Sign Up</h1>
            <p>Enter your details below to create your <a href="#">account</a> and <a href="#">get started</a>.</p>
        </div>
        <div class="right-section">
            <?php if (isset($error)): ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php endif; ?>
            <form class="signup-form" action="signup.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <span class="icon"><i class="bi bi-person"></i></span>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <span class="icon"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <span class="icon"><i class="bi bi-file-lock"></i></span>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="confirm-password">Confirm Password</label>
                    <div class="input-wrapper">
                        <span class="icon"><i class="bi bi-file-lock"></i></span>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                    </div>
                </div>
                <button type="submit" class="btn-signup">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
