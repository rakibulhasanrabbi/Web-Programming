<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once 'config/database.php';

// Fetch saved items
$stmt = $pdo->prepare("SELECT * FROM saved_items WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$savedItems = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Items - Abrovia</title>
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
                <a href="applications.php" class="nav-item" id="nav-applications">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    Applications</a>
                <a href="saved.php" class="nav-item active" id="nav-saved">
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
                <h1 class="welcome-title">Saved Items</h1>
                <p class="welcome-desc">Your bookmarked programs, scholarships, and resources.</p>
            </section>

            <section class="applications-section">
                <?php if (empty($savedItems)): ?>
                    <div style="background: var(--bg-card); padding: 40px; border-radius: var(--radius-md); text-align: center; border: 1px solid var(--border);">
                        <p style="color: var(--text-secondary); margin-bottom: 20px;">You haven't saved any items yet.</p>
                        <a href="programs.php" class="nav-apply-btn" style="display: inline-block; padding: 10px 24px; background: var(--accent); border-radius: var(--radius-sm); color: #fff; text-decoration: none;">Explore Programs</a>
                    </div>
                <?php else: ?>
                    <div class="resources-list">
                        <?php foreach ($savedItems as $item): ?>
                            <a href="<?php echo htmlspecialchars($item['item_url']); ?>" class="resource-item">
                                <div class="resource-icon <?php echo htmlspecialchars($item['item_type']); ?>">
                                    <?php if ($item['item_type'] === 'program'): ?>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                                    <?php else: ?>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg>
                                    <?php endif; ?>
                                </div>
                                <div class="resource-info">
                                    <span class="resource-name"><?php echo htmlspecialchars($item['item_title']); ?></span>
                                    <span class="resource-type"><?php echo ucfirst(htmlspecialchars($item['item_type'])); ?></span>
                                </div>
                                <button class="btn-remove-saved" data-id="<?php echo $item['id']; ?>" style="padding: 8px; color: var(--text-muted); background: rgba(255,255,255,0.05); border-radius: var(--radius-sm); margin-right: 10px;">Remove</button>
                                <svg class="resource-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </div>
</div>

<!-- ========== FOOTER ========== -->
<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const removeBtns = document.querySelectorAll('.btn-remove-saved');
    removeBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const id = this.getAttribute('data-id');
            const item = this.closest('.resource-item');
            
            fetch('api/save_item.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'action=remove&id=' + id
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    item.remove();
                    if (document.querySelectorAll('.resource-item').length === 0) {
                        location.reload(); // Reload to show empty state
                    }
                }
            });
        });
    });
});
</script>
</body>
</html>
