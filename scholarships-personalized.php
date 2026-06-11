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
    <title>Personalized Scholarships - Abrovia</title>
    <link rel="stylesheet" href="assets/css/scholarships-personalized.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <?php require_once 'includes/header.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="page-content">
        <div class="container">
            
            <!-- WELCOME HEADER -->
            <section class="welcome-section">
                <div class="welcome-card">
                    <div class="welcome-left">
                        <div class="large-avatar">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Sarah" alt="Sarah">
                        </div>
                        <div class="welcome-text">
                            <h1 class="welcome-title">Welcome back, Sarah</h1>
                            <p class="welcome-subtitle">Master's in Computer Science Applicant</p>
                        </div>
                    </div>
                    <div class="welcome-right">
                        <div class="stat-box">
                            <span class="stat-label">ACADEMIC SCORE</span>
                            <span class="stat-value">GPA 3.8</span>
                        </div>
                        <div class="stat-box">
                            <span class="stat-label">TARGET INTAKE</span>
                            <span class="stat-value">Fall 2025</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SCHOLARSHIPS SECTION -->
            <section class="scholarships-section">
                <div class="section-header">
                    <div class="header-text">
                        <h2 class="section-title">Best Scholarships for You âœ¨</h2>
                        <p class="section-subtitle">Curated matches based on your profile and target programs.</p>
                    </div>
                    <button class="btn-filter">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                        Filter Results
                    </button>
                </div>

                <div class="scholarship-grid">
                    <!-- Card 1 -->
                    <div class="scholarship-card">
                        <div class="card-header">
                            <span class="match-badge green-badge">98% Match</span>
                            <button class="btn-bookmark">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                            </button>
                        </div>
                        <h3 class="card-title">Global Excellence Award</h3>
                        <p class="card-location">University of Melbourne, Australia</p>
                        <div class="card-details">
                            <div class="detail-item">
                                <span class="detail-icon">ðŸ’µ</span>
                                <span>Full Tuition + $10k Stipend</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-icon">ðŸ“…</span>
                                <span>Deadline: Dec 15, 2024</span>
                            </div>
                        </div>
                        <button class="btn-apply primary">View & Apply</button>
                    </div>

                    <!-- Card 2 -->
                    <div class="scholarship-card">
                        <div class="card-header">
                            <span class="match-badge green-badge">92% Match</span>
                            <button class="btn-bookmark">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                            </button>
                        </div>
                        <h3 class="card-title">Women in Tech Fellowship</h3>
                        <p class="card-location">Stanford University, USA</p>
                        <div class="card-details">
                            <div class="detail-item">
                                <span class="detail-icon">ðŸ’µ</span>
                                <span>50% Tuition Waiver</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-icon">ðŸ“…</span>
                                <span>Deadline: Jan 10, 2025</span>
                            </div>
                        </div>
                        <button class="btn-apply outline">View & Apply</button>
                    </div>

                    <!-- Card 3 -->
                    <div class="scholarship-card">
                        <div class="card-header">
                            <span class="match-badge yellow-badge">85% Match</span>
                            <button class="btn-bookmark">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                            </button>
                        </div>
                        <h3 class="card-title">European Innovation Grant</h3>
                        <p class="card-location">ETH Zurich, Switzerland</p>
                        <div class="card-details">
                            <div class="detail-item">
                                <span class="detail-icon">ðŸ’µ</span>
                                <span>â‚¬15,000 Living Stipend</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-icon">ðŸ“…</span>
                                <span>Deadline: Feb 28, 2025</span>
                            </div>
                        </div>
                        <button class="btn-apply outline">View & Apply</button>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- FOOTER -->
    <?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const applyBtns = document.querySelectorAll('.btn-apply, .btn-apply-now');
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


