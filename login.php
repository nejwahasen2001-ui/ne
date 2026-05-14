<?php
require_once 'config.php';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Username and password are required.';
    } else {
        try {
            $stmt = $pdo->prepare("SELECT password_hash FROM admin_users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $username;
                header('Location: admin.php');
                exit;
            } else {
                $error = 'Invalid username or password.';
            }
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-login-container {
            max-width: 400px;
            margin: 100px auto;
            background: rgba(18, 14, 40, 0.9);
            padding: 30px;
            border-radius: 24px;
            text-align: center;
        }
        .admin-login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 40px;
            border: 1px solid #a88eff;
            background: rgba(255,255,255,0.1);
            color: white;
        }
        .admin-login-container button {
            background: #7a5ac5;
            border: none;
            padding: 10px 20px;
            border-radius: 40px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .error {
            color: #ff8888;
            margin-bottom: 10px;
        }
    </style>
</head>
<body style="background: #0a0a2a;">
    <div class="admin-login-container">
        <h2 style="color: #ffdd99;">Admin Login</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p style="margin-top: 15px; font-size: 12px; color: #ccc;">Default: admin / admin123</p>
    </div>
</body>
</html>