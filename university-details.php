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
    <title>Imperial College London - Abrovia</title>
    <link rel="stylesheet" href="assets/css/university-details.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <?php require_once 'includes/header.php'; ?>

    <!-- HERO BANNER -->
    <section class="hero-banner" id="hero-banner">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-badges">
                <span class="hero-badge"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> London, UK</span>
                <span class="hero-badge">★ QS World Ranking: #2</span>
            </div>
            <h1 class="hero-title">Imperial College London</h1>
            <p class="hero-desc">A world-class institution focusing exclusively on science, engineering, medicine, and business.</p>
            <a href="#" class="btn-apply" id="btn-apply-now">Apply Now <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        </div>
    </section>

    <!-- ABOUT + KEY HIGHLIGHTS -->
    <section class="about-section" id="about-section">
        <div class="about-container">
            <div class="about-left">
                <h2 class="section-title">About the University</h2>
                <p class="about-text">Imperial College London is a public research university in London. Imperial grew out of Prince Albert's vision of an area for culture, including the Royal Albert Hall, Victoria & Albert Museum, Natural History Museum, and several royal colleges.</p>
                <p class="about-text">In 1907, Imperial College was established by royal charter, merging the Royal College of Science, Royal School of Mines, and City and Guilds College. The university focused exclusively on science, technology, medicine, and business, emphasizing practical applications in industry and global challenges.</p>
            </div>
            <div class="about-right">
                <div class="highlights-card">
                    <h3 class="highlights-title">Key Highlights</h3>
                    <div class="highlight-item">
                        <div class="highlight-icon purple">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                        </div>
                        <div>
                            <h4 class="highlight-name">Research Excellence</h4>
                            <p class="highlight-desc">Consistently ranked among the top research institutions globally.</p>
                        </div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-icon blue">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        </div>
                        <div>
                            <h4 class="highlight-name">Global Community</h4>
                            <p class="highlight-desc">Students and staff from over 140 countries.</p>
                        </div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-icon green">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <div>
                            <h4 class="highlight-name">Career Support</h4>
                            <p class="highlight-desc">Strong industry links and dedicated career services.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- POPULAR PROGRAMS -->
    <section class="programs-section" id="programs-section">
        <div class="programs-container">
            <div class="programs-header">
                <h2 class="section-title">Popular Programs</h2>
                <a href="programs.php" class="view-all-link" id="view-all-programs">View All Programs ←’</a>
            </div>
            <div class="programs-grid">
                <div class="program-card" id="prog-cs">
                    <div class="program-tags">
                        <span class="prog-tag purple">MSc</span>
                        <span class="prog-duration">0.1 Year</span>
                    </div>
                    <h3 class="program-name">Computer Science</h3>
                    <p class="program-desc">Advanced study in computing with specialisations in AI, software engineering, and data science.</p>
                    <a href="#" class="btn-view">View Details</a>
                </div>
                <div class="program-card" id="prog-mech">
                    <div class="program-tags">
                        <span class="prog-tag blue">MEng</span>
                        <span class="prog-duration">0.3 Years</span>
                    </div>
                    <h3 class="program-name">Mechanical Engineering</h3>
                    <p class="program-desc">Comprehensive foundation in engineering principles with hands-on project experience.</p>
                    <a href="#" class="btn-view">View Details</a>
                </div>
                <div class="program-card" id="prog-mba">
                    <div class="program-tags">
                        <span class="prog-tag green">MBA</span>
                        <span class="prog-duration">0.1 Year</span>
                    </div>
                    <h3 class="program-name">Business Administration</h3>
                    <p class="program-desc">Develop leadership skills and business acumen for global career opportunities.</p>
                    <a href="#" class="btn-view">View Details</a>
                </div>
            </div>
        </div>
    </section>

    <!-- COSTS + ADMISSION -->
    <section class="info-section" id="info-section">
        <div class="info-container">
            <!-- Estimated Costs -->
            <div class="costs-card" id="costs-card">
                <h2 class="section-title">Estimated Costs</h2>
                <p class="info-subtitle">Annual estimates for International students.</p>
                <div class="cost-rows">
                    <div class="cost-row">
                        <span class="cost-label">Tuition Fees</span>
                        <span class="cost-value">£25,000 - £45,000</span>
                    </div>
                    <div class="cost-row">
                        <span class="cost-label">Living Expenses</span>
                        <span class="cost-value">£15,000 - £18,000</span>
                    </div>
                    <div class="cost-row">
                        <span class="cost-label">Health Insurance</span>
                        <span class="cost-value">£470</span>
                    </div>
                </div>
                <div class="cost-total">
                    <span class="cost-total-label">Total Estimated Cost</span>
                    <span class="cost-total-value">£50,470+</span>
                </div>
            </div>

            <!-- Admission Requirements -->
            <div class="admission-card" id="admission-card">
                <h2 class="section-title">Admission Requirements</h2>
                <p class="info-subtitle">Standard requirements for postgraduate applications.</p>
                <div class="req-list">
                    <div class="req-item">
                        <div class="req-dot purple"></div>
                        <div>
                            <h4 class="req-name">Academic Excellence (GPA)</h4>
                            <p class="req-desc">First-class UK Honours degree or equivalent international qualification.</p>
                        </div>
                    </div>
                    <div class="req-item">
                        <div class="req-dot blue"></div>
                        <div>
                            <h4 class="req-name">Language Proficiency</h4>
                            <p class="req-desc">IELTS 6.5 overall, TOEFL 100 overall, or equivalent.</p>
                        </div>
                    </div>
                    <div class="req-item">
                        <div class="req-dot green"></div>
                        <div>
                            <h4 class="req-name">Statement of Purpose</h4>
                            <p class="req-desc">A compelling essay detailing your academic interests and career goals.</p>
                        </div>
                    </div>
                    <div class="req-item">
                        <div class="req-dot orange"></div>
                        <div>
                            <h4 class="req-name">Letters of Recommendation</h4>
                            <p class="req-desc">Two academic references from recent professors or supervisors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <div class="cta-wrap">
        <a href="#" class="btn-start-app" id="btn-start-application">Start Your Application <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></a>
    </div>

    <!-- FOOTER -->
    <?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const applyBtns = document.querySelectorAll('.btn-apply, .btn-apply-now, .btn-start-app');
    applyBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            if(this.innerText.includes('Applied')) return;
            const originalText = this.innerHTML;
            this.innerText = 'Applying...';
            const formData = new FormData();
            
            let uniName = document.querySelector('.hero-title')?.innerText || 'Unknown University';
            let programName = 'General Admission';
            
            const card = this.closest('.program-card');
            if(card) {
                const titleEl = card.querySelector('h3, .program-name');
                if(titleEl) programName = titleEl.innerText;
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
                    this.innerHTML = originalText;
                    if(data.message.includes('logged in')) {
                        window.location.href = 'login.php';
                    }
                }
            }).catch(err => {
                alert('An error occurred.');
                this.innerHTML = originalText;
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


