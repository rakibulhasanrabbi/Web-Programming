<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once 'config/database.php';

$userId = $_SESSION['user_id'];
$message = '';
$messageType = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($fullName) || empty($email)) {
        $message = "Name and email are required.";
        $messageType = "error";
    } else {
        try {
            if (!empty($password)) {
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("UPDATE users SET full_name = ?, email = ?, password_hash = ? WHERE id = ?");
                $stmt->execute([$fullName, $email, $passwordHash, $userId]);
            } else {
                $stmt = $pdo->prepare("UPDATE users SET full_name = ?, email = ? WHERE id = ?");
                $stmt->execute([$fullName, $email, $userId]);
            }
            $_SESSION['user_name'] = $fullName;
            $message = "Profile updated successfully!";
            $messageType = "success";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Duplicate entry
                $message = "Email is already in use by another account.";
            } else {
                $message = "An error occurred updating your profile.";
            }
            $messageType = "error";
        }
    }
}

// Fetch user data
$stmt = $pdo->prepare("SELECT full_name, email FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings - Abrovia</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .profile-form-group { margin-bottom: 20px; }
        .profile-label { display: block; margin-bottom: 8px; font-size: 0.9rem; font-weight: 500; color: var(--text-secondary); }
        .profile-input { width: 100%; max-width: 400px; padding: 12px 16px; font-size: 0.95rem; border-radius: 8px; border: 1px solid var(--border); background: var(--bg-input); color: #fff; outline: none; transition: border-color 0.3s ease; }
        .profile-input:focus { border-color: var(--accent); }
        .alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 24px; max-width: 400px; font-size: 0.9rem; }
        .alert.success { background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.2); color: #4ade80; }
        .alert.error { background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #f87171; }
    </style>
</head>
<body>
<div class="dashboard-layout">
    <!-- ========== NAVBAR ========== -->
    <?php require_once 'includes/header.php'; ?>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-logo" style="display: flex; align-items: center; gap: 10px; margin-bottom: 30px;">
                <div style="color: #7c3aed;"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" transform="rotate(45 12 12)"/><rect x="4" y="19" width="16" height="2" rx="1"/></svg></div>
                <span class="logo-name">Abrovia</span>
                <span class="logo-sub">Global Education</span>
            </div>
            <nav class="sidebar-nav">
                <a href="dashboard.php" class="nav-item" id="nav-dashboard">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    Dashboard</a>
                <a href="applications.php" class="nav-item" id="nav-applications">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    Applications</a>
                <a href="saved.php" class="nav-item" id="nav-saved">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                    Saved
                </a>
                <a href="profile.php" class="nav-item active" id="nav-profile">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Profile
                </a>
            </nav>
        </div>
        <div class="sidebar-bottom">
            <a href="auth/logout.php" class="nav-item logout-link" style="margin-top: 10px; display: flex; align-items: center; gap: 10px; color: #94a3b8; text-decoration: none; font-size: 14px; padding: 10px; border-radius: 8px; transition: all 0.3s ease;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </a>
            <a href="application-form.php" class="btn-new-app" id="btn-new-application">Start New Application</a>
        </div>
    </aside>

    <!-- MAIN AREA -->
    <div class="main-area">

        <!-- MAIN CONTENT -->
        <main class="main-content" id="main-content">
            <section class="welcome-section">
                <h1 class="welcome-title">Profile Settings</h1>
                <p class="welcome-desc">Update your personal information and security settings.</p>
            </section>

            <section class="profile-section">
                <div style="background: var(--bg-card); padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--border);">
                    <?php if ($message): ?>
                        <div class="alert <?php echo $messageType; ?>"><?php echo htmlspecialchars($message); ?></div>
                    <?php endif; ?>

                    <form action="profile.php" method="POST">
                        <div class="profile-form-group">
                            <label class="profile-label" for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" class="profile-input" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                        </div>
                        
                        <div class="profile-form-group">
                            <label class="profile-label" for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="profile-input" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>

                        <div class="profile-form-group">
                            <label class="profile-label" for="password">New Password (leave blank to keep current)</label>
                            <input type="password" id="password" name="password" class="profile-input" placeholder="••••••••">
                        </div>

                        <div style="margin-top: 32px;">
                            <button type="submit" style="padding: 12px 24px; background: var(--accent); color: #fff; border-radius: var(--radius-sm); font-weight: 600; font-size: 0.95rem; cursor: pointer; border: none; transition: background 0.3s ease;">Save Changes</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- ========== FOOTER ========== -->
<?php require_once 'includes/footer.php'; ?>

</body>
</html>
