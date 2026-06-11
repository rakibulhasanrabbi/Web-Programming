<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once 'config/database.php';

// Fetch user's applications
$stmt = $pdo->prepare("SELECT * FROM applications WHERE user_id = ? ORDER BY applied_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$applications = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications - Abrovia</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
                <a href="applications.php" class="nav-item active" id="nav-applications">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    Applications</a>
                <a href="saved.php" class="nav-item" id="nav-saved">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                    Saved
                </a>
                <a href="profile.php" class="nav-item" id="nav-profile">
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
                <h1 class="welcome-title">My Applications</h1>
                <p class="welcome-desc">Track the status of your submitted university applications.</p>
            </section>

            <section class="applications-section">
                <?php if (empty($applications)): ?>
                    <div style="background: var(--bg-card); padding: 40px; border-radius: var(--radius-md); text-align: center; border: 1px solid var(--border);">
                        <p style="color: var(--text-secondary); margin-bottom: 20px;">You haven't submitted any applications yet.</p>
                        <a href="programs.php" class="nav-apply-btn" style="display: inline-block; padding: 10px 24px; background: var(--accent); border-radius: var(--radius-sm); color: #fff; text-decoration: none;">Explore Programs</a>
                    </div>
                <?php else: ?>
                    <div class="programs-grid" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">
                        <?php foreach ($applications as $app): ?>
                            <div class="program-card">
                                <div class="program-content" style="padding: 24px;">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                                        <div class="program-location" style="margin-bottom: 0;">
                                            <span class="location-dot"></span>
                                            Status: <?php echo ucfirst(htmlspecialchars($app['status'])); ?>
                                        </div>
                                    </div>
                                    <h3 class="program-title" style="font-size: 1.1rem; margin-bottom: 8px;"><?php echo htmlspecialchars($app['program_name']); ?></h3>
                                    <p class="program-university" style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 20px;"><?php echo htmlspecialchars($app['university_name']); ?></p>
                                    
                                    <div class="program-footer" style="padding-top: 16px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
                                        <div>
                                            <span class="deadline-label" style="font-size: 0.75rem; color: var(--text-muted);">Applied On</span>
                                            <span class="deadline-date" style="font-size: 0.85rem; color: var(--text-primary);"><?php echo date('M d, Y', strtotime($app['applied_at'])); ?></span>
                                        </div>
                                        <a href="application-details.php?id=<?php echo $app['id']; ?>" class="btn-details" style="padding: 8px 16px; border-radius: var(--radius-sm); background: rgba(108, 63, 255, 0.1); color: #c4b5fd; text-decoration: none; font-size: 0.8rem; font-weight: 500;">View Details</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </div>
</div>

<!-- ========== FOOTER ========== -->
<?php require_once 'includes/footer.php'; ?>

</body>
</html>
