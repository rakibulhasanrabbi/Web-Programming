<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
require_once 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Log in to your Abrovia account and continue your global education journey.">
    <title>Log In - Abrovia</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once 'includes/header.php'; ?>
    <style>
        .login-wrapper {
            padding-top: 64px;
            min-height: 100vh;
        }
        .login-right {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 40px !important;
        }
        .login-card {
            margin: 0 !important;
            width: 100%;
            max-width: 440px;
        }
    </style>
    <div class="login-wrapper">

        <!-- ========== LEFT PANEL ========== -->
        <div class="login-left" id="login-left">
            <div class="left-gradient"></div>
            <div class="left-content">
                <h1 class="left-title">Your global journey starts here.</h1>
                <p class="left-description">Access your personalized dashboard, track applications, and discover new destinations.</p>
            </div>
        </div>

        <!-- ========== RIGHT PANEL ========== -->
        <div class="login-right" id="login-right">
            <div class="login-card">

                <!-- Heading -->
                <h2 class="login-heading">Welcome back</h2>
                <p class="login-subheading">Please enter your details to sign in.</p>

                <!-- Form -->
                <!-- Messages -->
                <?php if (isset($_SESSION['login_error'])): ?>
                    <div style="color: #ef4444; background: #fee2e2; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px; border: 1px solid #f87171;">
                        <?php echo htmlspecialchars($_SESSION['login_error']); unset($_SESSION['login_error']); ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['register_success'])): ?>
                    <div style="color: #059669; background: #d1fae5; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px; border: 1px solid #34d399;">
                        <?php echo htmlspecialchars($_SESSION['register_success']); unset($_SESSION['register_success']); ?>
                    </div>
                <?php endif; ?>
                <form class="login-form" id="login-form" action="auth/login_process.php" method="POST">

                    <!-- Email -->
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="M22 7l-10 7L2 7"/>
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" autocomplete="email">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="form-label-row">
                            <label class="form-label" for="password">Password</label>
                            <a href="#" class="forgot-link" id="forgot-password-link">Forgot Password?</a>
                        </div>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                            </span>
                            <input type="password" id="password" name="password" class="form-input" placeholder="Password" autocomplete="current-password">
                        </div>
                    </div>

                    <!-- Log In Button -->
                    <button type="submit" class="btn-login" id="btn-login">Log In</button>

                    <!-- Divider -->
                    <div class="divider">
                        <span class="divider-text">OR</span>
                    </div>

                    <!-- Google Sign In -->
                    <button type="button" class="btn-google" id="btn-google-signin">
                        <svg width="18" height="18" viewBox="0 0 48 48">
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                        </svg>
                        Sign in with Google
                    </button>

                </form>

                <!-- Sign Up Link -->
                <p class="signup-link" id="signup-link">
                    Don't have an account? <a href="signup.php">Sign up instead</a>
                </p>

            </div>
        </div>

    </div>
    <?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchBtns = document.querySelectorAll('.search-btn, #btn-search');
    searchBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const wrapper = this.closest('.search-bar, .search-container') || this.parentElement;
            if(!wrapper) return;
            const input = wrapper.querySelector('input[type="text"]');
            if(input && input.value) {
                let target = 'programs.php';
                window.location.href = target + '?q=' + encodeURIComponent(input.value);
            }
        });
    });
});
</script>
</body>
</html>


