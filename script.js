// Dark mode toggle
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

// Modal logic
const modal = document.getElementById('auth-modal');
const loginBtn = document.querySelector('.login-btn-modal');
const registerBtn = document.querySelector('.register-btn-modal');
const closeBtn = document.querySelector('.close');
if (loginBtn && registerBtn && closeBtn && modal) {
    loginBtn.onclick = () => { modal.style.display = 'block'; modal.classList.remove('register-active'); };
    registerBtn.onclick = () => { modal.style.display = 'block'; modal.classList.add('register-active'); };
    closeBtn.onclick = () => { modal.style.display = 'none'; };
}

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

document.addEventListener('DOMContentLoaded', loadProjects);