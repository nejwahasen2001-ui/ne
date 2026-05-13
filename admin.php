<?php
require_once 'config.php';
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: adminlogin.php'); 
    exit;
}

// Handle add, edit, delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_project'])) {
        $stmt = $pdo->prepare("INSERT INTO projects (title, description, tech_stack, image_url) VALUES (?,?,?,?)");
        $stmt->execute([$_POST['title'], $_POST['description'], $_POST['tech_stack'], $_POST['image_url']]);
    } elseif (isset($_POST['edit_project'])) {
        $stmt = $pdo->prepare("UPDATE projects SET title=?, description=?, tech_stack=?, image_url=? WHERE id=?");
        $stmt->execute([$_POST['title'], $_POST['description'], $_POST['tech_stack'], $_POST['image_url'], $_POST['id']]);
    } elseif (isset($_GET['delete'])) {
        $stmt = $pdo->prepare("DELETE FROM projects WHERE id=?");
        $stmt->execute([$_GET['delete']]);
        header('Location: admin.php');
        exit;
    }
    header('Location: admin.php');
    exit;
}

$projects = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title><link rel="stylesheet" href="style.css"></head>
<body style="padding:2rem;">
<div style="max-width:1200px; margin:0 auto;">
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['admin_username']) ?> | <a href="logout.php">Logout</a></p>
    <hr>
    <h2>Add New Project</h2>
    <form method="post" style="margin-bottom:2rem;">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="text" name="tech_stack" placeholder="Tech stack (e.g., PHP, MySQL, JS)"><br>
        <input type="text" name="image_url" placeholder="Image URL (optional)"><br>
        <button type="submit" name="add_project" class="btn">Add Project</button>
    </form>
    <h2>Existing Projects</h2>
    <table border="1" cellpadding="8" style="width:100%; background:var(--card-bg);">
        <tr><th>ID</th><th>Title</th><th>Description</th><th>Tech</th><th>Actions</th></tr>
        <?php foreach ($projects as $proj): ?>
        <tr>
            <td><?= $proj['id'] ?></td>
            <td><?= htmlspecialchars($proj['title']) ?></td>
            <td><?= htmlspecialchars(substr($proj['description'],0,60)) ?>...</td>
            <td><?= htmlspecialchars($proj['tech_stack']) ?></td>
            <td>
                <form method="post" style="display:inline-block;">
                    <input type="hidden" name="id" value="<?= $proj['id'] ?>">
                    <input type="text" name="title" value="<?= htmlspecialchars($proj['title']) ?>" required>
                    <input type="text" name="description" value="<?= htmlspecialchars($proj['description']) ?>" required>
                    <input type="text" name="tech_stack" value="<?= htmlspecialchars($proj['tech_stack']) ?>">
                    <input type="text" name="image_url" value="<?= htmlspecialchars($proj['image_url']) ?>">
                    <button type="submit" name="edit_project">Edit</button>
                </form>
                <a href="admin.php?delete=<?= $proj['id'] ?>" onclick="return confirm('Delete this project?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>