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
    <title>Notifications & Suggestions - Abrovia</title>
    <link rel="stylesheet" href="assets/css/notifications.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- ========== NAVBAR ========== -->
    <?php require_once 'includes/header.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="page-content">
        <div class="container layout-grid">
            
            <!-- LEFT COLUMN: NOTIFICATIONS -->
            <div class="notifications-column">
                <header class="header">
                    <h1 class="page-title">Notifications & Suggestions</h1>
                    <p class="page-subtitle">Stay updated on your study abroad journey and discover intelligent insights tailored to your academic profile.</p>
                </header>

                <div class="notif-list">
                    <!-- Notif 1 -->
                    <div class="notif-card">
                        <div class="notif-icon purple-bg">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                        </div>
                        <div class="notif-content">
                            <div class="notif-header">
                                <h3 class="notif-title">Scholarship Deadline Approaching</h3>
                                <span class="notif-time">2h ago</span>
                            </div>
                            <p class="notif-desc">The Global Excellence Scholarship application period closes in exactly 48 hours. Ensure all your documents are uploaded.</p>
                        </div>
                    </div>

                    <!-- Notif 2 -->
                    <div class="notif-card">
                        <div class="notif-icon yellow-bg">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </div>
                        <div class="notif-content">
                            <div class="notif-header">
                                <h3 class="notif-title">Application Update: University of Melbourne</h3>
                                <span class="notif-time">Yesterday</span>
                            </div>
                            <p class="notif-desc">Your application status has officially changed to 'Under Review'. We will notify you once a decision is rendered.</p>
                        </div>
                    </div>

                    <!-- Notif 3 -->
                    <div class="notif-card">
                        <div class="notif-icon blue-bg">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <div class="notif-content">
                            <div class="notif-header">
                                <h3 class="notif-title">Document Verification Complete</h3>
                                <span class="notif-time">Oct 12</span>
                            </div>
                            <p class="notif-desc">Your submitted academic transcripts and proof of funds have been successfully verified by our compliance team.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: RECOMMENDATIONS -->
            <aside class="sidebar-column">
                <h2 class="sidebar-title">Smart Recommendations</h2>
                
                <!-- Uni Recommendation -->
                <div class="rec-card uni-rec">
                    <div class="uni-image-placeholder">
                        <span class="match-badge">✨ 95% Match</span>
                    </div>
                    <div class="rec-content">
                        <h3 class="rec-name">University of Toronto</h3>
                        <p class="rec-desc">Based on your academic profile and preferences, you have a highly competitive chance of...</p>
                        <button class="btn-sidebar">View Match Details ←’</button>
                    </div>
                </div>

                <!-- Score Recommendation -->
                <div class="rec-card score-rec">
                    <div class="rec-header">
                        <div class="rec-icon-wrap indigo-bg">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                        </div>
                    </div>
                    <div class="rec-content">
                        <h3 class="rec-name">Improve your IELTS score</h3>
                        <p class="rec-desc">Boosting your overall band score to 7.5 increases your likelihood of securing a merit scholarship by approximately 40%.</p>
                        <button class="btn-sidebar-outline">View Prep Materials</button>
                    </div>
                </div>
            </aside>

        </div>
    </main>

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


