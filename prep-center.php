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
    <title>Prep Center - Abrovia</title>
    <link rel="stylesheet" href="assets/css/prep-center.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- ========== NAVBAR ========== -->
    <?php require_once 'includes/header.php'; ?>

    <!-- PAGE LAYOUT -->
    <div class="page-layout">
        
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <h2 class="sidebar-title">PREPARATION</h2>
                <p class="sidebar-subtitle">ACADEMIC READINESS</p>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="#" class="sidebar-link"><span class="nav-icon">âŠž</span> OVERVIEW</a></li>
                    <li><a href="#" class="sidebar-link active"><span class="nav-icon">ðŸŽ¯</span> SKILL TRACKS</a></li>
                    <li><a href="#" class="sidebar-link"><span class="nav-icon">ðŸ–‹ï¸ </span> WRITING LAB</a></li>
                    <li><a href="#" class="sidebar-link"><span class="nav-icon">ðŸ“š</span> RESOURCES</a></li>
                </ul>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <header class="content-header">
                <h1 class="page-title">Skills & Research Preparation</h1>
                <p class="page-subtitle">Build the foundational competencies required to excel in top-tier academic institutions globally. Track your progress across essential research, writing, and communication domains.</p>
            </header>

            <!-- CORE SKILL TRACKS -->
            <section class="tracks-section">
                <h2 class="section-title">Core Skill Tracks</h2>
                <div class="tracks-grid">
                    <!-- Research Skills -->
                    <div class="track-card">
                        <div class="card-header">
                            <div class="card-icon purple-bg">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 0-2.72 8.82-8.05 10.88A22 22 0 0 1 12 15z"/></svg>
                            </div>
                            <span class="status-badge orange-text">In Progress</span>
                        </div>
                        <h3 class="track-name">Research Skills</h3>
                        <p class="track-desc">Master literature reviews, methodology design, and data analysis frameworks.</p>
                        <div class="progress-container">
                            <div class="progress-info">
                                <span class="completion-label">Completion</span>
                                <span class="completion-value">45%</span>
                            </div>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" style="width: 45%;"></div>
                            </div>
                        </div>
                        <button class="btn-action primary">Continue Track</button>
                    </div>

                    <!-- Academic Writing -->
                    <div class="track-card">
                        <div class="card-header">
                            <div class="card-icon blue-bg">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                            </div>
                            <span class="status-badge gray-text">Not Started</span>
                        </div>
                        <h3 class="track-name">Academic Writing</h3>
                        <p class="track-desc">Develop clear, cohesive arguments and master academic citation standards.</p>
                        <div class="progress-container">
                            <div class="progress-info">
                                <span class="completion-label">Completion</span>
                                <span class="completion-value">0%</span>
                            </div>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" style="width: 0%;"></div>
                            </div>
                        </div>
                        <button class="btn-action secondary">Start Track</button>
                    </div>

                    <!-- Communication -->
                    <div class="track-card">
                        <div class="card-header">
                            <div class="card-icon indigo-bg">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <span class="status-badge green-text">Completed</span>
                        </div>
                        <h3 class="track-name">Communication</h3>
                        <p class="track-desc">Refine presentation skills, seminar participation, and intercultural dialogue.</p>
                        <div class="progress-container">
                            <div class="progress-info">
                                <span class="completion-label">Completion</span>
                                <span class="completion-value">100%</span>
                            </div>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar success" style="width: 100%;"></div>
                            </div>
                        </div>
                        <button class="btn-action tertiary">Review Materials</button>
                    </div>
                </div>
            </section>

            <!-- ESSENTIAL RESOURCES -->
            <section class="resources-section">
                <div class="section-header">
                    <h2 class="section-title">Essential Resources</h2>
                    <a href="#" class="view-all">View All ←’</a>
                </div>
                <div class="resources-grid">
                    <div class="resource-card">
                        <div class="resource-visual purple-bg">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        </div>
                        <div class="resource-info">
                            <h3 class="resource-title">Effective Citation Guide</h3>
                            <p class="resource-desc">A comprehensive breakdown of APA, MLA, and Chicago styles for global...</p>
                        </div>
                    </div>
                    <div class="resource-card">
                        <div class="resource-visual blue-bg">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21a9 9 0 0 0 9-9c0-1.49-.36-2.9-1-4.14M12 3a9 9 0 0 1 9 9"/><path d="M21 3L3 21"/><path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0-6 0"/></svg>
                        </div>
                        <div class="resource-info">
                            <h3 class="resource-title">Scientific Methodology</h3>
                            <p class="resource-desc">Structuring your lab reports and understanding peer-review processes.</p>
                        </div>
                    </div>
                    <div class="resource-card">
                        <div class="resource-visual green-bg">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 5L6 9H2v6h4l5 4V5z"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>
                        </div>
                        <div class="resource-info">
                            <h3 class="resource-title">Public Speaking</h3>
                            <p class="resource-desc">Techniques for delivering compelling academic presentations and defending...</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
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


