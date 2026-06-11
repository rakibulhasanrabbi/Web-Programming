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
    <title>AI Profile Evaluation - Abrovia</title>
    <link rel="stylesheet" href="assets/css/ai-evaluation.css">
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
                
                <div class="brand-text">
                    <h2 class="brand-name">Abrovia Portal</h2>
                    <p class="brand-subtitle">Global Education Engine</p>
                </div>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="dashboard.php" class="sidebar-link"><span class="nav-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></span> Dashboard</a></li>
                    <li><a href="ai-evaluation.php" class="sidebar-link active"><span class="nav-icon"></span> AI Evaluation</a></li>
                    <li><a href="application-details.php" class="sidebar-link"><span class="nav-icon"></span> Documents</a></li>
                    <li><a href="auth/logout.php" class="sidebar-link"><span class="nav-icon"></span> Applications</a></li>
                    <li><a href="#" class="sidebar-link"><span class="nav-icon"> </span> Global Community</a></li>
                </ul>
            </nav>

            <div class="sidebar-bottom">
                <button class="btn-upgrade">Upgrade to Premium</button>
                <ul class="bottom-links">
                    <li><a href="#" class="bottom-link"><span class="nav-icon"></span> Help Center</a></li>
                    <li><a href="login.php" class="bottom-link"><span class="nav-icon"></span> Sign Out</a></li>
                </ul>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            <header class="content-header">
                <h1 class="page-title">AI Profile Evaluation</h1>
                <p class="page-subtitle">Comprehensive analysis of your academic and extracurricular profile.</p>
            </header>

            <!-- QUICK STATS BAR -->
            <section class="stats-bar-section">
                <div class="stats-bar">
                    <div class="stat-item">
                        <div class="stat-icon-wrap purple">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">GPA</span>
                            <span class="stat-value">3.8<span class="muted">/4.0</span></span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon-wrap blue">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/></svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">IELTS</span>
                            <span class="stat-value">7.5</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon-wrap green">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">SKILLS</span>
                            <span class="stat-value truncate">Python, Research...</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon-wrap yellow">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">EXPERIENCE</span>
                            <span class="stat-value">2 Internships</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- EVALUATION GRID -->
            <section class="evaluation-section">
                <div class="evaluation-grid">
                    <!-- Profile Strength -->
                    <div class="eval-card gauge-card">
                        <h3 class="card-title-hidden">Profile Strength</h3>
                        <p class="card-label-top">Profile Strength</p>
                        <div class="gauge-wrap">
                            <svg class="gauge-svg" viewBox="0 0 100 100">
                                <circle class="gauge-bg" cx="50" cy="50" r="40"></circle>
                                <circle class="gauge-value" cx="50" cy="50" r="40" style="stroke-dashoffset: calc(251.2 - (251.2 * 78) / 100);"></circle>
                            </svg>
                            <div class="gauge-text">
                                <span class="gauge-number">78</span>
                                <span class="gauge-percent">%</span>
                            </div>
                        </div>
                        <p class="gauge-desc">Your profile is highly competitive for top 50 global universities.</p>
                    </div>

                    <!-- Key Strengths -->
                    <div class="eval-card list-card">
                        <div class="card-header-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                            <h3 class="eval-card-title">Key Strengths</h3>
                        </div>
                        <div class="eval-items">
                            <div class="eval-item-box success-bg">
                                <div class="item-header">
                                    <span class="check-circle">✓</span>
                                    <h4 class="item-title">Exceptional Academic Record</h4>
                                </div>
                                <p class="item-desc">High GPA demonstrates consistent academic rigor.</p>
                            </div>
                            <div class="eval-item-box success-bg">
                                <div class="item-header">
                                    <span class="check-circle">✓</span>
                                    <h4 class="item-title">Strong Language Proficiency</h4>
                                </div>
                                <p class="item-desc">IELTS 7.5 meets requirements for elite programs.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Areas for Growth -->
                    <div class="eval-card list-card">
                        <div class="card-header-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                            <h3 class="eval-card-title">Areas for Growth</h3>
                        </div>
                        <div class="eval-items">
                            <div class="eval-item-box warning-bg">
                                <div class="item-header">
                                    <span class="info-circle">!</span>
                                    <h4 class="item-title">Limited Research Publications</h4>
                                </div>
                                <p class="item-desc">Lack of published papers slightly weakens STEM applications.</p>
                            </div>
                            <div class="eval-item-box warning-bg">
                                <div class="item-header">
                                    <span class="info-circle">!</span>
                                    <h4 class="item-title">Niche Extracurriculars</h4>
                                </div>
                                <p class="item-desc">Need more broad leadership roles to show versatility.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- AI TAILORED ADVICE -->
            <section class="advice-section">
                <h2 class="section-title">AI Tailored Advice</h2>
                <div class="advice-grid">
                    <div class="advice-card">
                        <div class="advice-icon purple-light">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                        </div>
                        <h3 class="advice-title">Retake IELTS for 8.0+</h3>
                        <p class="advice-desc">Pushing your score to 8.0 opens doors to hyper-competitive scholarships.</p>
                        <a href="test-prep.php" class="advice-link">View Resources ←’</a>
                    </div>
                    <div class="advice-card">
                        <div class="advice-icon blue-light">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21a9 9 0 0 0 9-9c0-1.49-.36-2.9-1-4.14M12 3a9 9 0 0 1 9 9"/><path d="M21 3L3 21"/></svg>
                        </div>
                        <h3 class="advice-title">Seek Research Roles</h3>
                        <p class="advice-desc">Apply for assistantships in your current university to build a publication record.</p>
                        <a href="test-prep.php" class="advice-link">Find Opportunities ←’</a>
                    </div>
                    <div class="advice-card">
                        <div class="advice-icon green-light">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                        </div>
                        <h3 class="advice-title">Data Science Cert</h3>
                        <p class="advice-desc">Complete a recognized certification to quantify your Python and analytical skills.</p>
                        <a href="test-prep.php" class="advice-link">Explore Courses ←’</a>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- ========== FOOTER ========== -->
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


