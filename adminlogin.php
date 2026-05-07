<?php require_once 'config.php';
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin.php');
    exit;
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $stmt = $pdo->prepare("SELECT password_hash FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Invalid credentials';
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Login</title><link rel="stylesheet" href="style.css"></head>
<body>
<div style="max-width:400px; margin:5rem auto; padding:2rem; background:var(--card-bg); border-radius:32px;">
    <h2>Admin Login</h2>
    <?php if($error) echo "<p style='color:red'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required style="width:100%; margin-bottom:1rem;"><br>
        <input type="password" name="password" placeholder="Password" required style="width:100%; margin-bottom:1rem;"><br>
        <button type="submit" class="btn">Login</button>
    </form>
    <p style="margin-top:1rem;">Default: admin / admin123</p>
</div>
</body>
</html>