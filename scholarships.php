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
    <title>Global Scholarships - Abrovia</title>
    <link rel="stylesheet" href="assets/css/scholarships.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <?php require_once 'includes/header.php'; ?>

    <!-- HERO -->
    <section class="hero" id="scholarships-hero">
        <div class="hero-container">
            <h1 class="hero-title"><em>Global Scholarships</em></h1>
            <p class="hero-desc">Discover fully and partially funded opportunities to support your international education journey. Browse our curated list of prestigious scholarships worldwide.</p>
        </div>
    </section>

    <!-- FILTERS -->
    <section class="filters-section" id="filters-section">
        <div class="filters-container">
            <label class="filter-checkbox" id="filter-funded">
                <input type="checkbox">
                <span class="checkbox-custom"></span>
                Fully Funded Only
            </label>
            <div class="filter-group">
                <span class="filter-label">COUNTRY</span>
                <div class="select-wrapper">
                    <select class="filter-select" id="filter-country">
                        <option>All Countries</option>
                        <option>United Kingdom</option>
                        <option>United States</option>
                        <option>Australia</option>
                        <option>Germany</option>
                        <option>Canada</option>
                    </select>
                    <svg class="select-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
            </div>
            <div class="filter-group">
                <span class="filter-label">DEADLINE</span>
                <div class="select-wrapper">
                    <select class="filter-select" id="filter-deadline">
                        <option>Any Time</option>
                        <option>Next 30 Days</option>
                        <option>Next 3 Months</option>
                        <option>Next 6 Months</option>
                    </select>
                    <svg class="select-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
            </div>
        </div>
    </section>

    <!-- SCHOLARSHIP CARDS -->
    <section class="results-section" id="results-section">
        <div class="results-container">
            <div class="scholarships-grid">

                <!-- Card 1 -->
                <div class="scholarship-card" id="scholarship-1">
                    <div class="card-top">
                        <div class="card-type">
                            <span class="type-dot purple"></span>
                            <span class="type-label">PRESTIGIOUS</span>
                        </div>
                        <span class="funding-badge green">Full Tuition</span>
                    </div>
                    <h3 class="card-title">Chevening Scholarship</h3>
                    <p class="card-location">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        United Kingdom
                    </p>
                    <div class="card-bottom">
                        <div class="card-deadline">
                            <span class="deadline-label">DEADLINE</span>
                            <span class="deadline-value">Nov 7, 2024</span>
                        </div>
                        <a href="#" class="btn-apply-now">Apply Now</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="scholarship-card" id="scholarship-2">
                    <div class="card-top">
                        <div class="card-type">
                            <span class="type-dot green"></span>
                            <span class="type-label">GLOBAL</span>
                        </div>
                        <span class="funding-badge orange">Partial Funding</span>
                    </div>
                    <h3 class="card-title">Fulbright Foreign Student Program</h3>
                    <p class="card-location">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        United States
                    </p>
                    <div class="card-bottom">
                        <div class="card-deadline">
                            <span class="deadline-label">DEADLINE</span>
                            <span class="deadline-value">Varies by Country</span>
                        </div>
                        <a href="#" class="btn-apply-now">Apply Now</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="scholarship-card" id="scholarship-3">
                    <div class="card-top">
                        <div class="card-type">
                            <span class="type-dot yellow"></span>
                            <span class="type-label">UNIVERSITY SPECIFIC</span>
                        </div>
                        <span class="funding-badge green">Full Tuition</span>
                    </div>
                    <h3 class="card-title">Melbourne International Undergraduate</h3>
                    <p class="card-location">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        Australia
                    </p>
                    <div class="card-bottom">
                        <div class="card-deadline">
                            <span class="deadline-label">DEADLINE</span>
                            <span class="deadline-value">Dec 15, 2024</span>
                        </div>
                        <a href="#" class="btn-apply-now">Apply Now</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fundedCheckbox = document.querySelector('#filter-funded input');
    const countrySelect = document.getElementById('filter-country');
    const scholarshipCards = document.querySelectorAll('.scholarship-card');

    function filterScholarships() {
        const showFullyFundedOnly = fundedCheckbox.checked;
        const selectedCountry = countrySelect.value;

        scholarshipCards.forEach(card => {
            const fundingBadge = card.querySelector('.funding-badge').innerText.toLowerCase();
            const cardCountry = card.querySelector('.card-location').innerText.trim();
            
            let matchesFunded = !showFullyFundedOnly || fundingBadge.includes('full');
            let matchesCountry = selectedCountry === 'All Countries' || cardCountry.includes(selectedCountry);

            if (matchesFunded && matchesCountry) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    if (fundedCheckbox) {
        fundedCheckbox.addEventListener('change', filterScholarships);
    }
    if (countrySelect) {
        countrySelect.addEventListener('change', filterScholarships);
    }

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


