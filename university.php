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
    <title>University Finder - Abrovia</title>
    <link rel="stylesheet" href="assets/css/university.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <?php require_once 'includes/header.php'; ?>

    <!-- HERO -->
    <section class="hero" id="uni-hero">
        <h1 class="hero-title">Find Your Perfect Match</h1>
        <p class="hero-subtitle">Discover universities globally tailored to your academic profile, budget, and career aspirations.</p>
        <div class="search-bar">
            <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" class="search-input" id="uni-search" placeholder="Search by university name, course, or city...">
            <button class="search-btn" id="btn-search">Search</button>
        </div>
    </section>

    <!-- FILTERS -->
    <section class="filters-section" id="filters-section">
        <div class="filters-container">
            <div class="filter-group">
                <label class="filter-label">Country</label>
                <div class="select-wrapper">
                    <select class="filter-select" id="filter-country">
                        <option>All Countries</option>
                        <option>United Kingdom</option>
                        <option>United States</option>
                        <option>Canada</option>
                        <option>Australia</option>
                    </select>
                    <svg class="select-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
            </div>
            <div class="filter-group">
                <label class="filter-label">Budget (Yearly)</label>
                <div class="select-wrapper">
                    <select class="filter-select" id="filter-budget">
                        <option>Any Budget</option>
                        <option>Under $10,000</option>
                        <option>$10,000 - $30,000</option>
                        <option>$30,000 - $50,000</option>
                        <option>$50,000+</option>
                    </select>
                    <svg class="select-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
            </div>
            <div class="filter-group">
                <label class="filter-label">Subject</label>
                <div class="select-wrapper">
                    <select class="filter-select" id="filter-subject">
                        <option>Any Subject</option>
                        <option>Computer Science</option>
                        <option>Business</option>
                        <option>Engineering</option>
                        <option>Medicine</option>
                    </select>
                    <svg class="select-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
            </div>
            <div class="filter-group">
                <label class="filter-label">IELTS Score</label>
                <div class="select-wrapper">
                    <select class="filter-select" id="filter-ielts">
                        <option>Not Required</option>
                        <option>5.5+</option>
                        <option>6.0+</option>
                        <option>6.5+</option>
                        <option>7.0+</option>
                    </select>
                    <svg class="select-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
            </div>
        </div>
    </section>

    <!-- UNIVERSITY CARDS -->
    <section class="results-section" id="results-section">
        <div class="results-container">
            <div class="uni-grid">
                <!-- Card 1 -->
                <div class="uni-card" id="uni-card-1">
                    <div class="uni-image"></div>
                    <div class="uni-content">
                        <h3 class="uni-name">University of Oxford</h3>
                        <p class="uni-location"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Oxford, UK</p>
                        <div class="uni-tags">
                            <span class="tag">Russell Group</span>
                            <span class="tag">Research Intensive</span>
                        </div>
                        <a href="university-details.php" class="btn-view-details">View Details</a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="uni-card" id="uni-card-2">
                    <div class="uni-image"></div>
                    <div class="uni-content">
                        <h3 class="uni-name">Imperial College...</h3>
                        <p class="uni-location"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> London, UK</p>
                        <div class="uni-tags">
                            <span class="tag">STEM Focus</span>
                            <span class="tag">Urban Campus</span>
                        </div>
                        <a href="university-details.php" class="btn-view-details">View Details</a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="uni-card" id="uni-card-3">
                    <div class="uni-image"></div>
                    <div class="uni-content">
                        <h3 class="uni-name">Harvard University</h3>
                        <p class="uni-location"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Cambridge, USA</p>
                        <div class="uni-tags">
                            <span class="tag">Ivy League</span>
                            <span class="tag">Liberal Arts</span>
                        </div>
                        <a href="university-details.php" class="btn-view-details">View Details</a>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="uni-card" id="uni-card-4">
                    <div class="uni-image">
                        <span class="match-badge">✓ 84% Match</span>
                    </div>
                    <div class="uni-content">
                        <h3 class="uni-name">University of...</h3>
                        <p class="uni-location"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Toronto, Canada</p>
                        <div class="uni-tags">
                            <span class="tag">Top Tier</span>
                            <span class="tag">Diverse Campus</span>
                        </div>
                        <a href="university-details.php" class="btn-view-details">View Details</a>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="uni-card" id="uni-card-5">
                    <div class="uni-image"></div>
                    <div class="uni-content">
                        <h3 class="uni-name">University of...</h3>
                        <p class="uni-location"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Melbourne, Australia</p>
                        <div class="uni-tags">
                            <span class="tag">Group of Eight</span>
                            <span class="tag">Global Recognition</span>
                        </div>
                        <a href="university-details.php" class="btn-view-details">View Details</a>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="uni-card" id="uni-card-6">
                    <div class="uni-image"></div>
                    <div class="uni-content">
                        <h3 class="uni-name">UCL (University...</h3>
                        <p class="uni-location"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> London, UK</p>
                        <div class="uni-tags">
                            <span class="tag">Multidisciplinary</span>
                            <span class="tag">City Centre</span>
                        </div>
                        <a href="university-details.php" class="btn-view-details">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Load More -->
            <div class="load-more-wrap">
                <button class="btn-load-more" id="btn-load-more">Load More Results</button>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const uniSearchInput = document.getElementById('uni-search');
    const uniCountrySelect = document.getElementById('filter-country');
    const uniCards = document.querySelectorAll('.uni-card');

    function filterUniversities() {
        const searchTerm = uniSearchInput.value.toLowerCase();
        const selectedCountry = uniCountrySelect.value;

        uniCards.forEach(card => {
            const name = card.querySelector('.uni-name').innerText.toLowerCase();
            const location = card.querySelector('.uni-location').innerText.trim();
            
            let matchesSearch = name.includes(searchTerm);
            let matchesCountry = selectedCountry === 'All Countries' || location.includes(selectedCountry);

            if (matchesSearch && matchesCountry) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    if (uniSearchInput) {
        uniSearchInput.addEventListener('keyup', filterUniversities);
    }
    if (uniCountrySelect) {
        uniCountrySelect.addEventListener('change', filterUniversities);
    }

    const searchBtns = document.querySelectorAll('.search-btn, #btn-search');
    searchBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            filterUniversities();
        });
    });

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
            const card = this.closest('.program-card, .opportunity-card, .university-card, .uni-card');
            if(card) {
                const titleEl = card.querySelector('h3, .card-title, .opportunity-card-title, .uni-card-title, .uni-name');
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
});
</script>
</body>
</html>


