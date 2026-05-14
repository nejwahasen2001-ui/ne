# Full-Stack Web Portfolio – Nejwa Hasseen

A responsive, dynamic portfolio built with HTML5, CSS3, JavaScript, PHP, and MySQL.
Features dark mode, AJAX-loaded projects, contact form with database storage, admin dashboard, and session-based login.

Live Demo: http://nejwaportfolio.great-site.net
GitHub Repository: https://github.com/nejwahasen2001-ui/ne


## Project Overview

This project is a full stack project that deploys HTML, CSS, JS, PHP, MySQL. It also uses AJAX to load data without refreshing the page. The portfolio showcases my skills as a Software Engineering student at Halic University. The website allows visitors to:

- View my projects (loaded dynamically from a MySQL database via AJAX)
- Contact me (messages are saved to the database)
- Toggle between light/dark mode (preference saved in localStorage)
- Admin login to add, edit, or delete projects

The application meets all academic requirements: semantic HTML, responsive CSS, client-side validation, AJAX, PHP backend, MySQL database, sessions, and cookies.


## Technologies Used

Frontend: HTML5, CSS3 (Grid, Flexbox, Media Queries), JavaScript (ES6), Fetch API
Backend: PHP 8.3 (PDO, Sessions, password_hash)
Database: MySQL (hosted on InfinityFree)
AJAX: Fetch API – no page refresh
Hosting: InfinityFree (free PHP/MySQL plan)
Version Control: Git & GitHub


## Key Features Implemented

- Semantic HTML5 – header, nav, section, article, footer
- Responsive CSS – CSS Grid for projects, Flexbox for navbar, media queries for mobile
- Dark Mode Toggle – JavaScript toggles dark-mode class; preference stored in localStorage
- JavaScript Form Validation – contact form validates name, email, message before AJAX submit
- AJAX Projects – projects fetched from api.php as JSON and inserted into DOM without reload
- Contact Management – messages saved to contact_messages table in MySQL
- Admin Dashboard – secure login using PHP sessions; admin can add/edit/delete projects
- Secure Login – passwords hashed with password_hash(); session cookie (PHPSESSID) maintains state
- Cookie / Session – PHP automatically sets a session cookie for admin authentication


## Database Schema

The database used is named `if0_41893575_nejwaportfolio` and contains three tables. The SQL export file included in the ZIP is `if0_41893575_nejwaportfolio.sql`.

Table: projects
- id (INT, primary key, auto-increment)
- title (VARCHAR 120)
- description (TEXT)
- tech_stack (VARCHAR 255)
- image_url (VARCHAR 255)
- created_at (TIMESTAMP, default CURRENT_TIMESTAMP)

Table: contact_messages
- id (INT, primary key, auto-increment)
- name (VARCHAR 100)
- email (VARCHAR 100)
- message (TEXT)
- submitted_at (TIMESTAMP, default CURRENT_TIMESTAMP)

Table: admin_users
- id (INT, primary key, auto-increment)
- username (VARCHAR 50, unique)
- password_hash (VARCHAR 255)

Default admin credentials (for local/test):
- Username: admin
- Password: admin123


## How I Built It – Development Process

Frontend (HTML/CSS/JS):
- Designed layout with semantic HTML, CSS Grid, and Flexbox.
- Implemented dark mode toggle and client-side form validation.
- Used Fetch API to load projects from api.php and submit contact messages.

Backend (PHP/MySQL):
- Created config.php with PDO connection (environment-aware for local vs. remote).
- Built api.php to handle GET (fetch projects) and POST (save contact messages).
- Made admin.php dashboard with session protection and CRUD operations for projects.
- Stored hashed passwords for admin login.

Database:
- Designed three tables and exported `if0_41893575_nejwaportfolio.sql`.
- Tested locally with Laragon, then migrated to InfinityFree.

Deployment:
- Hosted on InfinityFree (free PHP/MySQL).
- Updated config.php with remote database credentials (host sql102.infinityfree.com).
- Uploaded files via File Manager and imported SQL via phpMyAdmin.

Challenges and Solutions:
- Database connection on remote server: initially used localhost; fixed by using correct hostname from InfinityFree.
- AJAX 500 error: the projects table was missing; created tables via SQL import.
- Background image not showing: renamed file to galaxy.jpg and corrected CSS path.


## Folder Structure (in ZIP)

ne/
- index.php (main portfolio page)
- admin.php (admin dashboard)
- login.php (admin login form)
- logout.php (destroy session)
- api.php (AJAX endpoints)
- config.php (database connection + session start)
- style.css (all styling)
- script.js (dark mode, loadProjects, contact validation)
- if0_41893575_nejwaportfolio.sql (MySQL schema export)
- galaxy.jpg (background image)
- .gitattributes
- README.md 

Note: On the live server, config.php contains real database credentials. The public GitHub version uses placeholders for security.


## Local Setup (Optional)

To run the project locally:

1. Clone the repository: git clone https://github.com/nejwahasen2001-ui/ne.git
2. Place the folder in your web server root (e.g., laragon/www/ or htdocs/).
3. Create a MySQL database and import `if0_41893575_nejwaportfolio.sql`.
4. Update config.php with your local credentials (host localhost, user root, empty password).
5. Start Apache and MySQL, then visit http://localhost/ne/index.php.


## Live Deployment

Hosting provider: InfinityFree (free plan)
Live URL: http://nejwaportfolio.great-site.net
Admin panel: http://nejwaportfolio.great-site.net/login.php (admin / admin123)

All features are fully functional on the live site, including contact form submission, AJAX project loading, dark mode, and admin dashboard.


## Contact and Credits

Author: Nejwa Hasseen – Software Engineering student at Halic University
Development environment: Laragon
AI assistance: ChatGPT for debugging, code suggestions, and documentation






nejwa@gmail.com
