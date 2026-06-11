<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
    header('Location: admin/dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Abrovia</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Inter',sans-serif;background:#0b0f1e;color:#fff;min-height:100vh;display:flex;align-items:center;justify-content:center;}
        .login-container{width:100%;max-width:420px;padding:20px;}
        .login-card{background:rgba(19,24,54,0.9);border:1px solid rgba(255,255,255,0.07);border-radius:16px;padding:40px 36px;backdrop-filter:blur(20px);}
        .logo-wrap{display:flex;align-items:center;gap:12px;margin-bottom:32px;justify-content:center;}
        .logo-icon{color:#7c3aed;}
        .logo-text{font-size:1.4rem;font-weight:700;}
        .logo-badge{font-size:0.65rem;background:rgba(124,58,237,0.15);color:#a78bfa;padding:3px 10px;border-radius:20px;font-weight:600;margin-left:8px;}
        h2{font-size:1.5rem;font-weight:700;margin-bottom:6px;text-align:center;}
        .subtitle{color:#a0a7c4;font-size:0.88rem;text-align:center;margin-bottom:28px;}
        .alert{padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:0.85rem;}
        .alert.error{background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.2);color:#f87171;}
        .form-group{margin-bottom:20px;}
        .form-label{display:block;margin-bottom:8px;font-size:0.85rem;font-weight:500;color:#a0a7c4;}
        .form-input{width:100%;padding:12px 16px;font-size:0.9rem;border-radius:10px;border:1px solid rgba(255,255,255,0.07);background:#1a2040;color:#fff;outline:none;transition:border-color 0.3s;}
        .form-input:focus{border-color:rgba(124,58,237,0.5);}
        .form-input::placeholder{color:#5c6490;}
        .btn-login{width:100%;padding:14px;font-size:0.95rem;font-weight:600;background:#7c3aed;color:#fff;border:none;border-radius:10px;cursor:pointer;transition:all 0.3s;}
        .btn-login:hover{background:#8b5cf6;transform:translateY(-1px);box-shadow:0 4px 15px rgba(124,58,237,0.4);}
        .back-link{display:block;text-align:center;margin-top:20px;color:#a0a7c4;font-size:0.85rem;text-decoration:none;transition:color 0.3s;}
        .back-link:hover{color:#fff;}
        .shield-icon{width:60px;height:60px;background:rgba(124,58,237,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;color:#a78bfa;}
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="shield-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div class="logo-wrap">
                <div class="logo-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" transform="rotate(45 12 12)"/><rect x="4" y="19" width="16" height="2" rx="1"/></svg></div>
                <span class="logo-text">Abrovia</span>
                <span class="logo-badge">ADMIN</span>
            </div>
            <h2>Admin Portal</h2>
            <p class="subtitle">Sign in with your administrator credentials</p>

            <?php if (isset($_SESSION['admin_login_error'])): ?>
                <div class="alert error"><?php echo htmlspecialchars($_SESSION['admin_login_error']); unset($_SESSION['admin_login_error']); ?></div>
            <?php endif; ?>

            <form action="auth/admin_login_process.php" method="POST">
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="admin@abrovia.com" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-login">Sign In to Admin Panel</button>
            </form>
            <a href="index.php" class="back-link">← Back to Abrovia</a>
        </div>
    </div>
</body>
</html>
