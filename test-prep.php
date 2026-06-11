<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Prep - Abrovia</title>
    <link rel="stylesheet" href="assets/css/test-prep.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <?php require_once 'includes/header.php'; ?>

    <!-- HERO -->
    <header class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Master Your Tests</h1>
            <p class="hero-subtitle">
                Achieve your dream score with our comprehensive preparation courses for IELTS, GRE, and TOEFL. Expert guidance, realistic mock exams, and personalized study plans tailored for global scholars.
            </p>
        </div>
    </header>

    <!-- TEST CARDS -->
    <section class="test-cards-section">
        <div class="container">
            <div class="test-grid">
                <!-- IELTS -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon purple-bg">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/></svg>
                        </div>
                        <h2 class="test-name">IELTS</h2>
                    </div>
                    <p class="test-desc">Comprehensive English language proficiency test prep.</p>
                    <ul class="test-features">
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;color:#6c3fff;"><polyline points="20 6 9 17 4 12"></polyline></svg> 40+ Full Mock Tests</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;color:#6c3fff;"><polyline points="20 6 9 17 4 12"></polyline></svg> Band 8+ Mentorship</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;color:#6c3fff;"><polyline points="20 6 9 17 4 12"></polyline></svg> Speaking & Writing Reviews</li>
                    </ul>
                    <button class="btn-start" onclick="location.href='prep-center.php'">Start Preparation</button>
                </div>

                <!-- GRE -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon purple-bg">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18"/><path d="M6 6l12 12"/></svg>
                        </div>
                        <h2 class="test-name">GRE</h2>
                    </div>
                    <p class="test-desc">Master quantitative and verbal reasoning for grad school.</p>
                    <ul class="test-features">
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;color:#6c3fff;"><polyline points="20 6 9 17 4 12"></polyline></svg> 3000+ Practice Questions</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;color:#6c3fff;"><polyline points="20 6 9 17 4 12"></polyline></svg> Adaptive Learning Algorithm</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;color:#6c3fff;"><polyline points="20 6 9 17 4 12"></polyline></svg> Detailed Score Analytics</li>
                    </ul>
                    <button class="btn-start" onclick="location.href='prep-center.php'">Start Preparation</button>
                </div>

                <!-- TOEFL -->
                <div class="test-card">
                    <div class="test-header">
                        <div class="test-icon purple-bg">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3z"/><path d="M3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
                        </div>
                        <h2 class="test-name">TOEFL</h2>
                    </div>
                    <p class="test-desc">Internet-based test preparation for US universities.</p>
                    <ul class="test-features">
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;color:#6c3fff;"><polyline points="20 6 9 17 4 12"></polyline></svg> Real Exam Interface Simulation</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;color:#6c3fff;"><polyline points="20 6 9 17 4 12"></polyline></svg> Expert Graded Essays</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px;color:#6c3fff;"><polyline points="20 6 9 17 4 12"></polyline></svg> Integrated Task Strategies</li>
                    </ul>
                    <button class="btn-start" onclick="location.href='prep-center.php'">Start Preparation</button>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY PREPARE -->
    <section class="why-prepare-section">
        <div class="container glass-card">
            <h2 class="section-title">Why Prepare With Us?</h2>
            <p class="section-subtitle">Our structured approach ensures you reach your target score efficiently.</p>
            
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <h3 class="feature-title">Flexible Scheduling</h3>
                    <p class="feature-desc">Access recorded lectures and practice materials 24/7. Study at your own pace from anywhere in the world.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    </div>
                    <h3 class="feature-title">Certified Instructors</h3>
                    <p class="feature-desc">Learn from top-percentile scorers and certified examiners who know the tests inside and out.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                    </div>
                    <h3 class="feature-title">Score Improvement Guarantee</h3>
                    <p class="feature-desc">We are confident in our methods. If your score doesn't improve, get access to additional coaching for free.</p>
                </div>
            </div>
        </div>
    </section>

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


