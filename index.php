<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Nejwa Hasseen · Full‑Stack Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/brands/boxicons-brands.min.css" rel="stylesheet">
    <style>
        /* ========== FULL CSS EMBEDDED ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        html {
            scroll-behavior: smooth;
        }
        body {
            margin-top: 80px;
            background: #0a0a2a;
            transition: background 0.3s, color 0.3s;
        }
        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px 5%;
            background: rgba(134, 46, 139, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0,0,0,0.2);
        }
        .logo {
            font-size: 26px;
            color: white;
            text-decoration: none;
            font-weight: 700;
        }
        nav {
            display: flex;
            gap: 30px;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }
        nav a:hover {
            color: #ffd966;
        }
        .user-auth {
            display: flex;
            gap: 12px;
        }
        .user-auth button, .dark-mode-btn {
            background: transparent;
            border: 2px solid white;
            border-radius: 40px;
            color: white;
            padding: 8px 20px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }
        .user-auth button:hover, .dark-mode-btn:hover {
            background: white;
            color: rgb(134, 46, 139);
        }
        .dark-mode-btn {
            margin-left: 10px;
        }
        /* Sections */
        section {
            min-height: 100vh;
            padding: 80px 5%;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .hero {
            background-image: url('background.jpg');
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        .hero h1 {
            font-size: 48px;
            color: white;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
            margin-bottom: 20px;
        }
        .form-message {
            background: rgba(0,0,0,0.7);
            color: #aaffaa;
            padding: 10px 20px;
            border-radius: 30px;
            display: inline-block;
        }
        /* About */
        .about-section {
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(5px);
            text-align: center;
            color: white;
        }
        .about-section h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .about-section p {
            max-width: 700px;
            margin: 0 auto;
            font-size: 18px;
            line-height: 1.6;
        }
        /* Projects */
        .projects-section {
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(4px);
        }
        .projects-section h2 {
            text-align: center;
            color: white;
            font-size: 36px;
            margin-bottom: 50px;
        }
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .project-card {
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        }
        .project-card h3 {
            color: rgb(134, 46, 139);
            margin-bottom: 12px;
            font-size: 24px;
        }
        .project-card p {
            color: #333;
            line-height: 1.5;
            margin-bottom: 12px;
        }
        .project-card small {
            display: inline-block;
            background: #f0f0f0;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
        }
        .project-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 15px;
        }
        /* Contact */
        .contact-section {
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(5px);
            justify-content: center;
            align-items: center;
        }
        .contact-section h2 {
            text-align: center;
            color: white;
            font-size: 40px;
            margin-bottom: 60px;
        }
        .contact-section form {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            background: rgba(255,255,255,0.1);
            padding: 60px;
            border-radius: 32px;
            backdrop-filter: blur(10px);
        }
        .input-box {
            position: relative;
            margin-bottom: 25px;
        }
        .input-box input, .input-box textarea {
            width: 100%;
            padding: 15px 45px 15px 20px;
            background: rgba(255,255,255,0.9);
            border: none;
            border-radius: 30px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }
        .input-box textarea {
            resize: vertical;
            min-height: 100px;
        }
        .input-box input:focus, .input-box textarea:focus {
            background: white;
            box-shadow: 0 0 0 3px rgba(134,46,139,0.3);
        }
        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #666;
        }
        .input-box textarea + i {
            top: 25px;
            transform: none;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: rgb(134, 46, 139);
            border: none;
            border-radius: 40px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn:hover {
            background: rgb(100, 30, 110);
            transform: scale(1.02);
        }
        #contactResponse {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
        /* Modal */
        .auth-modal {
            position: fixed;
            inset: 0;
            width: 420px;
            height: 480px;
            background: rgba(0,0,0,0.9);
            border-radius: 32px;
            margin: auto;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 2000;
        }
        .auth-modal.active {
            display: flex;
        }
        .auth-modal.register-active {
            height: 560px;
        }
        .auth-modal .form-box {
            width: 100%;
            padding: 30px;
            background: #1e1e2f;
            border-radius: 24px;
            color: white;
        }
        .auth-modal .form-box.login {
            display: block;
        }
        .auth-modal .form-box.register {
            display: none;
        }
        .auth-modal.register-active .form-box.login {
            display: none;
        }
        .auth-modal.register-active .form-box.register {
            display: block;
        }
        .auth-modal .close {
            position: absolute;
            top: 15px;
            right: 25px;
            font-size: 32px;
            color: white;
            cursor: pointer;
        }
        .auth-modal .input-box input {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        /* Dark Mode */
        body.dark-mode {
            background: #121212;
        }
        body.dark-mode .project-card {
            background: #1e1e2f;
            color: #ddd;
        }
        body.dark-mode .project-card h3 {
            color: #ff8c8c;
        }
        body.dark-mode .project-card p {
            color: #ccc;
        }
        body.dark-mode .input-box input,
        body.dark-mode .input-box textarea {
            background: #2a2a3a;
            color: white;
        }
        /* Responsive */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 10px;
                padding: 10px;
            }
            nav {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            .user-auth {
                margin-top: 5px;
            }
            .hero h1 {
                font-size: 32px;
            }
            .projects-grid {
                grid-template-columns: 1fr;
            }
            .auth-modal {
                width: 90%;
            }
        }
    </style>
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
            <button type="button" id="darkModeToggle" class="dark-mode-btn">🌙 Dark</button>
        </div>
    </header>

    <section class="hero">
        <h1>Welcome to My Portfolio</h1>
        <?php if (!empty($_GET['registered'])): ?>
            <p class="form-message">Registration successful. Please log in.</p>
        <?php endif; ?>
        <?php if (!empty($_GET['login'])): ?>
            <p class="form-message">Login successful.</p>
        <?php endif; ?>
    </section>

    <section id="about" class="about-section">
        <h2>About Me</h2>
        <p>I'm Nejwa Hasseen, a full-stack developer passionate about building dynamic web applications. This portfolio showcases my projects and skills.</p>
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
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="email" id="contactEmail" placeholder="Your Email" required>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="input-box">
                <textarea id="contactMessage" placeholder="Your Message" required rows="5"></textarea>
                <i class='bx bx-message'></i>
            </div>
            <button type="submit" class="btn">Send Message</button>
            <div id="contactResponse" class="form-message"></div>
        </form>
    </section>

    <!-- Auth Modal -->
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

    <script>
        // ========== MODAL LOGIC ==========
        const authModal = document.getElementById('auth-modal');
        const loginBtn = document.querySelector('.login-btn-modal');
        const registerBtn = document.querySelector('.register-btn-modal');
        const closeBtn = document.querySelector('.close');

        loginBtn.addEventListener('click', () => {
            authModal.classList.add('active');
            authModal.classList.remove('register-active');
        });

        registerBtn.addEventListener('click', () => {
            authModal.classList.add('active');
            authModal.classList.add('register-active');
        });

        closeBtn.addEventListener('click', () => {
            authModal.classList.remove('active');
            authModal.classList.remove('register-active');
        });

        // ========== DARK MODE ==========
        const darkModeToggle = document.getElementById('darkModeToggle');
        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const isDark = document.body.classList.contains('dark-mode');
            darkModeToggle.textContent = isDark ? '☀️ Light' : '🌙 Dark';
            localStorage.setItem('darkMode', isDark);
        });
        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark-mode');
            darkModeToggle.textContent = '☀️ Light';
        }

        // ========== LOAD PROJECTS VIA AJAX ==========
        async function loadProjects() {
            const container = document.getElementById('projectsContainer');
            if (!container) return;
            try {
                const response = await fetch('api.php?action=getProjects');
                const projects = await response.json();
                if (projects.length === 0) {
                    container.innerHTML = '<p>No projects yet. Check back soon!</p>';
                    return;
                }
                container.innerHTML = projects.map(proj => `
                    <div class="project-card">
                        ${proj.image_url ? `<img src="${escapeHtml(proj.image_url)}" class="project-image" alt="${escapeHtml(proj.title)}">` : ''}
                        <h3>${escapeHtml(proj.title)}</h3>
                        <p>${escapeHtml(proj.description)}</p>
                        <small>Tech: ${escapeHtml(proj.tech_stack)}</small>
                    </div>
                `).join('');
            } catch (error) {
                console.error('Failed to load projects:', error);
                container.innerHTML = '<p>Error loading projects. Please try again later.</p>';
            }
        }

        function escapeHtml(str) {
            if (!str) return '';
            return str.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            });
        }

        // ========== CONTACT FORM VALIDATION + AJAX ==========
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const name = document.getElementById('contactName').value.trim();
                const email = document.getElementById('contactEmail').value.trim();
                const message = document.getElementById('contactMessage').value.trim();
                const responseDiv = document.getElementById('contactResponse');

                if (!name) {
                    responseDiv.innerHTML = '<span style="color:red;">Name is required.</span>';
                    return;
                }
                if (!email) {
                    responseDiv.innerHTML = '<span style="color:red;">Email is required.</span>';
                    return;
                }
                if (!email.includes('@') || !email.includes('.')) {
                    responseDiv.innerHTML = '<span style="color:red;">Please enter a valid email address.</span>';
                    return;
                }
                if (!message) {
                    responseDiv.innerHTML = '<span style="color:red;">Message cannot be empty.</span>';
                    return;
                }

                const formData = new FormData();
                formData.append('action', 'submitContact');
                formData.append('name', name);
                formData.append('email', email);
                formData.append('message', message);

                try {
                    const response = await fetch('api.php', { method: 'POST', body: formData });
                    const data = await response.json();
                    if (data.success) {
                        responseDiv.innerHTML = '<span style="color:green;">Message sent successfully!</span>';
                        contactForm.reset();
                    } else {
                        responseDiv.innerHTML = `<span style="color:red;">Error: ${data.error || 'Something went wrong'}</span>`;
                    }
                } catch (error) {
                    responseDiv.innerHTML = '<span style="color:red;">Network error. Please try again.</span>';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadProjects();
        });
    </script>
</body>
</html>