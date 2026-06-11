<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Abrovia</title>
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
            <nav class="sidebar-nav">
                <a href="dashboard.php" class="nav-item active" id="nav-dashboard">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    Dashboard</a>
                <a href="applications.php" class="nav-item" id="nav-applications">
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
            <!-- Welcome -->
            <section class="welcome-section">
                <h1 class="welcome-title">Welcome back, <?php echo htmlspecialchars(explode(' ', $_SESSION['user_name'] ?? 'Guest')[0]); ?>!</h1>
                <p class="welcome-desc">Your global journey is just beginning. Let's make progress on your applications today.</p>
            </section>

            <!-- Application Status -->
            <section class="status-section">
                <h2 class="section-title">Current Application Status</h2>
                <div class="status-tracker" id="application-status">
                    <div class="status-step completed">
                        <div class="step-dot"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
                        <div class="step-line filled"></div>
                        <span class="step-label">Document Prep</span>
                    </div>
                    <div class="status-step current">
                        <div class="step-dot"><svg width="12" height="12" viewBox="0 0 24 24" fill="#fff"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                        <div class="step-line"></div>
                        <span class="step-label">Application Sent</span>
                    </div>
                    <div class="status-step upcoming">
                        <div class="step-dot"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
                        <div class="step-line"></div>
                        <span class="step-label">Interview</span>
                    </div>
                    <div class="status-step upcoming last">
                        <div class="step-dot"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                        <span class="step-label">Visa</span>
                    </div>
                </div>
            </section>

            <!-- Bottom Grid -->
            <section class="bottom-grid">
                <!-- Recommended Programs -->
                <div class="programs-section">
                    <div class="section-header">
                        <h2 class="section-title">Recommended Programs</h2>
                        <a href="programs.php" class="view-all-link" id="view-all-programs">View All</a>
                    </div>
                    <div class="programs-grid">
                        <div class="program-card" id="program-card-1">
                            <div class="program-image">
                                <button class="bookmark-btn" aria-label="Bookmark"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg></button>
                            </div>
                            <div class="program-content">
                                <div class="program-location"><span class="location-dot"></span>London, UK</div>
                                <h3 class="program-title">MSc Data Science & AI</h3>
                                <p class="program-university">Imperial College London</p>
                                <div class="program-footer">
                                    <div class="program-deadline"><span class="deadline-label">Deadline</span><span class="deadline-date">Oct 15, 2024</span></div>
                                    <a href="university-details.php" class="btn-details">Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="program-card" id="program-card-2">
                            <div class="program-image">
                                <button class="bookmark-btn" aria-label="Bookmark"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg></button>
                            </div>
                            <div class="program-content">
                                <div class="program-location"><span class="location-dot"></span>Melbourne, AUS</div>
                                <h3 class="program-title">Master of Global Business</h3>
                                <p class="program-university">University of Melbourne</p>
                                <div class="program-footer">
                                    <div class="program-deadline"><span class="deadline-label">Deadline</span><span class="deadline-date">Nov 01, 2024</span></div>
                                    <a href="university-details.php" class="btn-details">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Saved Resources -->
                <div class="resources-section">
                    <h2 class="section-title">Saved Resources</h2>
                    <div class="resources-list">
                        <a href="#" class="resource-item" id="resource-1">
                            <div class="resource-icon pdf"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
                            <div class="resource-info"><span class="resource-name">UK Visa Guide...</span><span class="resource-type">PDF Document</span></div>
                            <svg class="resource-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                        <a href="#" class="resource-item" id="resource-2">
                            <div class="resource-icon article"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
                            <div class="resource-info"><span class="resource-name">Scholarship...</span><span class="resource-type">Article</span></div>
                            <svg class="resource-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                        <a href="#" class="resource-item" id="resource-3">
                            <div class="resource-icon discussion"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
                            <div class="resource-info"><span class="resource-name">Interview Tips...</span><span class="resource-type">Discussion</span></div>
                            <svg class="resource-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- ========== FOOTER ========== -->
<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const applyBtns = document.querySelectorAll('.btn-apply, .btn-apply-now, .nav-apply-btn');
    applyBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            if(this.innerText.includes('Applied')) return;
            const originalText = this.innerText;
            this.innerText = 'Applying...';
            const formData = new FormData();
            let programName = 'General Application';
            let uniName = 'Unknown';
            const card = this.closest('.program-card, .opportunity-card, .university-card');
            if(card) {
                const titleEl = card.querySelector('h3, .card-title, .opportunity-card-title, .uni-card-title');
                if(titleEl) programName = titleEl.innerText;
            } else {
                const pageTitle = document.querySelector('h1, .page-title, .hero-title');
                if(pageTitle) programName = pageTitle.innerText.replace(/\n/g, ' ').trim();
            }
            formData.append('program_name', programName);
            formData.append('university_name', uniName);
            fetch('api/apply.php', { method: 'POST', body: formData })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    this.innerText = 'Applied ✓';
                    this.style.backgroundColor = '#10b981';
                    this.style.color = 'white';
                    this.style.borderColor = '#10b981';
                } else {
                    alert(data.message);
                    this.innerText = originalText;
                    if(data.message.includes('logged in')) {
                        window.location.href = 'login.php';
                    }
                }
            }).catch(err => {
                alert('An error occurred.');
                this.innerText = originalText;
            });
        });
    });

    const searchBtns = document.querySelectorAll('.search-btn, #btn-search');
    searchBtns.forEach(btn => {
        if(btn.type === 'submit') return; // Skip if already in a form
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const wrapper = this.closest('.search-bar, .search-container') || this.parentElement;
            if(!wrapper) return;
            const input = wrapper.querySelector('input[type="text"]');
            if(input && input.value) {
                let target = window.location.pathname.includes('university') ? 'university.php' : 'programs.php';
                window.location.href = target + '?q=' + encodeURIComponent(input.value);
            }
        });
    });
});
</script>
</body>
</html>


