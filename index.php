<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nejwa Hasseen · Full‑Stack Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <a href="#" class="brand">Portfolio</a>
        <div class="nav-links">
            <a href="#about">About</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
            <div class="user-buttons">
                <button id="loginModalBtn">LOGIN</button>
                <button id="registerModalBtn">REGISTER</button>
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
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="email" id="contactEmail" placeholder="Your Email" required>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="input-box">
                <textarea id="contactMessage" placeholder="Your Message" rows="4" required></textarea>
                <i class='bx bx-message'></i>
            </div>
            <button type="submit" class="btn">Send Message</button>
            <div id="contactResponse" style="margin-top:15px; text-align:center;"></div>
        </form>
    </section>

    <!-- LOGIN MODAL -->
    <div id="loginModal" class="auth-modal" style="display:none;">
        <div class="modal-content">
            <span class="close-login">&times;</span>
            <h2 style="color:white;">Login</h2>
            <form method="post" action="login.php">
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button class="btn" type="submit">LOGIN</button>
            </form>
        </div>
    </div>

    <!-- REGISTER MODAL -->
    <div id="registerModal" class="auth-modal" style="display:none;">
        <div class="modal-content">
            <span class="close-register">&times;</span>
            <h2 style="color:white;">Register</h2>
            <form method="post" action="register.php">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
                <button class="btn" type="submit">REGISTER</button>
            </form>
        </div>
    </div>

    <!-- INLINE JAVASCRIPT – no external file needed -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dark mode
            const toggle = document.getElementById('darkModeToggle');
            if (toggle) {
                toggle.addEventListener('click', () => {
                    document.body.classList.toggle('dark-mode');
                    const isDark = document.body.classList.contains('dark-mode');
                    toggle.textContent = isDark ? '☀️ Light' : '🌙 Dark';
                    localStorage.setItem('darkMode', isDark);
                });
                if (localStorage.getItem('darkMode') === 'true') {
                    document.body.classList.add('dark-mode');
                    toggle.textContent = '☀️ Light';
                }
            }

            // Modals
            const loginModal = document.getElementById('loginModal');
            const registerModal = document.getElementById('registerModal');
            const loginBtn = document.getElementById('loginModalBtn');
            const registerBtn = document.getElementById('registerModalBtn');
            const closeLogin = document.querySelector('.close-login');
            const closeRegister = document.querySelector('.close-register');

            if (loginBtn) {
                loginBtn.onclick = () => {
                    if (registerModal) registerModal.style.display = 'none';
                    if (loginModal) loginModal.style.display = 'flex';
                };
            }
            if (registerBtn) {
                registerBtn.onclick = () => {
                    if (loginModal) loginModal.style.display = 'none';
                    if (registerModal) registerModal.style.display = 'flex';
                };
            }
            if (closeLogin) closeLogin.onclick = () => { if (loginModal) loginModal.style.display = 'none'; };
            if (closeRegister) closeRegister.onclick = () => { if (registerModal) registerModal.style.display = 'none'; };

            window.onclick = (event) => {
                if (event.target === loginModal) loginModal.style.display = 'none';
                if (event.target === registerModal) registerModal.style.display = 'none';
            };

            // Load projects via AJAX
            async function loadProjects() {
                const container = document.getElementById('projectsContainer');
                if (!container) return;
                try {
                    const res = await fetch('api.php?action=getProjects');
                    const projects = await res.json();
                    if (!projects.length) {
                        container.innerHTML = '<p>No projects yet. Check back soon!</p>';
                        return;
                    }
                    container.innerHTML = projects.map(p => `
                        <div class="project-card">
                            <h3>${escapeHtml(p.title)}</h3>
                            <p>${escapeHtml(p.description)}</p>
                            <small>Tech: ${escapeHtml(p.tech_stack)}</small>
                        </div>
                    `).join('');
                } catch(e) {
                    container.innerHTML = '<p>Error loading projects.</p>';
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

            // Contact form AJAX
            const form = document.getElementById('contactForm');
            if (form) {
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    const name = document.getElementById('contactName').value.trim();
                    const email = document.getElementById('contactEmail').value.trim();
                    const message = document.getElementById('contactMessage').value.trim();
                    const responseDiv = document.getElementById('contactResponse');
                    if (!name || !email || !message) {
                        responseDiv.innerHTML = '<span style="color:red;">All fields required.</span>';
                        return;
                    }
                    if (!email.includes('@') || !email.includes('.')) {
                        responseDiv.innerHTML = '<span style="color:red;">Valid email required.</span>';
                        return;
                    }
                    const fd = new FormData();
                    fd.append('action', 'submitContact');
                    fd.append('name', name);
                    fd.append('email', email);
                    fd.append('message', message);
                    try {
                        const res = await fetch('api.php', { method: 'POST', body: fd });
                        const data = await res.json();
                        if (data.success) {
                            responseDiv.innerHTML = '<span style="color:lightgreen;">Message sent successfully!</span>';
                            form.reset();
                        } else {
                            responseDiv.innerHTML = '<span style="color:red;">Error: ' + (data.error || 'Try again') + '</span>';
                        }
                    } catch(err) {
                        responseDiv.innerHTML = '<span style="color:red;">Network error.</span>';
                    }
                });
            }

            loadProjects();
        });
    </script>
</body>
</html>