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
    <meta name="description" content="Abrovia - Your global education journey starts here. Find universities, scholarships, and study abroad programs.">
    <title>Abrovia - Dream Abroad? We Prepare You Every Step</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- ========== NAVBAR ========== -->
    <?php require_once 'includes/header.php'; ?>

    <!-- ========== HERO SECTION ========== -->
    <section class="hero" id="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Dream <span class="hero-highlight">Abroad?</span><br>
                    We Prepare You Every Step
                </h1>
                <p class="hero-description">
                    Your global education journey starts here. From finding the perfect university to securing scholarships and visas, we simplify the complex process of studying abroad.
                </p>
                <div class="hero-buttons">
                    <a href="programs.php" class="btn-primary" id="btn-explore-programs">
                        Explore Programs
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="signup.php" class="btn-secondary" id="btn-get-started">Get Started</a>
                </div>
            </div>
            <div class="hero-image">
                <!-- Image placeholder -->
                <div class="hero-image-placeholder">
                    <div class="floating-card">
                        <div class="floating-card-icon">✓</div>
                        <div class="floating-card-text">
                            <span class="floating-card-label">ADMISSION</span>
                            <span class="floating-card-status">ACCEPTED</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-gradient-line"></div>
    </section>

    <!-- ========== FEATURES SECTION ========== -->
    <section class="features" id="features">
        <div class="features-container">
            <div class="features-header">
                <h2 class="features-title">Everything You Need</h2>
                <p class="features-subtitle">A comprehensive suite of tools to guide your international education journey.</p>
            </div>
            <div class="features-grid">
                <!-- Feature 1 -->
                <div class="feature-card" id="feature-loans">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                        </svg>
                    </div>
                    <h3 class="feature-card-title">Loans & Global Dreams</h3>
                    <p class="feature-card-desc">Navigate international student loans and financial planning with ease.</p>
                </div>
                <!-- Feature 2 -->
                <div class="feature-card" id="feature-scholarship">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                        </svg>
                    </div>
                    <h3 class="feature-card-title">Scholarship Matching</h3>
                    <p class="feature-card-desc">AI-driven matching to find funding opportunities you qualify for.</p>
                </div>
                <!-- Feature 3 -->
                <div class="feature-card" id="feature-university">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 21h18M5 21V7l7-4 7 4v14"/>
                            <path d="M9 21v-6h6v6M9 9h.01M15 9h.01M9 13h.01M15 13h.01"/>
                        </svg>
                    </div>
                    <h3 class="feature-card-title">University Finder</h3>
                    <p class="feature-card-desc">Discover institutions that perfectly align with your academic goals.</p>
                </div>
                <!-- Feature 4 -->
                <div class="feature-card" id="feature-testprep">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                        </svg>
                    </div>
                    <h3 class="feature-card-title">Test Prep</h3>
                    <p class="feature-card-desc">Resources and guidance for IELTS, TOEFL, GRE, and GMAT preparation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== FEATURED OPPORTUNITIES ========== -->
    <section class="opportunities" id="opportunities">
        <div class="opportunities-container">
            <div class="opportunities-header">
                <div>
                    <h2 class="opportunities-title">Featured Opportunities</h2>
                    <p class="opportunities-subtitle">Explore top programs and scholarships available right now.</p>
                </div>
                <a href="programs.php" class="view-all-link" id="view-all-link">View All ←’</a>
            </div>
            <div class="opportunities-grid">
                <!-- Card 1 -->
                <div class="opportunity-card" id="opportunity-1">
                    <div class="opportunity-image">
                        <span class="opportunity-badge">Grants</span>
                        <!-- Image placeholder -->
                    </div>
                    <div class="opportunity-content">
                        <h3 class="opportunity-card-title">Global Leaders Fellowship</h3>
                        <p class="opportunity-card-desc">Fully-funded master's program with full tuition and living stipend coverage.</p>
                        <div class="opportunity-meta">
                            <span class="opportunity-meta-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                Ends Oct 15
                            </span>
                            <span class="opportunity-meta-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                UK
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="opportunity-card" id="opportunity-2">
                    <div class="opportunity-image">
                        <!-- Image placeholder -->
                    </div>
                    <div class="opportunity-content">
                        <h3 class="opportunity-card-title">Innovation Tech Grant</h3>
                        <p class="opportunity-card-desc">A leading tech program offering full-ride tuition reduction for international students.</p>
                        <div class="opportunity-meta">
                            <span class="opportunity-meta-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                Ends Nov 01
                            </span>
                            <span class="opportunity-meta-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                Canada
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="opportunity-card" id="opportunity-3">
                    <div class="opportunity-image">
                        <!-- Image placeholder -->
                    </div>
                    <div class="opportunity-content">
                        <h3 class="opportunity-card-title">Pacific Research Award</h3>
                        <p class="opportunity-card-desc">With specific grants for international doctoral students with full tuition waiver.</p>
                        <div class="opportunity-meta">
                            <span class="opportunity-meta-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                Ends Dec 10
                            </span>
                            <span class="opportunity-meta-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                Australia
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CTA / GOT QUESTIONS ========== -->
    <section class="cta-section" id="cta-section">
        <div class="cta-container">
            <h2 class="cta-title">Got Questions?</h2>
            <p class="cta-description">Our advisors are ready to help you navigate your study abroad journey.</p>
            <a href="#" class="btn-contact" id="btn-contact">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                </svg>
                Contact Us
            </a>
        </div>
    </section>

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


