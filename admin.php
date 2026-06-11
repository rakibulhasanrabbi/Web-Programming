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
    <title>Admin Dashboard - Abrovia</title>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<div class="admin-layout">
    <!-- ========== NAVBAR ========== -->
    <?php require_once 'includes/header.php'; ?>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="admin-sidebar">
        <div class="sidebar-top">
            <div class="sidebar-logo" style="display: flex; align-items: center; gap: 10px; margin-bottom: 30px;">
                <div style="color: #7c3aed;"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" transform="rotate(45 12 12)"/><rect x="4" y="19" width="16" height="2" rx="1"/></svg></div>
                <div class="logo-icon-wrap" style="display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; color: #7c3aed;"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" transform="rotate(45 12 12)"/><rect x="4" y="19" width="16" height="2" rx="1"/></svg></div>
                <div>
                    <span class="logo-name">Abrovia</span>
                    <span class="logo-sub">Global Education Portal</span>
                </div>
            </div>
            <nav class="sidebar-nav">
                <a href="dashboard.php" class="nav-item active" id="admin-nav-dashboard">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    Dashboard</a>
                <a href="#" class="nav-item" id="admin-nav-programs">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    Manage Programs
                </a>
                <a href="#" class="nav-item" id="admin-nav-scholarships">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    Manage Scholarships
                </a>
                <a href="#" class="nav-item" id="admin-nav-users">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Users
                </a>
            </nav>
        </div>
        <div class="sidebar-bottom-nav">
            <a href="#" class="nav-item" id="admin-nav-support">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                Support
            </a>
            <a href="auth/logout.php" class="nav-item" id="admin-nav-logout">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </a>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main-area">

        <main class="main-content">
            <!-- STATS ROW -->
            <section class="stats-row" id="stats-row">
                <div class="stat-card" id="stat-users">
                    <div class="stat-top">
                        <div class="stat-icon blue">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <span class="stat-badge green">↗ +12%</span>
                    </div>
                    <div class="stat-value">14,205</div>
                    <div class="stat-label">Total Users</div>
                </div>
                <div class="stat-card" id="stat-applications">
                    <div class="stat-top">
                        <div class="stat-icon purple">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        </div>
                        <span class="stat-badge green">↗ +8.4%</span>
                    </div>
                    <div class="stat-value">3,842</div>
                    <div class="stat-label">Active Applications</div>
                </div>
                <div class="stat-card" id="stat-programs">
                    <div class="stat-top">
                        <div class="stat-icon teal">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </div>
                        <span class="stat-badge neutral">←’ 0%</span>
                    </div>
                    <div class="stat-value">284</div>
                    <div class="stat-label">Active Programs</div>
                </div>
            </section>

            <!-- MIDDLE ROW: Chart + Activity -->
            <section class="middle-row">
                <!-- Chart -->
                <div class="chart-card" id="chart-card">
                    <div class="chart-header">
                        <div>
                            <h2 class="chart-title">Application Trends</h2>
                            <p class="chart-subtitle">Monthly application submissions</p>
                        </div>
                        <span class="chart-period">Last 6 Months</span>
                    </div>
                    <div class="chart-area">
                        <svg class="line-chart" viewBox="0 0 500 200" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="chartGrad" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="rgba(168,85,247,0.3)"/>
                                    <stop offset="100%" stop-color="rgba(168,85,247,0)"/>
                                </linearGradient>
                            </defs>
                            <!-- Grid lines -->
                            <line x1="0" y1="40" x2="500" y2="40" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                            <line x1="0" y1="80" x2="500" y2="80" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                            <line x1="0" y1="120" x2="500" y2="120" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                            <line x1="0" y1="160" x2="500" y2="160" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                            <!-- Fill area -->
                            <path d="M0,150 L83,130 L166,140 L250,100 L333,110 L416,60 L500,70 L500,200 L0,200 Z" fill="url(#chartGrad)"/>
                            <!-- Line -->
                            <polyline points="0,150 83,130 166,140 250,100 333,110 416,60 500,70" fill="none" stroke="#a855f7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <!-- Dots -->
                            <circle cx="0" cy="150" r="4" fill="#a855f7"/>
                            <circle cx="83" cy="130" r="4" fill="#a855f7"/>
                            <circle cx="166" cy="140" r="4" fill="#a855f7"/>
                            <circle cx="250" cy="100" r="4" fill="#a855f7"/>
                            <circle cx="333" cy="110" r="4" fill="#a855f7"/>
                            <circle cx="416" cy="60" r="5" fill="#a855f7" stroke="#fff" stroke-width="2"/>
                            <circle cx="500" cy="70" r="4" fill="#a855f7"/>
                        </svg>
                        <div class="chart-labels">
                            <span>JAN</span><span>FEB</span><span>MAR</span><span>APR</span><span class="active">MAY</span><span>JUN</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="activity-card" id="activity-card">
                    <div class="activity-header">
                        <h2 class="activity-title">Recent Activity</h2>
                        <a href="programs.php" class="view-all-link">View All</a>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-dot blue"></div>
                            <div class="activity-info">
                                <p class="activity-text"><strong>Alex Johnson</strong> submitted a new application for <strong>BSc Computer Science.</strong></p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-dot purple"></div>
                            <div class="activity-info">
                                <p class="activity-text"><strong>Program Updated:</strong> MSc Data Science requirements modified by <strong>Admin Sarah.</strong></p>
                                <span class="activity-time">5 hours ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-dot green"></div>
                            <div class="activity-info">
                                <p class="activity-text"><strong>Scholarship Approved:</strong> Global Excellence Award for 3 students.</p>
                                <span class="activity-time">Yesterday, 14:30</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-dot yellow"></div>
                            <div class="activity-info">
                                <p class="activity-text"><strong>System Alert:</strong> High traffic detected on Application Portal.</p>
                                <span class="activity-time">Yesterday, 09:15</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-dot pink"></div>
                            <div class="activity-info">
                                <p class="activity-text">New support ticket opened by <strong>User #4920</strong> regarding visa requirements.</p>
                                <span class="activity-time">2 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- BOTTOM ROW -->
            <section class="bottom-row">
                <div class="campaign-card" id="campaign-card">
                    <span class="campaign-badge">Active Campaign</span>
                    <div class="campaign-title">Fall 2024</div>
                    <span class="campaign-ends">Ends in 45 days</span>
                </div>
                <div class="destination-card" id="destination-card">
                    <span class="dest-label">Top Destination</span>
                    <div class="dest-content">
                        <div class="dest-globe">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        </div>
                        <div>
                            <div class="dest-name">United Kingdom</div>
                            <span class="dest-growth">+15% this month</span>
                        </div>
                    </div>
                </div>
                <div class="export-card" id="export-card">
                    <div class="export-text">
                        <h3 class="export-title">Need to export reports?</h3>
                        <p class="export-desc">Generate comprehensive CSV reports for all current applications and user data.</p>
                    </div>
                    <a href="#" class="btn-export" id="btn-export">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        Export Data
                    </a>
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


