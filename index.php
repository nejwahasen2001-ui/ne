<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Nejwa Hasseen · Full‑Stack Portfolio</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a href="#" class="brand">Portfolio</a>
        <div class="nav-links">
            <a href="#about">About</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
            <div class="user-buttons">
                <button class="login-btn-modal">LOGIN</button>
                <button class="register-btn-modal">REGISTER</button>
                <button id="darkModeToggle">🌙 Dark</button>
            </div>
        </div>
    </header>

    <section class="hero">
        <h1>✨ Welcome to My Galaxy Portfolio ✨</h1>
        <?php if (!empty($_GET['registered'])): ?>
            <p class="form-message">Registration successful. Please log in.</p>
        <?php endif; ?>
        <?php if (!empty($_GET['login'])): ?>
            <p class="form-message">Login successful.</p>
        <?php endif; ?>
    </section>

    <section id="about" class="about-section">
        <h2>About Me</h2>
        <p>I'm a software engineer student at Halic University, and this is my full‑stack website. I built it with HTML, CSS, JavaScript, PHP, and MySQL to showcase my projects and skills.</p>
    </section>

    <section id="projects" class="projects-section">
        <h2>My Projects</h2>
        <div id="projectsContainer" class="projects-grid">
            <p>Loading projects...</p>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <h2>Contact Me</h2>
        <form id="contactForm">
            <div class="input-box">
                <input type="text" id="contactName" placeholder="Your Name" required>
            </div>
            <div class="input-box">
                <input type="email" id="contactEmail" placeholder="Your Email" required>
            </div>
            <div class="input-box">
                <textarea id="contactMessage" placeholder="Your Message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn">Send Message</button>
            <div id="contactResponse" style="margin-top:15px; text-align:center;"></div>
        </form>
    </section>

    <!-- Auth Modal (simplified) -->
    <div id="auth-modal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); background:#1a1638; padding:30px; border-radius:24px; z-index:2000; width:90%; max-width:400px;">
        <span class="close" style="float:right; cursor:pointer; color:white;">&times;</span>
        <div class="form-box register">
            <h2 style="color:white;">Register</h2>
            <form method="post" action="register.php">
                <input type="text" name="username" placeholder="Username" required style="width:100%; margin-bottom:10px; padding:8px;"><br>
                <input type="email" name="email" placeholder="Email" required style="width:100%; margin-bottom:10px; padding:8px;"><br>
                <input type="password" name="password" placeholder="Password" required style="width:100%; margin-bottom:10px; padding:8px;"><br>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required style="width:100%; margin-bottom:10px; padding:8px;"><br>
                <button class="btn" type="submit">REGISTER</button>
            </form>
        </div>
        <div class="form-box login">
            <h2 style="color:white;">Login</h2>
            <form method="post" action="login.php">
                <input type="email" name="email" placeholder="Email" required style="width:100%; margin-bottom:10px; padding:8px;"><br>
                <input type="password" name="password" placeholder="Password" required style="width:100%; margin-bottom:10px; padding:8px;"><br>
                <button class="btn" type="submit">LOGIN</button>
            </form>
        </div>
    </div>

    <!-- External JavaScript -->
    <script src="script.js"></script>
</body>
</html>