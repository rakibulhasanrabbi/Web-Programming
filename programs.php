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
    <title>Find Programs - Abrovia</title>
    <link rel="stylesheet" href="assets/css/programs.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <?php require_once 'includes/header.php'; ?>

    <!-- HERO -->
    <section class="hero" id="programs-hero">
        <h1 class="hero-title"><em>Find Your Future Program</em></h1>
        <p class="hero-subtitle">Discover thousands of global opportunities tailored to your ambitions.</p>
        <div class="search-bar">
            <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" class="search-input" id="program-search" placeholder="Search by program, university, or country...">
            <button class="search-btn" id="btn-search">Search</button>
        </div>
    </section>

    <!-- FILTERS -->
    <section class="filters-section" id="filters-section">
        <div class="filters-container">
            <select class="filter-pill custom-select" id="filter-country">
                <option value="">Country</option>
                <option value="Germany">Germany</option>
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
            </select>
            <select class="filter-pill custom-select" id="filter-degree">
                <option value="">Degree Level</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Master">Master</option>
                <option value="PhD">PhD</option>
            </select>
            <select class="filter-pill custom-select" id="filter-budget">
                <option value="">Budget</option>
                <option value="Grants">Grants</option>
                <option value="Partly Awarded">Partly Awarded</option>
                <option value="Self Funded">Self Funded</option>
            </select>
        </div>
    </section>

    <!-- PROGRAM CARDS -->
    <section class="results-section" id="results-section">
        <div class="results-container">
            <div class="programs-grid">
                <!-- Card 1 -->
                <div class="program-card" id="program-1">
                    <div class="card-image">
                        <span class="card-badge green">GRANTS</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Global Excellence Master's</h3>
                        <p class="card-desc">An interdisciplinary program focusing on sustainable technology and global policy, offering...</p>
                        <div class="card-meta">
                            <span class="meta-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                Ends May 15
                            </span>
                            <span class="meta-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                Germany
                            </span>
                        </div>
                        <a href="university-details.php" class="btn-view-details">View Details</a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="program-card" id="program-2">
                    <div class="card-image">
                        <span class="card-badge purple">PARTLY AWARDED</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Applied Data Science BSc</h3>
                        <p class="card-desc">A rigorous undergraduate degree program preparing students for top-tier roles in AI and Machine...</p>
                        <div class="card-meta">
                            <span class="meta-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                Ends Dec 01
                            </span>
                            <span class="meta-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                Canada
                            </span>
                        </div>
                        <a href="university-details.php" class="btn-view-details">View Details</a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="program-card" id="program-3">
                    <div class="card-image"></div>
                    <div class="card-content">
                        <h3 class="card-title">International Business MBA</h3>
                        <p class="card-desc">Accelerate your career with a global perspective. Includes a mandatory exchange semester in Asia...</p>
                        <div class="card-meta">
                            <span class="meta-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                Rolling Admissions
                            </span>
                            <span class="meta-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                Australia
                            </span>
                        </div>
                        <a href="university-details.php" class="btn-view-details">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Load More -->
            <div class="load-more-wrap">
                <button class="btn-load-more" id="btn-load-more">Load More Programs</button>
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
    const searchInput = document.getElementById('program-search');
    const programCards = document.querySelectorAll('.program-card');
    const filterSelects = document.querySelectorAll('.custom-select');

    function filterPrograms() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        const countryVal = document.getElementById('filter-country').value.toLowerCase();
        const degreeVal = document.getElementById('filter-degree').value.toLowerCase();
        const budgetVal = document.getElementById('filter-budget').value.toLowerCase();

        programCards.forEach(card => {
            const title = card.querySelector('.card-title') ? card.querySelector('.card-title').innerText.toLowerCase() : '';
            const desc = card.querySelector('.card-desc') ? card.querySelector('.card-desc').innerText.toLowerCase() : '';
            const meta = card.querySelector('.card-meta') ? card.querySelector('.card-meta').innerText.toLowerCase() : '';
            const badgeEl = card.querySelector('.card-badge');
            const badge = badgeEl ? badgeEl.innerText.toLowerCase() : '';
            
            const matchesSearch = searchTerm === '' || title.includes(searchTerm) || desc.includes(searchTerm) || meta.includes(searchTerm);
            const matchesCountry = countryVal === '' || meta.includes(countryVal);
            
            let matchesDegree = degreeVal === '';
            if (!matchesDegree) {
                if (degreeVal === 'bachelor' && (title.includes('bsc') || title.includes('bachelor') || desc.includes('undergraduate') || title.includes('ba '))) matchesDegree = true;
                if (degreeVal === 'master' && (title.includes('master') || title.includes('mba') || title.includes('msc') || title.includes('ma '))) matchesDegree = true;
                if (degreeVal === 'phd' && (title.includes('phd') || title.includes('doctorate'))) matchesDegree = true;
            }

            let matchesBudget = budgetVal === '';
            if (!matchesBudget) {
                if (budgetVal === 'grants' && badge.includes('grants')) matchesBudget = true;
                else if (budgetVal === 'partly awarded' && badge.includes('partly awarded')) matchesBudget = true;
                else if (budgetVal === 'self funded' && badge === '') matchesBudget = true;
            }
            
            if (matchesSearch && matchesCountry && matchesDegree && matchesBudget) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    if (searchInput) {
        searchInput.addEventListener('keyup', filterPrograms);
    }

    searchBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            filterPrograms();
        });
    });

    filterSelects.forEach(select => {
        select.addEventListener('change', filterPrograms);
    });
});



</script>
</body>
</html>


