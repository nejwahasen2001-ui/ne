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
<<<<<<< Updated upstream
if (loginBtn && registerBtn && closeBtn && modal) {
    loginBtn.onclick = () => { modal.style.display = 'block'; modal.classList.remove('register-active'); };
    registerBtn.onclick = () => { modal.style.display = 'block'; modal.classList.add('register-active'); };
    closeBtn.onclick = () => { modal.style.display = 'none'; };
}
=======

loginBtn.addEventListener('click', () => {
    authModal.classList.add('active');
    authModal.classList.remove('register-active');
});
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
// Contact form AJAX
const form = document.getElementById('contactForm');
if (form) {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
=======
closeBtn.addEventListener('click', () => {
    authModal.classList.remove('active');
    authModal.classList.remove('register-active');
});


const darkModeToggle = document.getElementById('darkModeToggle');
darkModeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const isDark = document.body.classList.contains('dark-mode');
    darkModeToggle.textContent = isDark ? ' Light' : ' Dark';
    localStorage.setItem('darkMode', isDark);
});

if (localStorage.getItem('darkMode') === 'true') {
    document.body.classList.add('dark-mode');
    darkModeToggle.textContent = ' Light';
}


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
                ${proj.image_url ? `<img src="${proj.image_url}" alt="${proj.title}" class="project-image">` : ''}
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


const contactForm = document.getElementById('contactForm');
if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();
    
>>>>>>> Stashed changes
        const name = document.getElementById('contactName').value.trim();
        const email = document.getElementById('contactEmail').value.trim();
        const message = document.getElementById('contactMessage').value.trim();
        const responseDiv = document.getElementById('contactResponse');
<<<<<<< Updated upstream
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
=======
        
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
            const response = await fetch('api.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            if (data.success) {
                responseDiv.innerHTML = '<span style="color:green;">Message sent successfully!</span>';
                contactForm.reset();
            } else {
                responseDiv.innerHTML = `<span style="color:red;">Error: ${data.error || 'Something went wrong'}</span>`;
            }
        } catch (error) {
            responseDiv.innerHTML = '<span style="color:red;">Network error. Please try again.</span>';
>>>>>>> Stashed changes
        }
    });
}

<<<<<<< Updated upstream
document.addEventListener('DOMContentLoaded', loadProjects);
=======
document.addEventListener('DOMContentLoaded', () => {
    loadProjects();
});
>>>>>>> Stashed changes
