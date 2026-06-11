<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once 'config/database.php';

$eventId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
$stmt->execute([$eventId]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$event) {
    header("Location: events.php");
    exit;
}

$isLoggedIn = isset($_SESSION['user_id']);
$hasRequested = false;
$requestStatus = '';

if ($isLoggedIn) {
    $reqStmt = $pdo->prepare("SELECT status FROM event_requests WHERE user_id = ? AND event_id = ?");
    $reqStmt->execute([$_SESSION['user_id'], $eventId]);
    $request = $reqStmt->fetch();
    if ($request) {
        $hasRequested = true;
        $requestStatus = $request['status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($event['title']) ?> - Abrovia</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
        :root{--bg:#0b0f1e;--card:#131836;--border:rgba(255,255,255,0.07);--accent:#7c3aed;--text:#fff;--text2:#a0a7c4;--text3:#5c6490;}
        body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);line-height:1.6;-webkit-font-smoothing:antialiased;}
        a{text-decoration:none;color:inherit;}
        .page-container{max-width:900px;margin:0 auto;padding:100px 24px 60px;}
        .back-link{display:inline-flex;align-items:center;gap:6px;color:var(--accent);font-size:0.9rem;font-weight:500;margin-bottom:24px;transition:color 0.3s;}
        .back-link:hover{color:#8b5cf6;}
        .event-header{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:40px;margin-bottom:32px;text-align:center;}
        .event-badge{display:inline-block;padding:6px 14px;border-radius:20px;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:16px;}
        .event-badge.online{background:rgba(168,85,247,0.12);color:#c084fc;}
        .event-badge.offline{background:rgba(34,197,94,0.12);color:#4ade80;}
        .event-title{font-size:2.2rem;font-weight:800;letter-spacing:-0.5px;margin-bottom:24px;}
        .event-meta-grid{display:flex;justify-content:center;gap:32px;flex-wrap:wrap;}
        .meta-item{display:flex;flex-direction:column;align-items:center;gap:8px;}
        .meta-icon{width:40px;height:40px;border-radius:50%;background:rgba(124,58,237,0.1);color:#a78bfa;display:flex;align-items:center;justify-content:center;}
        .meta-label{font-size:0.75rem;color:var(--text3);text-transform:uppercase;letter-spacing:1px;}
        .meta-value{font-size:0.95rem;font-weight:600;}
        
        .event-content{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:40px;}
        .content-title{font-size:1.3rem;font-weight:700;margin-bottom:16px;border-bottom:1px solid var(--border);padding-bottom:12px;}
        .content-body{font-size:1rem;color:var(--text2);line-height:1.8;white-space:pre-wrap;margin-bottom:40px;}
        
        .action-section{text-align:center;padding-top:24px;border-top:1px solid var(--border);}
        .btn-join{display:inline-flex;align-items:center;justify-content:center;padding:14px 36px;font-size:1.05rem;font-weight:600;background:var(--accent);color:#fff;border-radius:10px;transition:all 0.3s;border:none;cursor:pointer;}
        .btn-join:hover{background:#8b5cf6;transform:translateY(-2px);box-shadow:0 6px 20px rgba(124,58,237,0.4);}
        .btn-disabled{background:rgba(255,255,255,0.1);color:var(--text3);cursor:not-allowed;}
        .btn-disabled:hover{transform:none;box-shadow:none;}
        
        .status-msg{margin-top:16px;font-size:0.9rem;}
        .status-pending{color:#fbbf24;}
        .status-approved{color:#4ade80;}
        .status-rejected{color:#f87171;}
    </style>
</head>
<body>
    <?php require_once 'includes/header.php'; ?>

    <div class="page-container">
        <a href="events.php" class="back-link">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Back to Events
        </a>

        <div class="event-header">
            <span class="event-badge <?= $event['event_type'] ?>"><?= $event['event_type'] ?> Event</span>
            <h1 class="event-title"><?= htmlspecialchars($event['title']) ?></h1>
            <div class="event-meta-grid">
                <div class="meta-item">
                    <div class="meta-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
                    <span class="meta-label">Date</span>
                    <span class="meta-value"><?= date('M d, Y', strtotime($event['event_date'])) ?></span>
                </div>
                <div class="meta-item">
                    <div class="meta-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
                    <span class="meta-label">Time</span>
                    <span class="meta-value"><?= date('h:i A', strtotime($event['event_time'])) ?></span>
                </div>
                <div class="meta-item">
                    <div class="meta-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
                    <span class="meta-label">Location</span>
                    <span class="meta-value"><?= htmlspecialchars($event['location'] ?: 'Online') ?></span>
                </div>
            </div>
        </div>

        <div class="event-content">
            <h2 class="content-title">About this Event</h2>
            <div class="content-body"><?= htmlspecialchars($event['description'] ?? 'No additional details provided.') ?></div>
            
            <div class="action-section">
                <?php if (!$isLoggedIn): ?>
                    <a href="login.php" class="btn-join">Log in to Join Event</a>
                <?php elseif ($hasRequested): ?>
                    <button class="btn-join btn-disabled" disabled>Request Submitted</button>
                    <p class="status-msg status-<?= $requestStatus ?>">
                        Your request is currently: <strong><?= ucfirst($requestStatus) ?></strong>. 
                        <?php if($requestStatus === 'approved') echo "Check your notifications for details!"; ?>
                    </p>
                <?php else: ?>
                    <button id="btn-join-action" class="btn-join" onclick="joinEvent(<?= $event['id'] ?>)">Request to Join</button>
                    <p id="join-status" class="status-msg"></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php require_once 'includes/footer.php'; ?>

    <script>
    function joinEvent(eventId) {
        const btn = document.getElementById('btn-join-action');
        const statusMsg = document.getElementById('join-status');
        
        btn.innerHTML = 'Sending Request...';
        btn.disabled = true;

        const fd = new FormData();
        fd.append('event_id', eventId);

        fetch('api/event_request.php', {
            method: 'POST',
            body: fd
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                btn.className = 'btn-join btn-disabled';
                btn.innerHTML = 'Request Submitted';
                statusMsg.className = 'status-msg status-pending';
                statusMsg.innerHTML = 'Your request is currently: <strong>Pending</strong>.';
            } else {
                btn.disabled = false;
                btn.innerHTML = 'Request to Join';
                statusMsg.style.color = '#f87171';
                statusMsg.textContent = data.message || 'An error occurred. Please try again.';
            }
        })
        .catch(err => {
            btn.disabled = false;
            btn.innerHTML = 'Request to Join';
            statusMsg.style.color = '#f87171';
            statusMsg.textContent = 'A network error occurred.';
        });
    }
    </script>
</body>
</html>
