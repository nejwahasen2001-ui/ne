<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Nejwa Hasseen · Full‑Stack Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Handlee&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Basic Icons -->
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <!-- Filled Icons -->
    <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet">
    <!-- Brand Icons -->
    <link href="https://cdn.boxicons.com/3.0.8/fonts/brands/boxicons-brands.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <a href="#" class="logo">Home</a>
        <nav>
            <a href="#">Home</a>
            <a href="#about">About</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>
        <div class="user-auth">
            <button type="button" class="login-btn-modal">LOGIN</button>
            <button type="button" class="register-btn-modal">REGISTER</button>
        </div>
        
    </header>  
    <section>
        <h1>Welcome to My Portfolio</h1>
        <?php if (!empty($_GET['registered'])): ?>
            <p class="form-message">Registration successful. Please log in.</p>
        <?php endif; ?>
        <?php if (!empty($_GET['login'])): ?>
            <p class="form-message">Login successful.</p>
        <?php endif; ?>
    </section> 
    <div id="auth-modal" class="auth-modal">
        <span class="close">&times;</span>
        <div class="form-box register">
            <h2>Register</h2>
            <form method="post" action="register.php">
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bx-lock'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <i class='bx bx-lock'></i>
                </div>
                <button class="btn" type="submit">REGISTER</button>
            </form>
        </div>
        <div class="form-box login">
            <h2>Login</h2>
            <form method="post" action="login.php">
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bx-lock'></i>
                </div>
                <button class="btn" type="submit">LOGIN</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>

