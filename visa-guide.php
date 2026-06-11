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
    <title>Visa Guidance - Abrovia</title>
    <link rel="stylesheet" href="assets/css/visa-guide.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <?php require_once 'includes/header.php'; ?>

    <!-- SIDEBAR + MAIN CONTENT -->
    <div class="page-layout">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2 class="sidebar-title">Visa Center</h2>
                <p class="sidebar-subtitle">Global Guidance</p>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="#" class="sidebar-link active" data-target="overview"><span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></span> Overview</a></li>
                    <li><a href="#" class="sidebar-link" data-target="documents"><span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></span> Documents</a></li>
                    <li><a href="#" class="sidebar-link" data-target="application"><span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg></span> Application</a></li>
                    <li><a href="#" class="sidebar-link" data-target="interview"><span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span> Interview</a></li>
                    <li><a href="#" class="sidebar-link" data-target="tracking"><span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg></span> Tracking</a></li>
                </ul>
            </nav>
            <button class="btn-consultation">Expert Consultation</button>
        </aside>

        <!-- MAIN AREA -->
        <main class="main-content">
            <!-- HERO -->
            <header class="hero">
                <h1 class="hero-title">Global Visa Guidance</h1>
                <p class="hero-subtitle">Navigate the complex world of student visas with confidence. We provide step-by-step support to ensure your application is successful.</p>
            </header>

            <!-- THE PROCESS -->
            <section class="process-section">
                <h2 class="section-title">The Process</h2>
                <div class="process-grid">
                    <div class="process-card">
                        <div class="card-icon-wrap purple-glow">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        </div>
                        <h3 class="step-title">Step 1:<br>Document Prep</h3>
                        <p class="step-desc">Gather and verify all necessary paperwork required by your destination country.</p>
                    </div>
                    <div class="process-card">
                        <div class="card-icon-wrap pink-glow">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </div>
                        <h3 class="step-title">Step 2:<br>Appointment</h3>
                        <p class="step-desc">Schedule your biometric and consulate appointments efficiently.</p>
                    </div>
                    <div class="process-card">
                        <div class="card-icon-wrap blue-glow">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <h3 class="step-title">Step 3:<br>Interview</h3>
                        <p class="step-desc">Prepare with our expert mock interviews and confidence-building sessions.</p>
                    </div>
                    <div class="process-card">
                        <div class="card-icon-wrap green-glow">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <h3 class="step-title">Step 4:<br>Approval</h3>
                        <p class="step-desc">Receive your visa and start planning your journey abroad.</p>
                    </div>
                </div>
            </section>

            <!-- REQUIRED DOCUMENTS -->
            <section class="documents-section">
                <div class="documents-container">
                    <div class="documents-header">
                        <h2 class="section-title">Required Documents</h2>
                        <span class="badge-prep">Standard Prep</span>
                    </div>
                    <div class="checklist">
                        <div class="checklist-item checked">
                            <div class="check-box">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <p class="item-text">Valid Passport (min. 6 months validity)</p>
                            <span class="info-icon">i</span>
                        </div>
                        <div class="checklist-item active">
                            <div class="check-box"></div>
                            <p class="item-text">University Admission Letter (Unconditional)</p>
                            <span class="info-icon">i</span>
                        </div>
                        <div class="checklist-item">
                            <div class="check-box"></div>
                            <p class="item-text">Proof of Financial Funds (Bank statements)</p>
                            <span class="info-icon">i</span>
                        </div>
                        <div class="checklist-item">
                            <div class="check-box"></div>
                            <p class="item-text">Language Proficiency Scores (IELTS/TOEFL)</p>
                            <span class="info-icon">i</span>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

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

    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            sidebarLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
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


