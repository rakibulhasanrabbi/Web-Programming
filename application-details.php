<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once 'config/database.php';

$userId = $_SESSION['user_id'];
$appId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($appId) {
    $stmt = $pdo->prepare("SELECT * FROM applications WHERE user_id = ? AND id = ?");
    $stmt->execute([$userId, $appId]);
} else {
    $stmt = $pdo->prepare("SELECT * FROM applications WHERE user_id = ? ORDER BY applied_at DESC LIMIT 1");
    $stmt->execute([$userId]);
}
$application = $stmt->fetch(PDO::FETCH_ASSOC);

$hasApplication = $application ? true : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details - Abrovia</title>
    <link rel="stylesheet" href="assets/css/application-details.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- ========== NAVBAR ========== -->
    <?php require_once 'includes/header.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="page-content">
        <div class="content-container">

            <?php if (!$hasApplication): ?>
            <!-- EMPTY STATE -->
            <div style="text-align: center; padding: 80px 20px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.2); margin-top: 40px;">
                <div style="width: 80px; height: 80px; background: rgba(108, 63, 255, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; color: var(--accent);">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
                </div>
                <h2 style="font-size: 1.8rem; font-weight: 700; margin-bottom: 12px; color: var(--text-primary);">No Applications Yet</h2>
                <p style="font-size: 0.95rem; color: var(--text-secondary); max-width: 400px; margin: 0 auto 32px; line-height: 1.6;">You haven't started any applications. Explore our programs and start your journey today.</p>
                <a href="application-form.php" style="display: inline-block; padding: 12px 32px; font-size: 0.95rem; font-weight: 600; color: #fff; background: var(--accent); border-radius: 999px; box-shadow: 0 4px 16px var(--accent-glow); transition: all 0.3s ease; text-decoration: none;">Start New Application</a>
            </div>
            <?php else: ?>

            <!-- Back Link -->
            <a href="dashboard.php" class="back-link" id="back-to-apps">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back to Dashboard</a>

            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 40px; flex-wrap: wrap; gap: 20px;">
                <!-- Page Header -->
                <div class="page-header" style="margin-bottom: 0;">
                    <div class="header-left">
                        <h1 class="page-title"><?php echo htmlspecialchars($application['university_name']); ?></h1>
                        <p class="page-subtitle"><?php echo htmlspecialchars($application['program_name']); ?></p>
                    </div>
                </div>
                <div class="header-right" style="display: flex; gap: 16px; align-items: center;">
                    <div class="info-box" style="margin-bottom: 0;">
                        <span class="info-label">STATUS</span>
                        <span class="info-value" style="color: var(--accent); text-transform: uppercase;"><?php echo htmlspecialchars($application['status']); ?></span>
                    </div>
                    <a href="application-form.php" style="padding: 10px 20px; font-size: 0.85rem; font-weight: 600; color: #fff; background: var(--bg-card); border: 1px solid var(--border); border-radius: 8px; transition: all 0.3s ease; text-decoration: none;">+ Apply for Another</a>
                </div>
            </div>

            <!-- Application Status -->
            <section class="status-card" id="status-card">
                <h2 class="card-heading">Application Status</h2>
                <div class="status-tracker">
                    <div class="track-step completed">
                        <div class="track-dot">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <div class="track-line filled"></div>
                        <span class="track-label">Submitted</span>
                        <span class="track-date"><?php echo date('M d', strtotime($application['applied_at'])); ?></span>
                    </div>
                    <div class="track-step current">
                        <div class="track-dot">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="#fff"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                        </div>
                        <div class="track-line"></div>
                        <span class="track-label highlight">Reviewing</span>
                        <span class="track-date highlight">Current Stage</span>
                    </div>
                    <div class="track-step upcoming">
                        <div class="track-dot">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <div class="track-line"></div>
                        <span class="track-label">Interview</span>
                        <span class="track-date">Pending</span>
                    </div>
                    <div class="track-step upcoming last">
                        <div class="track-dot">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                        </div>
                        <span class="track-label">Decision</span>
                        <span class="track-date">Pending</span>
                    </div>
                </div>
            </section>

            <!-- Bottom Grid: Documents + Timeline -->
            <section class="bottom-grid">
                <!-- Submitted Documents -->
                <div class="docs-card" id="docs-card">
                    <div class="card-header-row">
                        <h2 class="card-heading">Submitted Documents</h2>
                        <button class="btn-upload" id="btn-upload">+ Upload</button>
                    </div>
                    <div class="docs-grid">
                        <div class="doc-item" id="doc-1">
                            <div class="doc-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            </div>
                            <div class="doc-info">
                                <span class="doc-name">Official Transcript</span>
                                <span class="doc-status verified">● Verified</span>
                            </div>
                            <button class="doc-download" aria-label="Download">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                            </button>
                        </div>
                        <div class="doc-item" id="doc-2">
                            <div class="doc-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            </div>
                            <div class="doc-info">
                                <span class="doc-name">IELTS Score Report</span>
                                <span class="doc-status verified">● Verified</span>
                            </div>
                            <button class="doc-download" aria-label="Download">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                            </button>
                        </div>
                        <div class="doc-item" id="doc-3">
                            <div class="doc-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            </div>
                            <div class="doc-info">
                                <span class="doc-name">Statement of Purpose</span>
                                <span class="doc-status review">● Under Review</span>
                            </div>
                            <button class="doc-download" aria-label="Download">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                            </button>
                        </div>
                        <div class="doc-item" id="doc-4">
                            <div class="doc-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            </div>
                            <div class="doc-info">
                                <span class="doc-name">Passport Copy</span>
                                <span class="doc-status verified">● Verified</span>
                            </div>
                            <button class="doc-download" aria-label="Download">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="timeline-card" id="timeline-card">
                    <h2 class="card-heading">Timeline</h2>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="tl-dot active"></div>
                            <div class="tl-line"></div>
                            <div class="tl-content">
                                <span class="tl-date active">Recent Update</span>
                                <h4 class="tl-title">Under Faculty Review</h4>
                                <p class="tl-desc">Your application has passed initial screening and is now being reviewed by the department faculty.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="tl-dot"></div>
                            <div class="tl-line"></div>
                            <div class="tl-content">
                                <span class="tl-date">Previous</span>
                                <h4 class="tl-title">Document Verification Complete</h4>
                                <p class="tl-desc">All required documents have been successfully verified by the admissions office.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="tl-dot"></div>
                            <div class="tl-content">
                                <span class="tl-date"><?php echo date('M d, Y', strtotime($application['applied_at'])); ?></span>
                                <h4 class="tl-title">Application Submitted</h4>
                                <p class="tl-desc">Application was submitted successfully.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <?php endif; ?>

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
