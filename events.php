<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once 'config/database.php';
$events = $pdo->query("SELECT * FROM events WHERE status IN ('upcoming','ongoing') ORDER BY event_date ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Abrovia</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
        :root{--bg:#0b0f1e;--card:#131836;--border:rgba(255,255,255,0.07);--accent:#7c3aed;--text:#fff;--text2:#a0a7c4;--text3:#5c6490;}
        body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);line-height:1.6;-webkit-font-smoothing:antialiased;}
        a{text-decoration:none;color:inherit;}
        .page-container{max-width:1100px;margin:0 auto;padding:100px 24px 60px;}
        .page-hero{text-align:center;margin-bottom:48px;}
        .page-hero h1{font-size:2.2rem;font-weight:800;letter-spacing:-0.5px;margin-bottom:8px;}
        .page-hero p{font-size:1rem;color:var(--text2);max-width:500px;margin:0 auto;}
        .events-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:24px;}
        .event-card{background:var(--card);border:1px solid var(--border);border-radius:14px;overflow:hidden;transition:transform 0.3s,border-color 0.3s;}
        .event-card:hover{transform:translateY(-4px);border-color:rgba(124,58,237,0.25);}
        .event-card-header{padding:24px 24px 0;display:flex;justify-content:space-between;align-items:center;}
        .event-badge{padding:4px 12px;border-radius:20px;font-size:0.72rem;font-weight:600;text-transform:uppercase;}
        .event-badge.online{background:rgba(168,85,247,0.12);color:#c084fc;}
        .event-badge.offline{background:rgba(34,197,94,0.12);color:#4ade80;}
        .event-date-badge{font-size:0.78rem;color:var(--text3);font-weight:500;}
        .event-card-body{padding:16px 24px 24px;}
        .event-card-body h3{font-size:1.1rem;font-weight:600;margin-bottom:8px;}
        .event-card-body p{font-size:0.85rem;color:var(--text2);margin-bottom:16px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}
        .event-meta{display:flex;gap:16px;margin-bottom:20px;flex-wrap:wrap;}
        .event-meta span{display:flex;align-items:center;gap:6px;font-size:0.78rem;color:var(--text3);}
        .btn-view{display:inline-block;padding:10px 22px;font-size:0.85rem;font-weight:600;background:rgba(124,58,237,0.12);color:#c4b5fd;border-radius:8px;transition:all 0.3s;}
        .btn-view:hover{background:var(--accent);color:#fff;box-shadow:0 4px 15px rgba(124,58,237,0.4);}
        .empty-msg{text-align:center;padding:80px 20px;color:var(--text3);}
        .empty-msg h2{font-size:1.4rem;margin-bottom:8px;color:var(--text2);}
    </style>
</head>
<body>
    <?php require_once 'includes/header.php'; ?>

    <div class="page-container">
        <div class="page-hero">
            <h1>Study Abroad Events</h1>
            <p>Discover webinars, workshops, and meetups to help your global education journey.</p>
        </div>

        <?php if(empty($events)): ?>
            <div class="empty-msg">
                <h2>No upcoming events</h2>
                <p>Check back soon for new events and webinars!</p>
            </div>
        <?php else: ?>
            <div class="events-grid">
                <?php foreach($events as $e): ?>
                    <div class="event-card">
                        <div class="event-card-header">
                            <span class="event-badge <?= $e['event_type'] ?>"><?= $e['event_type'] ?></span>
                            <span class="event-date-badge"><?= date('M d, Y', strtotime($e['event_date'])) ?></span>
                        </div>
                        <div class="event-card-body">
                            <h3><?= htmlspecialchars($e['title']) ?></h3>
                            <p><?= htmlspecialchars($e['description'] ?? 'Join us for this exciting study abroad event.') ?></p>
                            <div class="event-meta">
                                <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><?= date('h:i A', strtotime($e['event_time'])) ?></span>
                                <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><?= htmlspecialchars($e['location'] ?: 'Online') ?></span>
                            </div>
                            <a href="event-details.php?id=<?= $e['id'] ?>" class="btn-view">View Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php require_once 'includes/footer.php'; ?>
</body>
</html>
